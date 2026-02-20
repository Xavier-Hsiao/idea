<x-layout title="Home">
    @if ($ideas->count())
        <div class="border-b border-white/10 pb-12 mt-6">
            <h2 class="font-bold text-white text-2xl mb-3">Welcome, here are your IDEAS:</h2>
            <ul class="text-base/7 font-semibold text-white mt-6 grid grid-cols-2 gap-x-6 gap-y-4">
                @foreach ($ideas as $idea)
                    <x-idea-card href="/ideas/{{ $idea->id }}">
                        {{ $idea->description }}
                    </x-idea-card>
                @endforeach
            </ul>
            <a href="/ideas/create"
                class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 cursor-pointer mt-8 inline-block">Create</a>
        </div>
    @else
        <p>No ideas yet. <a href="/ideas/create" class="underline">Create a new one.</a></p>
    @endif
</x-layout>
