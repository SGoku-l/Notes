<x-app-layout>
  <x-slot name="header"><h2 class="font-semibold text-xl">Notes</h2></x-slot>
  <div class="py-6 max-w-4xl mx-auto">
    
    @if(session('status')) 

    <div class="mb-3 p-2 bg-green-100">{{ session('status') }}</div>

     @endif

    <div class="flex justify-between mb-4">
      <form class="flex" method="GET">
        <input name="search" value="{{ request('search') }}" class="border rounded p-2" placeholder="Search title">
        <button class="ml-2 px-3 rounded border">Go</button>
      </form>
      <a href="{{ route('notes.create') }}" class="px-4 py-2 bg-gray-800 text-white rounded">+ New</a>
    </div>

    <div class="bg-white border rounded overflow-hidden">
      <table class="min-w-full">
        <thead class="bg-gray-50"><tr>
          <th class="p-3 text-left">Title</th>
          <th class="p-3 text-left">Created</th>
          <th class="p-3"></th>
        </tr></thead>
        <tbody>
          @forelse($notes as $note)
            <tr class="hover:bg-gray-50">
              <td class="p-3"><a href="{{ route('notes.show', $note) }}" class="underline">{{ $note->title }}</a></td>
              <td class="p-3 text-sm text-gray-600">{{ $note->created_at->format('Y-m-d H:i') }}</td>
              <td class="p-3 text-right">
                <a href="{{ route('notes.edit', $note) }}" class="mr-2 underline">Edit</a>
                <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">@csrf @method('DELETE')<button onclick="return confirm('Delete?')" class="underline text-red-600">Delete</button></form>
              </td>
            </tr>
          @empty
            <tr><td colspan="3" class="p-6 text-center text-gray-500">No notes yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">{{ $notes->links() }}</div>
  </div>
</x-app-layout>
