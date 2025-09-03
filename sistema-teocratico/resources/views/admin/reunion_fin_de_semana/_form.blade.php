@php
    $isEdit = isset($reunion);
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Fecha --}}
    <div class="md:col-span-2">
        <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1">Fecha</label>
        <input type="date" id="fecha" name="fecha"
               value="{{ old('fecha', $isEdit ? \Illuminate\Support\Carbon::parse($reunion->fecha)->format('Y-m-d') : '') }}"
               class="w-full rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
        @error('fecha') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Presidente --}}
    <div>
        <label for="presidente_id" class="block text-sm font-medium text-gray-700 mb-1">Presidente</label>
        <select id="presidente_id" name="presidente_id"
                class="w-full rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
            <option value="">-- Seleccioná un publicador --</option>
            @foreach($presidentes as $p)
                <option value="{{ $p->id }}"
                    @selected(old('presidente_id', $isEdit ? $reunion->presidente_id : null) == $p->id)>
                    {{ $p->last_name }}, {{ $p->first_name }}
                </option>
            @endforeach
        </select>
        @error('presidente_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Lector --}}
    <div>
        <label for="lector_id" class="block text-sm font-medium text-gray-700 mb-1">Lector</label>
        <select id="lector_id" name="lector_id"
                class="w-full rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
            <option value="">-- Seleccioná un publicador --</option>
            @foreach($lectores as $p)
                <option value="{{ $p->id }}"
                    @selected(old('lector_id', $isEdit ? $reunion->lector_id : null) == $p->id)>
                    {{ $p->last_name }}, {{ $p->first_name }}
                </option>
            @endforeach
        </select>
        @error('lector_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Orador --}}
    <div>
        <label for="orador" class="block text-sm font-medium text-gray-700 mb-1">Orador</label>
        <input type="text" id="orador" name="orador"
               value="{{ old('orador', $isEdit ? $reunion->orador : '') }}"
               class="w-full rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
        @error('orador') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Congregación --}}
    <div>
        <label for="congregacion" class="block text-sm font-medium text-gray-700 mb-1">Congregación</label>
        <input type="text" id="congregacion" name="congregacion"
               value="{{ old('congregacion', $isEdit ? $reunion->congregacion : '') }}"
               class="w-full rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
        @error('congregacion') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Tema --}}
    <div class="md:col-span-2">
        <label for="tema" class="block text-sm font-medium text-gray-700 mb-1">Tema del discurso</label>
        <input type="text" id="tema" name="tema" maxlength="256"
               value="{{ old('tema', $isEdit ? $reunion->tema : '') }}"
               class="w-full rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
        @error('tema') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- La Atalaya --}}
    <div class="md:col-span-2">
        <label for="la_atalaya" class="block text-sm font-medium text-gray-700 mb-1">La Atalaya</label>
        <input type="text" id="la_atalaya" name="la_atalaya"
               value="{{ old('la_atalaya', $isEdit ? $reunion->la_atalaya : '') }}"
               class="w-full rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
        @error('la_atalaya') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="flex justify-end gap-3 mt-6">
    <a href="{{ route('admin.reunion_fin_de_semana.index') }}"
       class="px-4 py-2 rounded border border-gray-300 text-gray-700 hover:bg-gray-50">
        Cancelar
    </a>
    <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
        {{ $submitLabel ?? 'Guardar' }}
    </button>
</div>