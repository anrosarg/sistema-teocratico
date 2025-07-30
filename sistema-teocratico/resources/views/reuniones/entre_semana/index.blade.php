<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reuniones entre semana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Menú de navegación --}}
    <x-nav />

    {{-- Contenido principal --}}
    <main class="max-w-7xl mx-auto py-6 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Asignaciones entre semana</h1>
            <a href="{{ route('reunion-entre-semana.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Agregar Asignación
            </a>
        </div>

        {{-- Tabla CRUD --}}
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-200 text-sm sm:text-base uppercase font-bold">
                    <tr>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Puerta</th>
                        <th class="px-4 py-3">Auditorio</th>
                        <th class="px-4 py-3">Micrófono</th>
                        <th class="px-4 py-3">Micrófono</th>
                        <th class="px-4 py-3">Audio</th>
                        <th class="px-4 py-3">Video</th>
                        <th class="px-4 py-3">Plataforma</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-base text-gray-800">
    @foreach($reuniones as $reunion)
        <tr class="border-t hover:bg-gray-50">
            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($reunion->fecha)->format('d/m/Y') }}</td>
            <td class="px-4 py-2">{{ $reunion->acomodadorPuerta->nombre_completo ?? '-' }}</td>
            <td class="px-4 py-2">{{ $reunion->acomodadorAuditorio->nombre_completo ?? '-' }}</td>
            <td class="px-4 py-2">{{ $reunion->microfono1->nombre_completo ?? '-' }}</td>
            <td class="px-4 py-2">{{ $reunion->microfono2->nombre_completo ?? '-' }}</td>
            <td class="px-4 py-2">{{ $reunion->encargadoAudio->nombre_completo ?? '-' }}</td>
            <td class="px-4 py-2">{{ $reunion->encargadoVideo->nombre_completo ?? '-' }}</td>
            <td class="px-4 py-2">{{ $reunion->plataforma->nombre_completo ?? '-' }}</td>
            <td class="px-4 py-2 text-center space-x-2">
                <a href="{{ route('reunion-entre-semana.edit', $reunion->id) }}"
                   class="text-indigo-600 hover:underline">Editar</a>
                <form action="{{ route('reunion-entre-semana.destroy', $reunion->id) }}"
                      method="POST"
                      class="inline-block"
                      onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta asignación?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
            </table>
        </div>
    </main>

    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>