@props(['privilege' => null])

<div class="grid grid-cols-1 gap-4">
  <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
    <input
      name="name"
      value="{{ old('name', $privilege->name ?? '') }}"
      class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
      required maxlength="120"
    >
    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
  </div>
</div>

<div class="pt-4 flex items-center gap-2">
  <a href="{{ route('admin.privileges.index') }}" class="rounded-md border px-3 py-2">Cancelar</a>
  <button class="rounded-md bg-indigo-600 px-3 py-2 text-white hover:bg-indigo-700">Guardar</button>
</div>