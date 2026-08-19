@extends('layouts.base')

@section('titulo', 'Nueva Publicación')

@section('contenido')
<div class="panel-container">
    <h1>Nueva Publicación</h1>

    <form action="{{ route('publicaciones.store') }}" method="POST">
        @csrf
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="contenido">Contenido:</label>
        <textarea id="contenido" name="contenido" rows="4" required></textarea>

        <label for="imagen">URL de imagen (opcional):</label>
        <input type="text" id="imagen" name="imagen" placeholder="ruta de la imagen">

        <label>
            <input type="checkbox" name="activa" value="1" checked> Activa
        </label>

        <button type="submit" class="btn-1">Guardar</button>
        <a href="{{ route('publicaciones.index') }}" class="btn-2">Cancelar</a>
    </form>
</div>
@endsection
