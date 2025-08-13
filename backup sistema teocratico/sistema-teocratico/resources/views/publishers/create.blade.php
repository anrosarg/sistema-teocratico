<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Publicador
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8">
        <form method="POST" action="{{ route('publishers.store') }}" class="bg-white p-6 rounded shadow">
            @csrf

            {{-- Nombre --}}
            <div class="mb-4">
                <label class="block text-gray-700">Nombre</label>
                <input type="text" name="first_name" class="w-full border rounded px-3 py-2" required value="{{ old('first_name') }}">
                @error('first_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Apellido --}}
            <div class="mb-4">
                <label class="block text-gray-700">Apellido</label>
                <input type="text" name="last_name" class="w-full border rounded px-3 py-2" required value="{{ old('last_name') }}">
                @error('last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Grupo --}}
            <div class="mb-4">
                <label class="block text-gray-700">Grupo</label>
                <select name="group_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Seleccione un grupo</option>
                    @foreach($grupos as $grupo)
                        <option value="{{ $grupo->id }}" @selected(old('group_id') == $grupo->id)>{{ $grupo->name }}</option>
                    @endforeach
                </select>
                @error('group_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Circuito --}}
            <div class="mb-4">
                <label class="block text-gray-700">Circuito</label>
                <select name="circuit_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Seleccione un circuito</option>
                    @foreach($circuitos as $circuito)
                        <option value="{{ $circuito->id }}" @selected(old('circuit_id') == $circuito->id)>{{ $circuito->name }}</option>
                    @endforeach
                </select>
                @error('circuit_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Congregación --}}
            <div class="mb-4">
                <label class="block text-gray-700">Congregación</label>
                <select name="congregation_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Seleccione una congregación</option>
                    @foreach($congregaciones as $congregacion)
                        <option value="{{ $congregacion->id }}" @selected(old('congregation_id') == $congregacion->id)>{{ $congregacion->name }}</option>
                    @endforeach
                </select>
                @error('congregation_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Estado --}}
            <div class="mb-4">
                <label class="block text-gray-700">Estado</label>
                <select name="status" class="w-full border rounded px-3 py-2" required>
                    <option value="">Seleccione un estado</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado }}" @selected(old('status') == $estado)>{{ ucfirst($estado) }}</option>
                    @endforeach
                </select>
                @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Condición --}}
            <div class="mb-4">
                <label class="block text-gray-700">Condición</label>
                <select name="condition" class="w-full border rounded px-3 py-2" required>
                    <option value="">Seleccione una condición</option>
                    @foreach($condiciones as $condicion)
                        <option value="{{ $condicion }}" @selected(old('condition') == $condicion)>{{ ucfirst($condicion) }}</option>
                    @endforeach
                </select>
                @error('condition') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Privilegios --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Privilegios</label>
                @foreach($privilegios as $privilegio)
                    <label class="inline-flex items-center mr-4 mb-2">
                        <input type="checkbox" name="privilegios[]" value="{{ $privilegio->id }}"
                            class="form-checkbox text-green-600" {{ in_array($privilegio->id, old('privilegios', [])) ? 'checked' : '' }}>
                        <span class="ml-2">{{ $privilegio->name }}</span>
                    </label>
                @endforeach
                @error('privilegios') <div class="text-red-500 text-xs">{{ $message }}</div> @enderror
            </div>

            {{-- Asignaciones --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Asignaciones</label>
                @foreach($asignaciones as $asignacion)
                    <label class="inline-flex items-center mr-4 mb-2">
                        <input type="checkbox" name="asignaciones[]" value="{{ $asignacion->id }}"
                            class="form-checkbox text-blue-600" {{ in_array($asignacion->id, old('asignaciones', [])) ? 'checked' : '' }}>
                        <span class="ml-2">{{ $asignacion->name }}</span>
                    </label>
                @endforeach
                @error('asignaciones') <div class="text-red-500 text-xs">{{ $message }}</div> @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end">
                <a href="{{ route('dashboard') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded mr-2">Cancelar</a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">Guardar</button>
            </div>
        </form>
    </div>
</x-app-layout>
