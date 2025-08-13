@php
  /** Estructura esperada:
   * $breadcrumbs = [
   *   ['name' => 'Inicio',   'route' => 'admin.dashboard'],
   *   ['name' => 'Usuarios', 'route' => 'admin.users.index', 'params' => []],
   *   ['name' => 'Crear'] // último sin link (activo)
   * ];
   */
  $items = $breadcrumbs ?? [];
@endphp

@if (!empty($items))
  <nav class="mb-4" aria-label="Breadcrumb">
    <ol class="flex flex-wrap items-center text-sm text-slate-700">
      @foreach ($items as $i => $item)
        @php
          $label  = $item['name'] ?? $item['label'] ?? '';
          $href   = $item['href']
                    ?? (isset($item['route']) && Route::has($item['route'])
                          ? route($item['route'], $item['params'] ?? [])
                          : null);
          $isLast = $i === array_key_last($items);
        @endphp

        @if ($i > 0)
          <li class="px-2 select-none text-gray-400">/</li>
        @endif

        <li class="leading-normal">
          @if (!$isLast && $href)
            <a href="{{ $href }}" class="opacity-60 hover:opacity-100 hover:underline">{{ $label }}</a>
          @else
            <span class="font-semibold text-gray-800">{{ $label }}</span>
          @endif
        </li>
      @endforeach
    </ol>

    @php $last = $items[array_key_last($items)] ?? null; @endphp
    @if ($last && ($last['name'] ?? $last['label'] ?? null))
      <h6 class="mt-1 font-bold">
        {{ $last['name'] ?? $last['label'] }}
      </h6>
    @endif
  </nav>
@endif