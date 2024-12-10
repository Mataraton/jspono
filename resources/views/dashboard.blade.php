@extends('layout')

@section('content')
    <h1>Dashboard</h1>
    <p>Bienvenido al dashboard de gestión de documentos.</p>
    <a href="{{ route('documents.list') }}">Ver Documentos</a>
@endsection
