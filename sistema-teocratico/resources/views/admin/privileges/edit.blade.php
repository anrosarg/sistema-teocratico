<x-admin-layout
  title="Editar privilegio"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Privilegios', 'route' => 'admin.privileges.index'],
    ['name' => 'Editar'],
  ]"
>
  <div class="bg-white rounded-lg shadow p-6 max-w-xl">
    <form method="POST" action="{{ route('admin.privileges.update', $privilege) }}" class="space-y-4">
      @csrf @method('PUT')
      @include('admin.privileges._form', ['privilege' => $privilege])
    </form>
  </div>
</x-admin-layout>