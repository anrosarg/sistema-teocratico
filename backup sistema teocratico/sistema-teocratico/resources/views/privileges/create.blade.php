<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Privilegio</h2>
    </x-slot>

    <div class="py-4 px-6">
        <form action="{{ route('privileges.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            @csrf
            <div>
                <label for="name" class="block font-medium">Nombre</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded mt-1" required>
                @error('name') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
        </form>
    </div>
</x-app-layout>