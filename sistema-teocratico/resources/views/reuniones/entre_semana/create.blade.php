<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear reunión entre semana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Menú de navegación --}}
    <x-nav />

    <main class="max-w-xl mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold mb-6">Agregar nueva reunión entre semana</h1>

        {{-- Formulario --}}
        <form action="{{ route('reunion-entre-semana.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md space-y-4">
            @csrf

            {{-- Fecha --}}
            <div>
                <label for="fecha" class="block font-semibold mb-1">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="w-full border rounded px-3 py-2" required>
            </div>

            {{-- Selects para cada asignación --}}
            @php
                $campos = [
                    'acomodador_puerta_id' => 'Acomodador Puerta',
                    'acomodador_auditorio_id' => 'Acomodador Auditorio',
                    'microfono_1_id' => 'Micrófono 1',
                    'microfono_2_id' => 'Micrófono 2',
                    'encargado_audio_id' => 'Encargado de Audio',
                    'encargado_video_id' => 'Encargado de Video',
                    'plataforma_id' => 'Plataforma',
                ];
            @endphp

           {{-- Acomodador Puerta --}}
<div>
    <label for="acomodador_puerta_id" class="block font-semibold mb-1">Acomodador Puerta</label>
    <select name="acomodador_puerta_id" id="acomodador_puerta_id" class="w-full border rounded px-3 py-2" required>
        <option value="">-- Seleccioná un publicador --</option>
        @foreach($puerta as $publicador)
            <option value="{{ $publicador->id }}">{{ $publicador->last_name }}, {{ $publicador->first_name }}</option>
        @endforeach
    </select>
</div>

{{-- Acomodador Auditorio --}}
<div>
    <label for="acomodador_auditorio_id" class="block font-semibold mb-1">Acomodador Auditorio</label>
    <select name="acomodador_auditorio_id" id="acomodador_auditorio_id" class="w-full border rounded px-3 py-2" required>
        <option value="">-- Seleccioná un publicador --</option>
        @foreach($auditorio as $publicador)
            <option value="{{ $publicador->id }}">{{ $publicador->last_name }}, {{ $publicador->first_name }}</option>
        @endforeach
    </select>
</div>

{{-- Micrófono 1 --}}
<div>
    <label for="microfono_1_id" class="block font-semibold mb-1">Micrófono 1</label>
    <select name="microfono_1_id" id="microfono_1_id" class="w-full border rounded px-3 py-2" required>
        <option value="">-- Seleccioná un publicador --</option>
        @foreach($mic1 as $publicador)
            <option value="{{ $publicador->id }}">{{ $publicador->last_name }}, {{ $publicador->first_name }}</option>
        @endforeach
    </select>
</div>

{{-- Micrófono 2 --}}
<div>
    <label for="microfono_2_id" class="block font-semibold mb-1">Micrófono 2</label>
    <select name="microfono_2_id" id="microfono_2_id" class="w-full border rounded px-3 py-2" required>
        <option value="">-- Seleccioná un publicador --</option>
        @foreach($mic2 as $publicador)
            <option value="{{ $publicador->id }}">{{ $publicador->last_name }}, {{ $publicador->first_name }}</option>
        @endforeach
    </select>
</div>

{{-- Encargado de Audio --}}
<div>
    <label for="encargado_audio_id" class="block font-semibold mb-1">Encargado de Audio</label>
    <select name="encargado_audio_id" id="encargado_audio_id" class="w-full border rounded px-3 py-2" required>
        <option value="">-- Seleccioná un publicador --</option>
        @foreach($audio as $publicador)
            <option value="{{ $publicador->id }}">{{ $publicador->last_name }}, {{ $publicador->first_name }}</option>
        @endforeach
    </select>
</div>

{{-- Encargado de Video --}}
<div>
    <label for="encargado_video_id" class="block font-semibold mb-1">Encargado de Video</label>
    <select name="encargado_video_id" id="encargado_video_id" class="w-full border rounded px-3 py-2" required>
        <option value="">-- Seleccioná un publicador --</option>
        @foreach($video as $publicador)
            <option value="{{ $publicador->id }}">{{ $publicador->last_name }}, {{ $publicador->first_name }}</option>
        @endforeach
    </select>
</div>

{{-- Plataforma --}}
<div>
    <label for="plataforma_id" class="block font-semibold mb-1">Plataforma</label>
    <select name="plataforma_id" id="plataforma_id" class="w-full border rounded px-3 py-2" required>
        <option value="">-- Seleccioná un publicador --</option>
        @foreach($plataforma as $publicador)
            <option value="{{ $publicador->id }}">{{ $publicador->last_name }}, {{ $publicador->first_name }}</option>
        @endforeach
    </select>
</div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ route('reunion-entre-semana.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancelar</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Guardar</button>
            </div>
        </form>
    </main>

    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>