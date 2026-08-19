@extends('layouts.base')

@section('titulo', 'Inicio - Colegio Luis Mario Careaga 2 Oruro')

@section('contenido')
<section id="inicio">
    <h1>Colegio Luis Mario Careaga 2 Oruro</h1>
    <p>Gestión escolar 2026.</p><br>
    <img src="{{ asset('images/img2.png') }}" alt="Unidad Educativa">
    <br>
</section>

<section id="nosotros">
    <h2>Acerca de Nosotros</h2>
    <p>
        LUIS MARIO CAREAGA 2 es una institución educativa de nivel con administración Fiscales, ubicada en KENNEDY PAGADOR Y POTOSI 1258, ORURO, en la Región ORURO.
        Su código RUE es 81230293. Actualmente, cuenta con 733 alumnos y 0 profesores. Puedes contactarla al teléfono 5280780
    </p>
    <p>Imparte enseñanza en el niveles: SECUNDARIA COMUNITARIA PRODUCTIVA turno TARDE.</p>
    <p>Cuenta con instalaciones educativas que incluyen gabinete de computacion, cancha polifuncional deportivo.</p>
    <p>Ofrecemos una educación integral basada en competencias, la innovación tecnológica, musica y el desarrollo de valores humanos indispensables para el mañana.</p>
    <ul>
        <li>Docentes calificados</li>
        <li>Laboratorios de ciencia y computación</li>
        <li>Club de banda de Musica</li>
        <li>Talleres artísticos y disciplinas deportivas</li>
    </ul>
</section>

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