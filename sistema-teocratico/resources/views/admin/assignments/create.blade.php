<x-admin-layout
  title="Nueva asignación"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Asignaciones', 'route' => 'admin.assignments.index'],
    ['name' => 'Nueva'],
  ]"
>
  <div class="bg-white rounded-lg shadow p-6 max-w-xl">
    <form method="POST" action="{{ route('admin.assignments.store') }}" class="space-y-4">
      @csrf
      @include('admin.assignments._form')
    </form>
  </div>
</x-admin-layout>