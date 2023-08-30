@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1
            border-b-2 border-secondary dark:border-secondary_dark
            text-sm font-medium leading-5 text-secondary dark:text-primary
            focus:outline-none focus:border-primary
            transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent
            text-sm font-medium leading-5 text-gray-500 hover-text-secondary
            hover:border-gray-700 focus:outline-none focus:text-secondary
            focus:border-secondary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
