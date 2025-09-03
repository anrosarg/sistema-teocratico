<x-admin-layout
  title="Nuevo publicador"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Publicadores', 'route' => 'admin.publishers.index'],
    ['name' => 'Nuevo'],
  ]"
>
  <div class="bg-white rounded-lg shadow p-6">
    <form method="POST" action="{{ route('admin.publishers.store') }}" class="space-y-4">
      @csrf
      @include('admin.publishers._form')
    </form>
  </div>
</x-admin-layout>