@extends('layout')

@section('content')
<h1>Documentos</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Acciones</th>
    </tr>
    @foreach ($documents as $document)
    <tr>
        <td>{{ $document->id }}</td>
        <td>{{ $document->doc->title ?? 'Sin título' }}</td>
        <td>{{ $document->doc->author ?? 'Desconocido' }}</td>
        <td>
            <a href="{{ route('documents.show', $document->id) }}">Ver</a>
            <a href="{{ route('documents.edit', $document->id) }}">Editar</a>
            <form action="{{ route('documents.delete', $document->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
