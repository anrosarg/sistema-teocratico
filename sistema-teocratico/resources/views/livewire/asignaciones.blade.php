<div>
    <h2 class="text-2xl font-bold mb-4">Asignaciones - Reunión entre semana</h2>
    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="p-2 border">Fecha</th>
                <th class="p-2 border">Puerta</th>
                <th class="p-2 border">Auditorio</th>
                <th class="p-2 border">Mic 1</th>
                <th class="p-2 border">Mic 2</th>
                <th class="p-2 border">Audio</th>
                <th class="p-2 border">Video</th>
                <th class="p-2 border">Plataforma</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reuniones as $reunion)
                <tr class="text-sm text-gray-800 text-center">
                    <td class="p-2 border">{{ \Carbon\Carbon::parse($reunion->fecha)->format('d/m/Y') }}</td>
                    <td class="p-2 border">{{ $reunion->acomodadorPuerta?->nombre_completo ?? '—' }}</td>
                    <td class="p-2 border">{{ $reunion->acomodadorAuditorio?->nombre_completo ?? '—' }}</td>
                    <td class="p-2 border">{{ $reunion->microfono1?->nombre_completo ?? '—' }}</td>
                    <td class="p-2 border">{{ $reunion->microfono2?->nombre_completo ?? '—' }}</td>
                    <td class="p-2 border">{{ $reunion->encargadoAudio?->nombre_completo ?? '—' }}</td>
                    <td class="p-2 border">{{ $reunion->encargadoVideo?->nombre_completo ?? '—' }}</td>
                    <td class="p-2 border">{{ $reunion->plataforma?->nombre_completo ?? '—' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
