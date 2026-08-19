@extends('layouts.base')

@section('titulo', 'Editar Publicación')

@section('contenido')
<div class="panel-container">
    <h1>Editar Publicación</h1>

    <form action="{{ route('publicaciones.update', $publicacion) }}" method="POST">
        @csrf @method('PUT')

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $publicacion->titulo) }}" required>

        <label for="contenido">Contenido:</label>
        <textarea id="contenido" name="contenido" rows="4" required>{{ old('contenido', $publicacion->contenido) }}</textarea>

        <label for="imagen">URL de imagen (opcional):</label>
        <input type="text" id="imagen" name="imagen" value="{{ old('imagen', $publicacion->imagen) }}" placeholder="ruta de la imagen">

        <label>
            <input type="checkbox" name="activa" value="1" {{ old('activa', $publicacion->activa) ? 'checked' : '' }}> Activa
        </label>

        <button type="submit" class="btn-1">Actualizar</button>
        <a href="{{ route('publicaciones.index') }}" class="btn-2">Cancelar</a>
    </form>
</div>
@endsection