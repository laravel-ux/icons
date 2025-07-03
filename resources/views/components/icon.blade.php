@props([
    'name',
    'size' => 24,
])

@php
    $attributes = $attributes
        ->merge([
            'width' => $size,
            'height' => $size,
        ]);
@endphp

{!! svg("lucide-{$name}", attributes: $attributes->getIterator()->getArrayCopy())->toHtml() !!}
