@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block w-fullpl-3 pr-4 py-2 border-l-4 border-secondary text-left text-base font-medium
            dark:text-secondary text-secondary bg-primary
            focus:outline-none focus:text-primary
            focus:bg-primary focus:border-primary
            transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium
            dark:text-secondary  text-secondary hover:text-gray-600 hover:bg-gray-50 hover:border-gray-300
            focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300
            transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
