@extends('layouts.admin')

@section('title', 'Nueva reunión fin de semana')
@section('header', 'Nueva reunión fin de semana')

@section('content')
<form action="{{ route('admin.reunion_fin_de_semana.store') }}" method="POST"
      class="bg-white p-6 sm:p-8 rounded-lg shadow-sm">
    @csrf
    @include('admin.reunion_fin_de_semana._form', ['submitLabel' => 'Guardar'])
</form>
@endsection