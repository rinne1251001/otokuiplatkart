@props([
    'src' => '',
    'title' => 'Google Map',
    'height' => '450'
])

<iframe
    {{ $attributes->merge(['class' => 'w-full']) }}
    src="{{ $src }}"
    title="{{ $title }}"
    height="{{ $height }}"
    style="border:0;"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
</iframe>