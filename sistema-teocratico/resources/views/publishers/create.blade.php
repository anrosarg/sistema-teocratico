<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Publicador
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8">
        <form method="POST" action="{{ route('publishers.store') }}" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Nombre</label>
                <input type="text" name="first_name" class="w-full border rounded px-3 py-2" required value="{{ old('first_name') }}">
                @error('first_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Apellido</label>
                <input type="text" name="last_name" class="w-full border rounded px-3 py-2" required value="{{ old('last_name') }}">
                @error('last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

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

            <div class="mb-4">
                <label class="block text-gray-700">Estado</label>
                <select name="status" class="w-full border rounded px-3 py-2" required>
                    @foreach($estados as $estado)
                        <option value="{{ $estado }}" @selected(old('status') == $estado)>{{ ucfirst($estado) }}</option>
                    @endforeach
                </select>
                @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Condición</label>
                <select name="condition" class="w-full border rounded px-3 py-2" required>
                    @foreach($condiciones as $condicion)
                        <option value="{{ $condicion }}" @selected(old('condition') == $condicion)>{{ ucfirst($condicion) }}</option>
                    @endforeach
                </select>
                @error('condition') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('dashboard') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded mr-2">Cancelar</a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">Guardar</button>
            </div>
        </form>
    </div>
</x-app-layout>