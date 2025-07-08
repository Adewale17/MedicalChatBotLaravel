@props([
    'type' => 'button',
    'variant' => 'primary', // primary, secondary, danger
])

@php
    $baseClasses = 'py-2 px-4 rounded-lg focus:outline-none focus:ring-2 transition';
    $variantClasses = [
        'primary' => 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-600',
        'secondary' => 'bg-gray-200 text-gray-800 hover:bg-gray-300 focus:ring-gray-400',
        'danger' => 'bg-red-500 text-white hover:bg-red-600 focus:ring-red-500',
        
    ];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $baseClasses.' '.$variantClasses[$variant]]) }}
>
    {{ $slot }}
</button>
