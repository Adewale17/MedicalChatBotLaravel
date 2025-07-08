@props([
    'variant' => 'success',
    'class' => '',
])

@php
    $base = 'flex items-center justify-between px-4 py-3 rounded relative text-sm font-medium';
    $variants = [
        'success' => 'bg-green-100 border border-green-400 text-green-700',
        'warning' => 'bg-yellow-100 border border-yellow-400 text-yellow-700',
        'danger' => 'bg-red-100 border border-red-400 text-red-700',
        'error' => 'bg-red-100 border border-red-400 text-red-700',
        'info' => 'bg-blue-100 border border-blue-400 text-blue-700',
    ];
    $variantClass = $variants[$variant] ?? $variants['success'];
    $message = session($variant);
@endphp

@if ($message)
    <div {{ $attributes->merge(['class' => "$base $variantClass $class"]) }} role="alert">
        <span>{{ $message }}</span>
        <button type="button" onclick="this.parentElement.remove();" class="ml-2 hover:opacity-80 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 8.586l4.95-4.95 1.414 1.414L11.414 10l4.95 4.95-1.414 1.414L10 11.414l-4.95 4.95-1.414-1.414L8.586 10 3.636 5.05 5.05 3.636 10 8.586z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
@endif
