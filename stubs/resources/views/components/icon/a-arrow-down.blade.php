@props([
    'size' => 'default',
])
@php
    $attributes = $attributes
        ->class('shrink-0')
        ->merge([
            'width' => match ($size) {
                'sm' => 16,
                'lg' => 32,
                'default' => 24,
            },
            'height' => match ($size) {
                'sm' => 16,
                'lg' => 32,
                'default' => 24,
            },
        ]);
@endphp
<svg
    xmlns="http://www.w3.org/2000/svg"
    {{ $attributes }}
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
    stroke-linecap="round"
    stroke-linejoin="round"
>
    <path d="M3.5 13h6"/>
    <path d="m2 16 4.5-9 4.5 9"/>
    <path d="M18 7v9"/>
    <path d="m14 12 4 4 4-4"/>
</svg>
