@props([
    'name',
    'label' => null,
    'required' => false,
])

<div {{ $attributes->merge(['class' => 'mb-4']) }}>
    @if($label)
        <label for="{{ $name }}" class="block text-gray-700 text-sm font-medium mb-2">
            {{ $label }} @if($required) <span class="text-red-500">*</span> @endif
        </label>
    @endif

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $required ? 'required' : '' }}
        class="w-full px-3 py-2 border rounded-lg focus:ring-1 focus:outline-indigo-400 focus:ring-indigo-400"
    >
        {{ $slot }}
    </select>

    @error($name)
        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
    @enderror
</div>
