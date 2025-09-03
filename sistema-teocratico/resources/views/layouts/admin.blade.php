{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Panel de Administración')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-gray-100 text-gray-900">
<div class="min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="w-64 shrink-0 bg-white border-r border-gray-200">
        @include('layouts.includes.admin.sidebar')
    </aside>

    {{-- Main --}}
    <section class="flex-1 min-w-0">
        {{-- Top bar simple (opcional) --}}
        <header class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <h1 class="text-lg font-semibold">
                    @yield('header', 'Congregacion Oeste Villa Bosch')
                </h1>
            </div>
        </header>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            {{-- Breadcrumb: recibe $breadcrumbs desde los controladores (opcional) --}}
            @include('layouts.includes.admin.breadcrumb', [
                'items' => $breadcrumbs ?? []
            ])

            {{-- Flash messages --}}
            @if (session('success'))
                <div class="mb-4 rounded-md bg-green-50 border border-green-200 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 rounded-md bg-red-50 border border-red-200 px-4 py-3 text-red-800">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Contenido de la página --}}
            @yield('content')

            {{-- Si alguna vista usa layout como componente y pasa $slot, esto no rompe --}}
            {!! $slot ?? '' !!}
        </div>
    </section>
</div>

{{-- JS para que funcionen toggles/collapses del sidebar --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

@stack('scripts')
</body>
</html>