<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PublicacionController;
use App\Models\Libro;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Landing - Inicio
Route::get('/', function () {
    $publicaciones = Publicacion::where('activa', true)
        ->orderBy('fecha_publicacion', 'desc')
        ->take(5)
        ->get();
    return view('secciones.inicio', compact('publicaciones'));
})->name('home');

// Sección Nosotros
Route::get('/nosotros', function () {
    $publicaciones = Publicacion::where('activa', true)
        ->orderBy('fecha_publicacion', 'desc')
        ->take(5)
        ->get();
    return view('secciones.nosotros', compact('publicaciones'));
})->name('nosotros');

// Sección Contacto
Route::get('/contacto', function () {
    $publicaciones = Publicacion::where('activa', true)
        ->orderBy('fecha_publicacion', 'desc')
        ->take(5)
        ->get();
    return view('secciones.contacto', compact('publicaciones'));
})->name('contacto');

// Ruta POST para el formulario de contacto
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.enviar');

// ==================== AUTENTICACIÓN ====================

// Mostrar formulario de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

// Procesar login
Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/publicaciones');
    }

    return back()->withErrors([
        'email' => 'Las credenciales no coinciden.',
    ]);
})->name('login.post');

// Cerrar sesión
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// ==================== PANEL DE ADMINISTRACIÓN (PROTEGIDO) ====================

Route::middleware(['auth'])->group(function () {
    Route::resource('publicaciones', PublicacionController::class)
        ->parameters(['publicaciones' => 'publicacion']);
});






//Examen integradora

Route::get('/libros', function () {
    $libros = Libro::all();
    return view('libros.index', compact('libros'));
});

Route::get('/libros/nuevo', function () {
    return view('libros.crear');
});

Route::post('/libros/nuevo', function () {
    $validated = request()->validate([
        'titulo' => 'required',
        'precio' => 'required|integer',
    ], [
        'titulo.required' => 'Falta el título del libro.',
        'precio.required' => 'Falta el precio del libro.',
        'precio.integer' => 'Ese precio no es un número entero.',
    ]);

    Libro::create($validated);

    return redirect('/libros');
});
