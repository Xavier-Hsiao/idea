<x-layout title="Home">
    <h2 class="font-bold text-white">Your Idea</h2>

    <div class="mt-6">
        <p class="text-white">{{ $idea->description }}</p>
    </div>

    <div class="mt-6">
        <a href="/ideas/{{ $idea->id }}/edit"
            class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 cursor-pointer">Edit</a>
    </div>
</x-layout>
