<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl">{{ $note->exists ? 'Edit Note' : 'New Note' }}</h2>
</x-slot>

  <div class="py-6 max-w-2xl mx-auto">

    <form method="POST" action="{{ $note->exists ? route('notes.update', $note) : route('notes.store') }}" class="bg-white border p-6 rounded">
      @csrf
      @if($note->exists) @method('PUT') @endif

      <div class="mb-4">
        <label class="block mb-1">Title</label>
        <input name="title" value="{{ old('title', $note->title) }}" maxlength="100" required class="w-full border rounded p-2">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="mb-4">
        <label class="block mb-1">Content</label>
        <textarea name="content" rows="6" class="w-full border rounded p-2">{{ old('content', $note->content) }}</textarea>
        @error('content') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="flex gap-2">
        <a href="{{ route('notes.index') }}" class="px-3 py-2 border rounded">Back</a>
        <button class="px-4 py-2 bg-gray-800 text-white rounded">{{ $note->exists ? 'Update' : 'Save' }}</button>
      </div>
      
    </form>
  </div>
</x-app-layout>
