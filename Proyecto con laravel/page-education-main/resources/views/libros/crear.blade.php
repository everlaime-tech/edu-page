@extends('layouts.base')

@section('titulo', 'Librería El Lápiz - Nuevo Libro')

@section('contenido')
<div>
    <h1>Agregar un nuevo libro</h1>

    @if ($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/libros/nuevo" method="POST">
        @csrf

        <label for="titulo">Título del libro:</label>
        <input type="text" id="titulo" name="titulo">

        <label for="precio">Precio en Bs:</label>
        <input type="number" id="precio" name="precio">

        <button type="submit">Registrar libro</button>
    </form>
</div>
@endsection
