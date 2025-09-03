<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
      {{-- Fallback CSS inline de la plantilla por defecto --}}
      <style>/* (tu CSS fallback actual) */</style>
    @endif
  </head>
  <body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

    {{-- Solo incluye el navbar; todo el menú y rutas están dentro del partial --}}
    @include('layouts.includes.front.navbar', [
      'brand' => 'Congregación OVB',
      // Si quieres sobreescribir el menú, pasa 'links' aquí. Si no, usa el default.
      // 'links' => [...]
    ])

    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
      <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        {{-- tu contenido de portada --}}
      </main>
    </div>

    @if (Route::has('login'))
      <div class="h-14.5 hidden lg:block"></div>
    @endif

    {{-- Flowbite (para dropdown/collapse) --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  </body>
</html>