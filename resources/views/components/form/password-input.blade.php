@props([
    'name',
    'label' => null,
    'type' => 'text',
    'placeholder' => '',
    'value' => null,
    'required' => false,
    'wireModel' => null,
    'showPasswordToggle' => false,
])

<div {{ $attributes->merge(['class' => 'mb-4 relative']) }}>
    @if($label)
        <label for="{{ $name }}" class="block text-gray-700 text-sm font-medium mb-2">
            {{ $label }} @if($required) <span class="text-red-500">*</span> @endif
        </label>
    @endif

    <div class="relative">
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            @if($wireModel) wire:model="{{ $wireModel }}" @endif
            @if($value) value="{{ old($name, $value) }}" @endif
            {{ $required ? 'required' : '' }}
            class="w-full px-4 py-2 border rounded-lg focus:ring-1 focus:outline-indigo-400 focus:ring-indigo-400 pr-10"
        >

        @if($showPasswordToggle)
            <button
                type="button"
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700"
                x-data="{ show: false }"
                @click="show = !show; $el.previousElementSibling.type = show ? 'text' : 'password'"
            >
                <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <svg x-show="show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
            </button>
        @endif
    </div>

    @error($wireModel ?? $name)
        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
    @enderror
</div>
