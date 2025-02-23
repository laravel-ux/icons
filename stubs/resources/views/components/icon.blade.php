@props([
    'name',
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
{!! svg("lucide-{$name}", attributes: $attributes->getIterator()->getArrayCopy())->toHtml() !!}
