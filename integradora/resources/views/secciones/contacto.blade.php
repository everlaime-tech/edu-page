@extends('layouts.base')

@section('titulo', 'Contacto - Colegio Luis Mario Careaga 2 Oruro')

@section('contenido')
<section id="contacto">
    <h2>Formulario de Contacto</h2>
    <p>Déjanos tus datos y consulta, te contactaremos.</p>

    <form action="{{ route('contacto.enviar') }}" method="POST">
        @csrf
        <label for="nombre">Nombre completo del Padre o Tutor:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo">

        <label for="telefono">Teléfono de Contacto/WhatsApp:</label>
        <input type="text" id="telefono" name="telefono">

        <label for="motivo">Motivo de tu consulta:</label>
        <select id="motivo" name="motivo">
            <option value="">Seleccione una opcion</option>
            <option value="informacion bth">Información sobre Carreras Técnicas (BTH)</option>
            <option value="traslado a medio anio">Traslados de Unidad Educativa</option>
            <option value="entrevista con direccion">Solicitud de entrevistas con dirección</option>
            <option value="informacion">Informacion</option>
            <option value="sugerencia">Sugerencias</option>
            <option value="otro">Otro motivo</option>
        </select>

        <label for="mensaje">Mensaje/comentario:</label>
        <textarea id="mensaje" name="mensaje" rows="4"></textarea>
        <br>
        <button type="submit">Enviar Solicitud</button>
    </form>

    <p id="error-mensaje" class="aviso"></p>
    @if(session('mensaje'))
    <div class="aviso exito">{{ session('mensaje') }}</div>
    @endif
</section>
@endsection