<!DOCTYPE html>
<html>

<head>
    <title>Administrar Publicaciones</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> -->
    <style>
        body {
            background: #f5f5f5;
            padding: 20px;
            font-family: sans-serif;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn-warning {
            background: #ffc107;
            color: black;
        }

        .card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 6px;
        }

        .card h4 {
            margin-top: 0;
        }

        .acciones {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Publicaciones</h1>
        <a href="{{ route('publicaciones.create') }}" class="btn">Nueva Publicación</a>

        @if(session('mensaje'))
        <div style="background: #28a745; color: white; padding: 10px; margin: 15px 0; border-radius: 4px;">
            {{ session('mensaje') }}
        </div>
        @endif

        @forelse($publicaciones as $pub)
        <div class="card">
            <h4>{{ $pub->titulo }}</h4>
            <p>{{ Str::limit($pub->contenido, 150) }}</p>
            <small>Fecha: {{ $pub->fecha_publicacion ?? 'Sin fecha' }} | Activa: {{ $pub->activa ? 'Sí' : 'No' }}</small>
            <div class="acciones">
                <a href="{{ route('publicaciones.edit', $pub) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('publicaciones.destroy', $pub) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                </form>
            </div>
        </div>
        @empty
        <p>No hay publicaciones.</p>
        @endforelse
    </div>
</body>

</html>