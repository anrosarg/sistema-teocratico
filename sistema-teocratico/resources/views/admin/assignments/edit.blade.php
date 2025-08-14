<x-admin-layout
  title="Editar asignación"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Asignaciones', 'route' => 'admin.assignments.index'],
    ['name' => 'Editar'],
  ]"
>
  <div class="bg-white rounded-lg shadow p-6 max-w-xl">
    <form method="POST" action="{{ route('admin.assignments.update', $assignment) }}" class="space-y-4">
      @csrf @method('PUT')
      @include('admin.assignments._form', ['assignment' => $assignment])
    </form>
  </div>
</x-admin-layout>