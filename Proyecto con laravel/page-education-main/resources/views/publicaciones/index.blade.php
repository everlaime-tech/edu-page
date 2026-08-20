@extends('layouts.base')

@section('titulo', 'Publicaciones')

@section('contenido')
<div class="panel-container">
    <h1>Publicaciones</h1>
    <a href="{{ route('publicaciones.create') }}" class="btn-1">Nueva Publicación</a>

    @if(session('mensaje'))
    <div class="aviso exito">{{ session('mensaje') }}</div>
    @endif

    @forelse($publicaciones as $publicacion)
    <div class="card">
        <h4>{{ $publicacion->titulo }}</h4>
        <p>{{ Str::limit($publicacion->contenido, 300) }}</p>
        <small>Fecha: {{ $pub->fecha_publicacion ?? 'Sin fecha' }} | Activa: {{ $publicacion->activa ? 'Sí' : 'No' }}</small>
        <div class="acciones">
            <a href="{{ route('publicaciones.edit', $publicacion) }}" class="btn-2">Editar</a>
            <form action="{{ route('publicaciones.destroy', $publicacion) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" class="btn-3" onclick="return confirm('¿Eliminar?')">Eliminar</button>
            </form>
        </div>
    </div>
    @empty
    <p>No hay publicaciones.</p>
    @endforelse
</div>
@endsection
