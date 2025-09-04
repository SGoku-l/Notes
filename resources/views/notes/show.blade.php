<x-app-layout>
  <x-slot name="header"><h2 class="font-semibold text-xl">{{ $note->title }}</h2></x-slot>
  <div class="py-6 max-w-2xl mx-auto">
    <div class="bg-white border p-6 rounded">
      <p class="text-sm text-gray-600 mb-4">Created: {{ $note->created_at->format('Y-m-d H:i') }}</p>
      <div class="whitespace-pre-wrap">{{ $note->content }}</div>
    </div>
    <div class="mt-4"><a href="{{ route('notes.edit', $note) }}" class="underline mr-3">Edit</a><a href="{{ route('notes.index') }}" class="underline">Back</a></div>
  </div>
</x-app-layout>
