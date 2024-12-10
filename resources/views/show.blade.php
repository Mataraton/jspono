@extends('layout')

@section('content')
<h1>Detalles del Documento</h1>
<p><strong>ID:</strong> {{ $document->_id }}</p>
<p><strong>Título:</strong> {{ $document->title }}</p>
<p><strong>Autor:</strong> {{ $document->author }}</p>
<p><strong>Contenido:</strong> {{ $document->content }}</p>
@endsection
