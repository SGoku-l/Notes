<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class NoteController extends Controller
{
   public function index(Request $request)
    {
        $user = $request->user()->notes()->latest();

        if ($s = $request->get('search')) {
            $user->where('title', 'like', "%{$s}%");
        }

        $notes = $user->paginate(10)->withQueryString();

        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $note = new Notes();

        return view('notes.form',['note' =>$note]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'nullable|string',
        ]);

        $request->user()->notes()->create($data);

        return redirect()->route('notes.index')->with('status', 'Note created.');
    }

    public function show(Notes $note)
    {
        $this->authorize('view', $note);
        return view('notes.show', compact('note'));
    }

    public function edit(Notes $note)
    {
        $this->authorize('update', $note);
        return view('notes.form', compact('note'));
    }

    public function update(Request $request, Notes $note)
    {
        $this->authorize('update', $note);

        $data = $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'nullable|string',
        ]);

        $note->update($data);

        return redirect()->route('notes.index')->with('status', 'Note updated.');
    }

    public function destroy(Notes $note)
    {
        $this->authorize('delete', $note);
        $note->delete();

        return redirect()->route('notes.index')->with('status', 'Note deleted.');
    }
}
