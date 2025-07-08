@props([
    'name',
    'label' => null,
    'type' => 'text',
    'placeholder' => '',
    'value' => null,
    'required' => false,
    'wireModel' => null,
])

<div {{ $attributes->merge(['class' => 'mb-4']) }}>
    @if($label)
        <label for="{{ $name }}" class="block text-gray-700 text-sm font-medium mb-2">
            {{ $label }} @if($required) <span class="text-red-500">*</span> @endif
        </label>
    @endif

    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        @if($wireModel) wire:model="{{ $wireModel }}" @endif
        @if($value) value="{{ old($name, $value) }}" @endif
        {{ $required ? 'required' : '' }}
        class="w-full px-4 py-2 border rounded-lg  focus:ring-1 focus:outline-indigo-400 focus:ring-indigo-400"
    >

    @error($wireModel ?? $name)
        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
    @enderror
</div>
