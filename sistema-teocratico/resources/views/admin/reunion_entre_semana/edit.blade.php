@extends('layouts.admin')

@section('content')
<div class="p-4 sm:p-6">
    <h1 class="text-xl sm:text-2xl font-semibold mb-4">Editar reunión — {{ \Illuminate\Support\Carbon::parse($reunion->fecha)->format('d/m/Y') }}</h1>
    @include('admin.reunion_entre_semana._form', ['reunion' => $reunion])
</div>
@endsection