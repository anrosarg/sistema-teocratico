@php
    /** @var \App\Models\ReunionEntreSemana|null $reunion */
    $isEdit = isset($reunion);
@endphp

<form method="POST" action="{{ $isEdit ? route('admin.reunion_entre_semana.update', $reunion) : route('admin.reunion_entre_semana.store') }}"
      class="bg-white rounded-lg shadow-sm p-6 space-y-5">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div>
        <label class="block text-sm font-medium mb-1">Fecha</label>
        <input type="date" name="fecha" class="w-full border rounded px-3 py-2"
               value="{{ old('fecha', $isEdit ? $reunion->fecha : '') }}" required>
        @error('fecha') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Acomodador Puerta</label>
            <select name="acomodador_puerta_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Seleccioná --</option>
                @foreach($puerta as $p)
                    <option value="{{ $p->id }}"
                        @selected(old('acomodador_puerta_id', $isEdit? $reunion->acomodador_puerta_id : null) == $p->id)>
                        {{ $p->nombre_completo }}
                    </option>
                @endforeach
            </select>
            @error('acomodador_puerta_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Acomodador Auditorio</label>
            <select name="acomodador_auditorio_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Seleccioná --</option>
                @foreach($auditorio as $p)
                    <option value="{{ $p->id }}"
                        @selected(old('acomodador_auditorio_id', $isEdit? $reunion->acomodador_auditorio_id : null) == $p->id)>
                        {{ $p->nombre_completo }}
                    </option>
                @endforeach
            </select>
            @error('acomodador_auditorio_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Micrófono 1</label>
            <select name="microfono_1_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Seleccioná --</option>
                @foreach($mic1 as $p)
                    <option value="{{ $p->id }}"
                        @selected(old('microfono_1_id', $isEdit? $reunion->microfono_1_id : null) == $p->id)>
                        {{ $p->nombre_completo }}
                    </option>
                @endforeach
            </select>
            @error('microfono_1_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Micrófono 2</label>
            <select name="microfono_2_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Seleccioná --</option>
                @foreach($mic2 as $p)
                    <option value="{{ $p->id }}"
                        @selected(old('microfono_2_id', $isEdit? $reunion->microfono_2_id : null) == $p->id)>
                        {{ $p->nombre_completo }}
                    </option>
                @endforeach
            </select>
            @error('microfono_2_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Audio</label>
            <select name="encargado_audio_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Seleccioná --</option>
                @foreach($audio as $p)
                    <option value="{{ $p->id }}"
                        @selected(old('encargado_audio_id', $isEdit? $reunion->encargado_audio_id : null) == $p->id)>
                        {{ $p->nombre_completo }}
                    </option>
                @endforeach
            </select>
            @error('encargado_audio_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Video</label>
            <select name="encargado_video_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Seleccioná --</option>
                @foreach($video as $p)
                    <option value="{{ $p->id }}"
                        @selected(old('encargado_video_id', $isEdit? $reunion->encargado_video_id : null) == $p->id)>
                        {{ $p->nombre_completo }}
                    </option>
                @endforeach
            </select>
            @error('encargado_video_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Plataforma</label>
            <select name="plataforma_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Seleccioná --</option>
                @foreach($plataforma as $p)
                    <option value="{{ $p->id }}"
                        @selected(old('plataforma_id', $isEdit? $reunion->plataforma_id : null) == $p->id)>
                        {{ $p->nombre_completo }}
                    </option>
                @endforeach
            </select>
            @error('plataforma_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="flex justify-end gap-3 pt-2">
        <a href="{{ route('admin.reunion_entre_semana.index') }}" class="px-4 py-2 rounded border">Cancelar</a>
        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">
            {{ $isEdit ? 'Actualizar' : 'Guardar' }}
        </button>
    </div>
</form>