@props(['type' => 1])
@php
$classes = match ($type) {
    1 => 'blue',
    2 => 'green',
    3 => 'red'
};
@endphp

<div>
    <p>
        cтатус заказа:
        <span {{ $attributes->merge(['class' => $classes]) }}> {{ $slot }}</span>
    </p>
</div>