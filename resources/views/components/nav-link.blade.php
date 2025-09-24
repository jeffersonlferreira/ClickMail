@props(['active'])

@php
    $classes = $active ?? false ? 'text-[#1349C3]' : 'hover:text-[#1349C3] text-white';

@endphp

<a
    {{ $attributes->class(['inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 focus:outline-none transition duration-150 font-bold ease-in-out', $classes]) }}>
    {{ $slot }}
</a>
