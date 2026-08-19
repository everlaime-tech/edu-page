@extends('layouts.base')

@section('titulo', 'Librería El Lápiz')

@section('contenido')
<div>
    <h1>Librería El Lápiz</h1>

    <p>
        Bienvenidos a nuestra librería de barrio, donde cada libro cuenta una historia.
    </p>

    <p>Hay {{ count($libros) }} libros en el catálogo</p>

    <ul>
        @foreach($libros as $libro)
        <li>
            <strong>{{ $libro->titulo }}</strong> - Bs. {{ $libro->precio }}
        </li>
        @endforeach
    </ul>

    <p>
        Catálogo atendido por Ever Laime
    </p>

    <a href="{{ url('/libros/nuevo') }}" class="btn-1">Agregar nuevo libro</a>
</div>
@endsection
