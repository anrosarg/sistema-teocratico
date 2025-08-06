<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Privilegios</h2>
    </x-slot>

    <div class="py-4 px-6">
        <a href="{{ route('privileges.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Agregar Privilegio</a>
        @if(session('success'))
            <div class="text-green-600 mt-2">{{ session('success') }}</div>
        @endif

        <div class="mt-4 bg-white p-4 rounded shadow">
            <table class="min-w-full text-left">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($privileges as $privilege)
                        <tr>
                            <td class="px-4 py-2">{{ $privilege->name }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('privileges.edit', $privilege) }}" class="text-blue-600 hover:underline">Editar</a>
                                <form action="{{ route('privileges.destroy', $privilege) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este privilegio?')" class="text-red-600 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>