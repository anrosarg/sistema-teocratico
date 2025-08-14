<x-admin-layout
    title="Circuitos"
    :breadcrumbs="[
        ['name' => 'Inicio', 'route' => 'admin.dashboard'],
        ['name' => 'Circuitos'],
    ]"
>
    @if (session('ok'))
        <div class="mb-4 rounded-md bg-green-50 p-3 text-green-800">
            {{ session('ok') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow">
        <div class="flex flex-col gap-3 p-4 border-b md:flex-row md:items-center md:justify-between">
            <form class="flex items-center gap-2 w-full md:w-auto" method="GET">
                <input
                    type="text"
                    name="q"
                    value="{{ $q }}"
                    placeholder="Buscar número de circuito…"
                    class="w-full md:w-80 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                />
                <button class="rounded-md px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800">
                    Buscar
                </button>
                @if($q)
                    <a href="{{ route('admin.circuits.index') }}" class="text-sm text-gray-500 hover:underline">Quitar filtro</a>
                @endif
            </form>

            <a href="{{ route('admin.circuits.create') }}"
               class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-white hover:bg-indigo-700">
                Nuevo
            </a>
        </div>

        <div class="p-4 relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs uppercase bg-gray-50 text-gray-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">Número de Circuito</th>
                        <th scope="col" class="px-6 py-3 w-40">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($circuits as $circuit)
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                {{ $circuit->name }}
                            </th>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.circuits.edit', $circuit) }}"
                                   class="text-indigo-600 hover:underline">Editar</a>

                                <form action="{{ route('admin.circuits.destroy', $circuit) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('¿Eliminar este circuito?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="ms-3 text-red-600 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-8 text-center text-gray-500">
                                No hay circuitos cargados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $circuits->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>