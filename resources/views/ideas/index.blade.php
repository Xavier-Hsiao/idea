<x-layout title="Home">
    <form action="/ideas" method="POST">
        @csrf
        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">💡 New Idea</label>
            <div class="mt-2">
                <textarea id="description" name="description" rows="3"
                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">{{ last(session('ideas', [])) }}</textarea>
            </div>
            <p class="mt-3 text-sm/6 text-gray-400">Have an idea you want to save?</p>

            <div class="mt-6 flex items-center justify-end gap-x-6 border-b border-white/10 pb-5">
                <button type="button" class="text-sm/6 font-semibold text-white cursor-pointer">Cancel</button>
                <button type="submit"
                    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 cursor-pointer">Save</button>
            </div>

            @if ($ideas->count())
                <div class="border-b border-white/10 pb-12 mt-6">
                    <h2 class="font-bold text-white text-2xl mb-3">Ideas:</h2>
                    <ul class="text-base/7 font-semibold text-white">
                        @forelse ($ideas as $idea)
                            <li class="list-disc list-inside">
                                <a href="/ideas/{{ $idea->id }}">{{ $idea->description }}</a>
                            </li>
                        @empty
                            <p>You have no idea yet. Come up with a new one!</p>
                        @endforelse
                    </ul>
                </div>
            @endif
    </form>
</x-layout>
