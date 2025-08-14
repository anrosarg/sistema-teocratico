<x-admin-layout
  title="Nuevo grupo"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Grupos', 'route' => 'admin.groups.index'],
    ['name' => 'Nuevo'],
  ]"
>
  <div class="bg-white rounded-lg shadow p-6 max-w-xl">
    <form method="POST" action="{{ route('admin.groups.store') }}" class="space-y-4">
      @csrf
      @include('admin.groups._form', ['congregations' => $congregations])
    </form>
  </div>
</x-admin-layout>