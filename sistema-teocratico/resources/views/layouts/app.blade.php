<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="grid grid-rows-[auto_1fr_auto] min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                {{ $header ?? '' }}
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex justify-center items-start px-2 py-6">
            <div class="w-full max-w-7xl">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer (opcional) -->
        <footer class="bg-white shadow mt-8">
            <div class="max-w-7xl mx-auto py-4 px-4 text-center text-gray-400 text-xs">
                &copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
            </div>
        </footer>
    </div>
    @livewireScripts
</body>
</html>