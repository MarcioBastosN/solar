<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Scripts -->
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireStyles
</head>

{{-- bg-gradient-to-b from-primary-800 via-primary-500 to-secondary --}}

<body class="font-sans antialiased ">
    <x-notifications />
    <x-dialog z-index="z-50" blur="md" align="center" />
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-primary dark:bg-primary_dark shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</body>

</html>
