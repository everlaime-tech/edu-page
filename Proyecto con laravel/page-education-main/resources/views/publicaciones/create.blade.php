<!DOCTYPE html>
<html>

<head>
    <title>Nueva Publicación</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> -->
    <style>
        body {
            background: #f5f5f5;
            padding: 20px;
            font-family: sans-serif;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 12px;
        }

        .btn-secondary {
            background: #6c757d;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Nueva Publicación</h1>
        <form action="{{ route('publicaciones.store') }}" method="POST">
            @csrf
            <label>Título:</label>
            <input type="text" name="titulo" required>

            <label>Contenido:</label>
            <textarea name="contenido" rows="4" required></textarea>

            <label>Fecha de publicación:</label>
            <input type="datetime-local" name="fecha_publicacion">

            <label>URL de imagen (opcional):</label>
            <input type="text" name="imagen" placeholder="ruta de la imagen">

            <label>
                <input type="checkbox" name="activa" value="1" checked> Activa
            </label>

            <button type="submit" class="btn">Guardar</button>
            <a href="{{ route('publicaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>