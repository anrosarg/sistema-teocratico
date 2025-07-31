<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar reunión entre semana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

    {{-- Menú de navegación --}}
    <x-nav />

    <main class="max-w-2xl mx-auto py-8 px-6">
        <h1 class="text-3xl font-bold mb-8">Editar reunión entre semana</h1>

        {{-- Formulario --}}
        <form action="{{ route('reunion-entre-semana.update', $reunion->id) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md space-y-6">
            @csrf
            @method('PUT')

            {{-- Fecha --}}
            <div>
                <label for="fecha" class="block font-semibold mb-2 text-lg">Fecha</label>
                <input type="date" name="fecha" id="fecha" value="{{ $reunion->fecha }}" class="w-full border rounded px-4 py-3 text-base" required>
            </div>

            {{-- Campos dinámicos --}}
            @php
                $campos = [
                    'acomodador_puerta_id' => ['label' => 'Acomodador Puerta', 'data' => $puerta],
                    'acomodador_auditorio_id' => ['label' => 'Acomodador Auditorio', 'data' => $auditorio],
                    'microfono_1_id' => ['label' => 'Micrófono 1', 'data' => $mic1],
                    'microfono_2_id' => ['label' => 'Micrófono 2', 'data' => $mic2],
                    'encargado_audio_id' => ['label' => 'Encargado de Audio', 'data' => $audio],
                    'encargado_video_id' => ['label' => 'Encargado de Video', 'data' => $video],
                    'plataforma_id' => ['label' => 'Plataforma', 'data' => $plataforma],
                ];
            @endphp

            @foreach($campos as $campo => $info)
                <div>
                    <label for="{{ $campo }}" class="block font-semibold mb-2 text-lg">{{ $info['label'] }}</label>
                    <select name="{{ $campo }}" id="{{ $campo }}" class="w-full border rounded px-4 py-3 text-base" required>
                        <option value="">-- Seleccioná un publicador --</option>
                        @foreach($info['data'] as $publicador)
                            <option value="{{ $publicador->id }}" {{ $reunion->$campo == $publicador->id ? 'selected' : '' }}>
                                {{ $publicador->last_name }}, {{ $publicador->first_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endforeach

            {{-- Botones --}}
            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('reunion-entre-semana.index') }}" class="px-5 py-3 bg-gray-300 text-gray-800 text-base rounded hover:bg-gray-400 transition">Cancelar</a>
                <button type="submit" class="px-5 py-3 bg-blue-600 text-white text-base rounded hover:bg-blue-700 transition">Actualizar</button>
            </div>
        </form>
    </main>

    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>