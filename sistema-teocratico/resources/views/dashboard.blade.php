{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!--<x-welcome />-->
            </div>
        </div>
    </div>
</x-app-layout>
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Publicadores</h1>
                    <a href="{{ route('publishers.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition">
                        Agregar
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-600">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Circuito</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Congregación</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Grupo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tipo</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Ver detalles</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Editar</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($publishers as $publisher)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $publisher->first_name }} {{ $publisher->last_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $publisher->circuit->name ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $publisher->congregation->name ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $publisher->group->name ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-block px-2 py-1 text-xs rounded 
                                        {{ $publisher->status === 'bautizado' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($publisher->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <a href="{{ route('publishers.show', $publisher) }}"
                                       class="text-blue-600 hover:text-blue-900 font-semibold">Ver</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <a href="{{ route('publishers.edit', $publisher) }}"
                                       class="text-yellow-600 hover:text-yellow-900 font-semibold">Editar</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <form action="{{ route('publishers.destroy', $publisher) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este publicador?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-gray-500">No hay publicadores registrados.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>