<x-layout title="Home">
    <form action="/ideas" method="POST">
        @csrf

        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">Create New Idea</label>
            <div class="mt-2">
                <textarea id="description" name="description" rows="3" class="textarea w-full"></textarea>

                <x-forms.error name="description" />
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6 border-b border-white/10 pb-5">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
    </form>
</x-layout>
