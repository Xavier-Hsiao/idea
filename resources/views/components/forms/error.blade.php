@props(['name'])

@error($name)
    <p class="text-error text-xs mt-4">{{ $message }}</p>
@enderror
