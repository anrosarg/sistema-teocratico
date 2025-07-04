<div>
    <input
        type="text"
        wire:model.live.debounce.300ms="search"
        placeholder="Buscar publicador..."
        class="mb-4 w-full rounded border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
    />

    <div class="overflow-x-auto w-full">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-600">
                <tr>
                    <th class="px-2 py-2 text-left text-xs font-medium text-white uppercase">Nombre</th>
                    <th class="px-2 py-2 text-left text-xs font-medium text-white uppercase">Circuito</th>
                    <th class="px-2 py-2 text-left text-xs font-medium text-white uppercase">Congregación</th>
                    <th class="px-2 py-2 text-left text-xs font-medium text-white uppercase">Grupo</th>
                    <th class="px-2 py-2 text-left text-xs font-medium text-white uppercase">Tipo</th>
                    <th class="px-2 py-2 text-center text-xs font-medium text-white uppercase">Ver</th>
                    <th class="px-2 py-2 text-center text-xs font-medium text-white uppercase">Editar</th>
                    <th class="px-2 py-2 text-center text-xs font-medium text-white uppercase">Eliminar</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($publishers as $publisher)
                <tr>
                    <td class="px-2 py-2 whitespace-nowrap">{{ $publisher->first_name }} {{ $publisher->last_name }}</td>
                    <td class="px-2 py-2 whitespace-nowrap">{{ $publisher->circuit->name ?? '-' }}</td>
                    <td class="px-2 py-2 whitespace-nowrap">{{ $publisher->congregation->name ?? '-' }}</td>
                    <td class="px-2 py-2 whitespace-nowrap">{{ $publisher->group->name ?? '-' }}</td>
                    <td class="px-2 py-2 whitespace-nowrap">
                        <span class="inline-block px-2 py-1 text-xs rounded 
                            {{ $publisher->status === 'bautizado' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ ucfirst($publisher->status) }}
                        </span>
                    </td>
                    <td class="px-2 py-2 whitespace-nowrap text-center">
                        <a href="{{ route('publishers.show', $publisher) }}"
                           class="text-blue-600 hover:text-blue-900 font-semibold">Ver</a>
                    </td>
                    <td class="px-2 py-2 whitespace-nowrap text-center">
                        <a href="{{ route('publishers.edit', $publisher) }}"
                           class="text-blue-600 hover:text-blue-900 font-semibold">Editar</a>
                    </td>
                    <td class="px-2 py-2 whitespace-nowrap text-center">
                        <form action="{{ route('publishers.destroy', $publisher) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este publicador?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-2 py-2 text-center text-gray-500">No hay publicadores registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>