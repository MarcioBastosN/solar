@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1
            border-b-2 border-secondary dark:border-secondary
            text-sm font-medium leading-5 text-white dark:text-secodary
            focus:outline-none focus:border-primary
            transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent
            text-sm font-medium leading-5 text-gray-400 hover-text-secondary
            hover:border-gray-700 focus:outline-none focus:text-secondary
            focus:border-secondary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
