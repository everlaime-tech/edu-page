@extends('layouts.base')

@section('titulo', 'Administrar Publicaciones')

@section('contenido')
<div class="panel-container">
    <h1>Publicaciones</h1>
    <a href="{{ route('publicaciones.create') }}" class="btn-1">Nueva Publicación</a>

    @if(session('mensaje'))
    <div class="aviso exito">{{ session('mensaje') }}</div>
    @endif

    @forelse($publicaciones as $pub)
    <div class="card">
        <h4>{{ $pub->titulo }}</h4>
        <p>{{ Str::limit($pub->contenido, 150) }}</p>
        <small>Fecha: {{ $pub->fecha_publicacion ?? 'Sin fecha' }} | Activa: {{ $pub->activa ? 'Sí' : 'No' }}</small>
        <div class="acciones">
            <a href="{{ route('publicaciones.edit', $pub) }}" class="btn-2">Editar</a>
            <form action="{{ route('publicaciones.destroy', $pub) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" class="btn-2" onclick="return confirm('¿Eliminar?')">Eliminar</button>
            </form>
        </div>
    </div>
    @empty
    <p>No hay publicaciones.</p>
    @endforelse
</div>
@endsection