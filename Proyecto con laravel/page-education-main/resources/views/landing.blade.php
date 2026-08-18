<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegio Luis Mario Careaga 2 Oruro</title>
    <style>
    </style>
    <link rel="stylesheet" href="{{asset('css/styles.css') }}">
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{asset('images/logo.jpg')}}" alt="Logo Unidad Educativa">
        </div>
        <nav>
            <ul>
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="{{ route('publicaciones.index') }}" class="btn-1">Administrar publicaciones</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="inicio">
            <h1>Colegio Luis Mario Careaga 2 Oruro</h1>
            <p>Gestión escolar 2026.</p><br>
            <img src="{{ asset('images/img2.png') }}" alt="Unidad Educativa">
            <!-- <p> Inscipciones Cerradas</p> -->
            <br>

        </section>

        <section id="nosotros">
            <h2>Acerca de Nosotros</h2>
            <p>
                LUIS MARIO CAREAGA 2 es una institución educativa de nivel con administración Fiscales, ubicada en KENNEDY PAGADOR Y POTOSI 1258, ORURO, en la Región ORURO.

                Su código RUE es 81230293. Actualmente, cuenta con 733 alumnos y 0 profesores. Puedes contactarla al teléfono 5280780</p>

            <p>Imparte enseñanza en el niveles: SECUNDARIA COMUNITARIA PRODUCTIVA turno TARDE.</p>

            <p>Además, ofrece programas de educación especial: .</p>

            <p>Programas de apoyo al aprendizaje: y programas de orientación: .</p>

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

            <form action="{{ route('contacto.enviar') }}" id="form-preinscripcion" method="POST">
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
                    <option value="traslado a medio anio">Traslados de Unidad Educativa (para traslados a medio año)</option>
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
    </main>

    <aside>
        <div class="divbtn-modo">
            <button type="button"
                id="btn-tema"
                class="boton-modo">🌞 Modo Día
            </button>
        </div>

        <h3>Publicaciones</h3>
        @if(isset($publicaciones) && $publicaciones->count())
        @foreach($publicaciones as $pub)
        <div class="publicacion-item">
            <h4>{{ $pub->titulo }}</h4>
            <p>{{ Str::limit($pub->contenido, 120) }}</p>
            <small>{{ optional($pub->fecha_publicacion)->format('d/m/Y') ?? 'Sin fecha' }}</small>
            <hr>
        </div>
        @endforeach
        @else
        <p>No hay publicaciones aún.</p>
        @endif
    </aside>



    <!-- PIE DE PÁGINA -->
    <footer>
        <p>&copy; 2026 Colegio Luis Mario Careaga 2 Oruro. Todos los derechos reservados.</p>
        <p>Dirección: KENNEDY PAGADOR Y POTOSI 1258, ORURO | Teléfono: 5275169</p>
    </footer>

    <script src="{{asset('js/script.js')}}">

    </script>
</body>


</html>