<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Colegio Luis Mario Careaga 2 Oruro')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @stack('styles')
</head>

<body>

    {{-- HEADER --}}
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo Unidad Educativa">
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('nosotros') }}">Nosotros</a></li>
                <li><a href="{{ route('contacto') }}">Contacto</a></li>

                @auth
                <li><a href="{{ route('publicaciones.index') }}" class="btn-1">Administrar publicaciones</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" style="background:none; border:none; color:white; cursor:pointer;">Cerrar sesión</button>
                    </form>
                </li>
                @else
                <li><a href="{{ route('login') }}" class="btn-1">Administrar publicaciones</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    {{-- CONTENIDO PRINCIPAL + ASIDE (siempre visible) --}}
    <main>
        @yield('contenido')
    </main>

    <aside>
        <div class="divbtn-modo">
            <button type="button" id="btn-tema" class="boton-modo">🌞 Modo Día</button>
        </div>

        <h3 class="h3-publicaciones">Publicaciones</h3>
        @if(isset($publicaciones) && $publicaciones->count())
        @foreach($publicaciones as $pub)
        <div class="publicacion-item">
            <h4>{{ $pub->titulo }}</h4>
            <p>{{ Str::limit($pub->contenido, 300) }}</p>

            <small>
                {{ optional($pub->fecha_publicacion)->format('d/m/Y H:i') ?? 'Sin fecha' }}
            </small>
            <hr>
        </div>
        @endforeach
        @else
        <p>No hay publicaciones aún.</p>
        @endif
    </aside>

    {{-- FOOTER --}}
    <footer>
        <p>Integradora - Ever Socrates Laime Mamani - 18 de agosto de 2026</p>
        <p>&copy; 2026 Colegio Luis Mario Careaga 2 Oruro. Todos los derechos reservados.</p>
        <p>Dirección: KENNEDY PAGADOR Y POTOSI 1258, ORURO | Teléfono: 5275169</p>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>

</html>
