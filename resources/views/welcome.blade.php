<x-layout title="Home">
	<h1 class="font-bold text-6xl">Hey there!</h1>

	<ul class="list-disc list-inside space-y-2 mt-5">
		@forelse ($tasks as $task)
			<li>{{ $task }}</li>
		@empty
			<p>There are no active tasks.</p>
		@endforelse
	</ul>
</x-layout>