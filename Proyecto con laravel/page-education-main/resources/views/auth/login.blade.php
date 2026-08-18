<!DOCTYPE html>
<html>

<head>
    <title>Iniciar Sesión</title>
    <style>
        body {
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: sans-serif;
        }

        .login-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-box label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        .login-box input {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            background: #ff9000;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }

        .login-box .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Iniciar Sesión</h2>

        @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>

</html>