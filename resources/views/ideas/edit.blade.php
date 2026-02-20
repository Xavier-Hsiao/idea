<x-layout title="Home">
    <form action="/ideas/{{ $idea->id }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">Edit your idea</label>
            <div class="mt-2">
                <textarea id="description" name="description" rows="3" class="textarea w-full">{{ $idea->description }}</textarea>
                <x-forms.error name="description" />
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-3 border-b border-white/10 pb-5">
                <button type="submit" class="btn btn-primary">Edit</button>
                <button type="submit" form="delete-idea-form" class="btn btn-error">Delete</button>
            </div>
    </form>

    {{-- Delete Form --}}
    <form id="delete-idea-form" action="/ideas/{{ $idea->id }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
