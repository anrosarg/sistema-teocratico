<x-admin-layout
  title="Editar grupo"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Grupos', 'route' => 'admin.groups.index'],
    ['name' => 'Editar'],
  ]"
>
  <div class="bg-white rounded-lg shadow p-6 max-w-xl">
    <form method="POST" action="{{ route('admin.groups.update', $group) }}" class="space-y-4">
      @csrf @method('PUT')
      @include('admin.groups._form', ['group' => $group, 'congregations' => $congregations])
    </form>
  </div>
</x-admin-layout>