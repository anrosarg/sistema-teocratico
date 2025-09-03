<x-admin-layout
  :title="'Publicador: ' . $publisher->nombre_completo"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Publicadores', 'route' => 'admin.publishers.index'],
    ['name' => 'Perfil'],
  ]"
>
  <div class="mb-4 flex items-center gap-2">
    <a href="{{ route('admin.publishers.index') }}" class="rounded-md border px-3 py-2">Volver</a>

    <a href="{{ route('admin.publishers.edit', $publisher) }}"
       class="rounded-md bg-indigo-600 px-3 py-2 text-white hover:bg-indigo-700">Editar</a>

    <form action="{{ route('admin.publishers.destroy', $publisher) }}" method="POST"
          onsubmit="return confirm('¿Eliminar este publicador?');" class="inline">
      @csrf @method('DELETE')
      <button class="rounded-md bg-red-600 px-3 py-2 text-white hover:bg-red-700">Eliminar</button>
    </form>
  </div>

  <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    {{-- Card: Datos básicos --}}
    <div class="xl:col-span-2 bg-white rounded-lg shadow p-6">
      <div class="flex items-start justify-between">
        <div>
          <h2 class="text-xl font-semibold text-gray-900">{{ $publisher->nombre_completo }}</h2>
          <p class="text-gray-500 mt-1">
            Circuito: <span class="font-medium text-gray-700">{{ $publisher->circuit->name ?? '—' }}</span> ·
            Congregación: <span class="font-medium text-gray-700">{{ $publisher->congregation->name ?? '—' }}</span> ·
            Grupo: <span class="font-medium text-gray-700">{{ $publisher->group->name ?? '—' }}</span>
          </p>
        </div>

        <div class="flex gap-2">
          <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-medium
                       {{ $publisher->status === 'bautizado' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700' }}">
            {{ ucfirst($publisher->status) }}
          </span>
          <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-medium
                       {{ $publisher->condition === 'ejemplar' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800' }}">
            {{ ucfirst($publisher->condition) }}
          </span>
        </div>
      </div>

      <dl class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="bg-gray-50 rounded-md p-4">
          <dt class="text-xs uppercase text-gray-500">Apellido</dt>
          <dd class="text-gray-900 font-medium">{{ $publisher->last_name }}</dd>
        </div>
        <div class="bg-gray-50 rounded-md p-4">
          <dt class="text-xs uppercase text-gray-500">Nombre</dt>
          <dd class="text-gray-900 font-medium">{{ $publisher->first_name }}</dd>
        </div>
        <div class="bg-gray-50 rounded-md p-4">
          <dt class="text-xs uppercase text-gray-500">Creado</dt>
          <dd class="text-gray-900">{{ $publisher->created_at?->format('d/m/Y H:i') ?? '—' }}</dd>
        </div>
        <div class="bg-gray-50 rounded-md p-4">
          <dt class="text-xs uppercase text-gray-500">Actualizado</dt>
          <dd class="text-gray-900">{{ $publisher->updated_at?->format('d/m/Y H:i') ?? '—' }}</dd>
        </div>
      </dl>
    </div>

    {{-- Card: Resumen --}}
    <div class="bg-white rounded-lg shadow p-6">
      <h3 class="text-sm font-semibold text-gray-700">Resumen</h3>
      <ul class="mt-3 space-y-2 text-sm text-gray-700">
        <li><span class="text-gray-500">Circuito:</span> {{ $publisher->circuit->name ?? '—' }}</li>
        <li><span class="text-gray-500">Congregación:</span> {{ $publisher->congregation->name ?? '—' }}</li>
        <li><span class="text-gray-500">Grupo:</span> {{ $publisher->group->name ?? '—' }}</li>
        <li><span class="text-gray-500">Estado:</span> {{ ucfirst($publisher->status) }}</li>
        <li><span class="text-gray-500">Condición:</span> {{ ucfirst($publisher->condition) }}</li>
      </ul>
    </div>

    {{-- Card: Privilegios --}}
    <div class="bg-white rounded-lg shadow p-6 xl:col-span-1">
      <h3 class="text-sm font-semibold text-gray-700">Privilegios</h3>
      <div class="mt-3 flex flex-wrap gap-2">
        @forelse($publisher->privileges as $pr)
          <span class="inline-flex items-center rounded-full bg-purple-100 px-3 py-1 text-xs font-medium text-purple-800">
            {{ $pr->name }}
          </span>
        @empty
          <p class="text-gray-500 text-sm">Sin privilegios.</p>
        @endforelse
      </div>
    </div>

    {{-- Card: Asignaciones --}}
    <div class="bg-white rounded-lg shadow p-6 xl:col-span-2">
      <h3 class="text-sm font-semibold text-gray-700">Asignaciones</h3>
      <div class="mt-3 flex flex-wrap gap-2">
        @forelse($publisher->assignments as $as)
          <span class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-xs font-medium text-indigo-800">
            {{ $as->name }}
          </span>
        @empty
          <p class="text-gray-500 text-sm">Sin asignaciones.</p>
        @endforelse
      </div>
    </div>
  </div>
</x-admin-layout>