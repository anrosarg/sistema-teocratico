@extends('layouts.admin')

@section('title', 'Editar reunión fin de semana')
@section('header', 'Editar reunión fin de semana')

@section('content')
<form action="{{ route('admin.reunion_fin_de_semana.update', $reunion->id) }}" method="POST"
      class="bg-white p-6 sm:p-8 rounded-lg shadow-sm">
    @csrf
    @method('PUT')
    @include('admin.reunion_fin_de_semana._form', ['submitLabel' => 'Actualizar'])
</form>
@endsection