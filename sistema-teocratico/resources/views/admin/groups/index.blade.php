<x-admin-layout
  title="Grupos"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Grupos'],
  ]"
>
  @if (session('ok'))
    <div class="mb-4 rounded-md bg-green-50 p-3 text-green-800">{{ session('ok') }}</div>
  @endif

  <div class="bg-white rounded-lg shadow">
    <div class="p-4 border-b flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
      <form method="GET" class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
        <input
          type="text" name="q" value="{{ $q }}"
          placeholder="Buscar grupo…"
          class="w-full sm:w-72 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
        />
        <select name="congregation_id" class="rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
          <option value="">Todas las congregaciones</option>
          @foreach($congregations as $id => $name)
            <option value="{{ $id }}" @selected($congregationId == $id)>{{ $name }}</option>
          @endforeach
        </select>
        <button class="rounded-md px-3 py-2 bg-gray-100 hover:bg-gray-200">Filtrar</button>
        @if($q || $congregationId)
          <a href="{{ route('admin.groups.index') }}" class="text-sm text-gray-500 hover:underline self-center">Quitar filtro</a>
        @endif
      </form>

      <a href="{{ route('admin.groups.create') }}"
         class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-white hover:bg-indigo-700">
        Nuevo
      </a>
    </div>

    <div class="p-4 relative overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-600">
        <thead class="text-xs uppercase bg-gray-50 text-gray-500">
          <tr>
            <th class="px-6 py-3">Grupo</th>
            <th class="px-6 py-3">Congregación</th>
            <th class="px-6 py-3 w-40">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse($groups as $g)
            <tr class="odd:bg-white even:bg-gray-50 border-b">
              <td class="px-6 py-3 font-medium text-gray-900">{{ $g->name }}</td>
              <td class="px-6 py-3">{{ $g->congregation->name ?? '—' }}</td>
              <td class="px-6 py-3">
                <a href="{{ route('admin.groups.edit', $g) }}" class="text-indigo-600 hover:underline">Editar</a>
                <form action="{{ route('admin.groups.destroy', $g) }}" method="POST" class="inline"
                      onsubmit="return confirm('¿Eliminar este grupo?');">
                  @csrf @method('DELETE')
                  <button class="ms-3 text-red-600 hover:underline">Eliminar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="3" class="px-6 py-8 text-center text-gray-500">Sin registros</td></tr>
          @endforelse
        </tbody>
      </table>

      <div class="mt-4">{{ $groups->links() }}</div>
    </div>
  </div>
</x-admin-layout>