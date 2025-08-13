<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar reunión fin de semana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

    {{-- Menú de navegación --}}
    <x-nav />

    <main class="max-w-2xl mx-auto py-8 px-6">
        <h1 class="text-3xl font-bold mb-8">Editar reunión fin de semana</h1>

        {{-- Formulario --}}
        <form action="{{ route('reunion-fin-de-semana.update', $reunion->id) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md space-y-6">
            @csrf
            @method('PUT')

            {{-- Fecha --}}
            <div>
                <label for="fecha" class="block font-semibold mb-2 text-lg">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="w-full border rounded px-4 py-3 text-base"
                       value="{{ \Carbon\Carbon::parse($reunion->fecha)->format('Y-m-d') }}" required>
            </div>

            {{-- Presidente --}}
            <div>
                <label for="presidente_id" class="block font-semibold mb-2 text-lg">Presidente</label>
                <select name="presidente_id" id="presidente_id" class="w-full border rounded px-4 py-3 text-base" required>
                    <option value="">-- Seleccioná un publicador --</option>
                    @foreach($presidentes as $publicador)
                        <option value="{{ $publicador->id }}" {{ $reunion->presidente_id == $publicador->id ? 'selected' : '' }}>
                            {{ $publicador->last_name }}, {{ $publicador->first_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Orador --}}
            <div>
                <label for="orador" class="block font-semibold mb-2 text-lg">Orador</label>
                <input type="text" name="orador" id="orador" class="w-full border rounded px-4 py-3 text-base"
                       value="{{ $reunion->orador }}" required>
            </div>

            {{-- Congregación --}}
            <div>
                <label for="congregacion" class="block font-semibold mb-2 text-lg">Congregación</label>
                <input type="text" name="congregacion" id="congregacion" class="w-full border rounded px-4 py-3 text-base"
                       value="{{ $reunion->congregacion }}" required>
            </div>

            {{-- Tema --}}
            <div>
                <label for="tema" class="block font-semibold mb-2 text-lg">Tema del discurso</label>
                <input type="text" name="tema" id="tema" class="w-full border rounded px-4 py-3 text-base"
                       value="{{ $reunion->tema }}" maxlength="256" required>
            </div>

            {{-- La Atalaya --}}
            <div>
                <label for="la_atalaya" class="block font-semibold mb-2 text-lg">La Atalaya</label>
                <input type="text" name="la_atalaya" id="la_atalaya" class="w-full border rounded px-4 py-3 text-base"
                       value="{{ $reunion->la_atalaya }}" required>
            </div>

            {{-- Lector --}}
            <div>
                <label for="lector_id" class="block font-semibold mb-2 text-lg">Lector</label>
                <select name="lector_id" id="lector_id" class="w-full border rounded px-4 py-3 text-base" required>
                    <option value="">-- Seleccioná un publicador --</option>
                    @foreach($lectores as $publicador)
                        <option value="{{ $publicador->id }}" {{ $reunion->lector_id == $publicador->id ? 'selected' : '' }}>
                            {{ $publicador->last_name }}, {{ $publicador->first_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('reunion-fin-de-semana.index') }}" class="px-5 py-3 bg-gray-300 text-gray-800 text-base rounded hover:bg-gray-400 transition">Cancelar</a>
                <button type="submit" class="px-5 py-3 bg-blue-600 text-white text-base rounded hover:bg-blue-700 transition">Guardar cambios</button>
            </div>
        </form>
    </main>

    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>