@props([
    'size' => 'default',
])
@php
    $attributes = $attributes
        ->class('shrink-0 animate-spin')
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
    <path d="M21 12a9 9 0 1 1-6.219-8.56"></path>
</svg>
