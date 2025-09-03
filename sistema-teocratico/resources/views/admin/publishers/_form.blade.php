@php
  $publisher          = $publisher ?? null;
  $selectedPrivileges = $selectedPrivileges ?? old('privileges', []);
  $selectedAssignments= $selectedAssignments ?? old('assignments', []);
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
  <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
    <input name="last_name" value="{{ old('last_name', $publisher->last_name ?? '') }}"
           class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
    @error('last_name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
  </div>
  <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
    <input name="first_name" value="{{ old('first_name', $publisher->first_name ?? '') }}"
           class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
    @error('first_name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Circuito</label>
    <select name="circuit_id" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
      <option value="">Seleccionar…</option>
      @foreach($circuits as $id => $name)
        <option value="{{ $id }}" @selected(old('circuit_id', $publisher->circuit_id ?? '') == $id)>{{ $name }}</option>
      @endforeach
    </select>
    @error('circuit_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Congregación</label>
    <select name="congregation_id" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
      <option value="">Seleccionar…</option>
      @foreach($congregations as $id => $name)
        <option value="{{ $id }}" @selected(old('congregation_id', $publisher->congregation_id ?? '') == $id)>{{ $name }}</option>
      @endforeach
    </select>
    @error('congregation_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Grupo</label>
    <select name="group_id" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
      <option value="">Seleccionar…</option>
      @foreach($groups as $id => $name)
        <option value="{{ $id }}" @selected(old('group_id', $publisher->group_id ?? '') == $id)>{{ $name }}</option>
      @endforeach
    </select>
    @error('group_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
    <select name="status" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
      <option value="bautizado"     @selected(old('status', $publisher->status ?? '') === 'bautizado')>Bautizado</option>
      <option value="no bautizado"  @selected(old('status', $publisher->status ?? '') === 'no bautizado')>No bautizado</option>
    </select>
    @error('status') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Condición</label>
    <select name="condition" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
      <option value="ejemplar"     @selected(old('condition', $publisher->condition ?? '') === 'ejemplar')>Ejemplar</option>
      <option value="no ejemplar"  @selected(old('condition', $publisher->condition ?? '') === 'no ejemplar')>No ejemplar</option>
    </select>
    @error('condition') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
  </div>
</div>

<hr class="my-4">

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
  <div>
    <h3 class="text-sm font-semibold text-gray-700 mb-2">Privilegios</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
      @foreach($privileges as $id => $name)
        <label class="flex items-center gap-2">
          <input type="checkbox" name="privileges[]" value="{{ $id }}"
                 @checked(in_array($id, $selectedPrivileges))>
          <span>{{ $name }}</span>
        </label>
      @endforeach
    </div>
    @error('privileges') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
  </div>

  <div>
    <h3 class="text-sm font-semibold text-gray-700 mb-2">Asignaciones</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
      @foreach($assignments as $id => $name)
        <label class="flex items-center gap-2">
          <input type="checkbox" name="assignments[]" value="{{ $id }}"
                 @checked(in_array($id, $selectedAssignments))>
          <span>{{ $name }}</span>
        </label>
      @endforeach
    </div>
    @error('assignments') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
  </div>
</div>

<div class="pt-4 flex items-center gap-2">
  <a href="{{ route('admin.publishers.index') }}" class="rounded-md border px-3 py-2">Cancelar</a>
  <button class="rounded-md bg-indigo-600 px-3 py-2 text-white hover:bg-indigo-700">Guardar</button>
</div>