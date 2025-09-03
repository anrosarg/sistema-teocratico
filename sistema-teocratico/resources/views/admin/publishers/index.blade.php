<x-admin-layout
  title="Publicadores"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Publicadores'],
  ]"
>
  @if (session('ok'))
    <div class="mb-4 rounded-md bg-green-50 p-3 text-green-800">{{ session('ok') }}</div>
  @endif
  @if (session('error'))
    <div class="mb-4 rounded-md bg-red-50 p-3 text-red-800">{{ session('error') }}</div>
  @endif

  <div class="bg-white rounded-lg shadow">
    <div class="p-4 border-b flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
      <form method="GET" class="flex flex-col xl:flex-row gap-2 w-full md:w-auto">
        <input
          type="text" name="q" value="{{ $q }}"
          placeholder="Buscar (nombre o apellido)…"
          class="w-full xl:w-72 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
        />

        <select name="circuit_id" class="rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
          <option value="">Circuito</option>
          @foreach($circuits as $id => $name)
            <option value="{{ $id }}" @selected($circuitId == $id)>{{ $name }}</option>
          @endforeach
        </select>

        <select name="congregation_id" class="rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
          <option value="">Congregación</option>
          @foreach($congregations as $id => $name)
            <option value="{{ $id }}" @selected($congregationId == $id)>{{ $name }}</option>
          @endforeach
        </select>

        <select name="group_id" class="rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
          <option value="">Grupo</option>
          @foreach($groups as $id => $name)
            <option value="{{ $id }}" @selected($groupId == $id)>{{ $name }}</option>
          @endforeach
        </select>

        <select name="status" class="rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
          <option value="">Estado</option>
          <option value="bautizado" @selected($status==='bautizado')>Bautizado</option>
          <option value="no bautizado" @selected($status==='no bautizado')>No bautizado</option>
        </select>

        <select name="condition" class="rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
          <option value="">Condición</option>
          <option value="ejemplar" @selected($condition==='ejemplar')>Ejemplar</option>
          <option value="no ejemplar" @selected($condition==='no ejemplar')>No ejemplar</option>
        </select>

        <div class="flex gap-2">
          <button class="rounded-md px-3 py-2 bg-gray-100 hover:bg-gray-200">Filtrar</button>
          @if($q || $circuitId || $congregationId || $groupId || $status || $condition)
            <a href="{{ route('admin.publishers.index') }}"
               class="rounded-md px-3 py-2 border text-gray-600 hover:bg-gray-50">Quitar filtro</a>
          @endif
        </div>
      </form>

      <a href="{{ route('admin.publishers.create') }}"
         class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-white hover:bg-indigo-700">
        Nuevo
      </a>
    </div>

    <div class="p-4 relative overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-600">
        <thead class="text-xs uppercase bg-gray-50 text-gray-500">
          <tr>
            <th class="px-6 py-3">Apellido</th>
            <th class="px-6 py-3">Nombre</th>
            <th class="px-6 py-3">Circuito</th>
            <th class="px-6 py-3">Congregación</th>
            <th class="px-6 py-3">Grupo</th>
            <th class="px-6 py-3">Estado</th>
            <th class="px-6 py-3">Condición</th>
            <th class="px-6 py-3 w-48">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse($publishers as $p)
            <tr class="odd:bg-white even:bg-gray-50 border-b">
              <td class="px-6 py-3 font-medium text-gray-900">{{ $p->last_name }}</td>
              <td class="px-6 py-3">{{ $p->first_name }}</td>
              <td class="px-6 py-3">{{ $p->circuit->name ?? '—' }}</td>
              <td class="px-6 py-3">{{ $p->congregation->name ?? '—' }}</td>
              <td class="px-6 py-3">{{ $p->group->name ?? '—' }}</td>
              <td class="px-6 py-3">{{ ucfirst($p->status) }}</td>
              <td class="px-6 py-3">{{ ucfirst($p->condition) }}</td>
              <td class="px-6 py-3">
                <a href="{{ route('admin.publishers.show', $p) }}" class="text-sky-600 hover:underline">Ver</a>
                <span class="mx-1 text-gray-300">|</span>
                <a href="{{ route('admin.publishers.edit', $p) }}" class="text-indigo-600 hover:underline">Editar</a>
                <form action="{{ route('admin.publishers.destroy', $p) }}" method="POST" class="inline"
                      onsubmit="return confirm('¿Eliminar este publicador?');">
                  @csrf @method('DELETE')
                  <button class="ms-1 text-red-600 hover:underline">Eliminar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="8" class="px-6 py-8 text-center text-gray-500">Sin registros</td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <div class="mt-4">{{ $publishers->links() }}</div>
    </div>
  </div>
</x-admin-layout>