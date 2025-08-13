<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Ministerio</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.querySelector('[data-collapse-toggle]');
            const target = document.getElementById(btn.getAttribute('data-collapse-toggle'));
            btn.addEventListener('click', () => {
                target.classList.toggle('hidden');
            });
        });
    </script>
</head>
<body class="bg-gray-100 antialiased">

    <!-- Navbar adaptado y funcional en móviles -->
    <nav class="bg-white border-gray-200 shadow">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('inicio') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/logo-ovb.png') }}" class="h-8" alt="Logo OVB" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-blue-900">Oeste VillaBosch</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Abrir menú</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="{{ route('inicio') }}" class="block py-2 px-3 text-gray-900 hover:text-blue-700">Inicio</a>
                    </li>
                    <li>
                        <a href="{{ route('asignaciones') }}" class="block py-2 px-3 text-gray-900 hover:text-blue-700">Asignaciones</a>
                    </li>
                    <li>
                        <a href="{{ route('fin-de-semana') }}" class="block py-2 px-3 text-gray-900 hover:text-blue-700">Reunión Fin de Semana</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li>
                                <a href="{{ url('/dashboard') }}" class="block py-2 px-3 text-green-700 hover:underline">Dashboard</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="block py-2 px-3 text-gray-700 hover:underline">Iniciar sesión</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('register') }}" class="block py-2 px-3 text-gray-700 hover:underline">Registrarse</a>
                            </li> --}}
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="p-6 pt-24">
        @yield('content')
    </main>

</body>
</html>
