<x-admin-layout
  title="Editar publicador"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Publicadores', 'route' => 'admin.publishers.index'],
    ['name' => 'Editar'],
  ]"
>
  <div class="bg-white rounded-lg shadow p-6">
    <form method="POST" action="{{ route('admin.publishers.update', $publisher) }}" class="space-y-4">
      @csrf @method('PUT')
      @include('admin.publishers._form', [
        'publisher' => $publisher,
        'selectedPrivileges' => $selectedPrivileges,
        'selectedAssignments' => $selectedAssignments
      ])
    </form>
  </div>
</x-admin-layout>