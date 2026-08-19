@extends('layouts.base')

@section('titulo', 'Iniciar Sesión')

@section('contenido')
<section id="login">
    <h2>Iniciar Sesión</h2>

    @if($errors->any())
    <div class="aviso error">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="btn-1">Ingresar</button>
    </form>
</section>
@endsection