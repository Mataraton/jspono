@extends('layout')

@section('content')
<h1>{{ isset($document) ? 'Editar Documento' : 'Crear Documento' }}</h1>

<form action="{{ isset($document) ? route('documents.update', $document->_id) : route('documents.store') }}" method="POST">
    @csrf
    @if(isset($document))
    @method('PUT')
    @endif

    <label for="title">Título:</label>
    <input type="text" name="title" value="{{ $document->title ?? '' }}" required>

    <label for="author">Autor:</label>
    <input type="text" name="author" value="{{ $document->author ?? '' }}" required>

    <label for="content">Contenido:</label>
    <textarea name="content" required>{{ $document->content ?? '' }}</textarea>

    <button type="submit">{{ isset($document) ? 'Actualizar' : 'Crear' }}</button>
</form>
@endsection
