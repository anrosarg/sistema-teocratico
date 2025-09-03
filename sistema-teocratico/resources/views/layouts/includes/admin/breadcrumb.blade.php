{{-- resources/views/layouts/includes/admin/breadcrumb.blade.php --}}
@php
    /**
     * Espera un arreglo $items con elementos tipo:
     *   ['label' => 'Pruebas', 'url' => url('/algo')]   // o 'route' => 'nombre.ruta'
     *   ['label' => 'Pruebas', 'active' => true]        // último activo sin enlace
     *
     * Si no se pasa nada, no muestra nada (no rompe).
     */
    $items = $items ?? [];
@endphp

@if(!empty($items))
    <nav aria-label="Breadcrumb" class="mb-4">
        <ol class="flex items-center text-sm text-gray-500">
            @foreach ($items as $i => $item)
                @php
                    $label  = $item['label'] ?? $item['name'] ?? $item['title'] ?? null;
                    $href   = $item['url'] ?? (isset($item['route']) ? route($item['route'], $item['params'] ?? []) : null);
                    $active = $item['active'] ?? ($i === array_key_last($items));
                @endphp

                @if($i > 0)
                    <li class="px-2 text-gray-400">/</li>
                @endif

                <li class="{{ $active ? 'text-gray-800 font-medium' : 'hover:text-gray-700' }}">
                    @if(!$active && $href)
                        <a href="{{ $href }}">{{ $label }}</a>
                    @else
                        <span>{{ $label }}</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@else
    {{-- Sin items: deja un espacio, no muestra error --}}
    <div class="mb-4"></div>
@endif