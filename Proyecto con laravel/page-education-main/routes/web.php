<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PublicacionController;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('landing');
});


Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.enviar');

Route::get('/', function () {
    $publicaciones = App\Models\Publicacion::where('activa', true)
        ->orderBy('fecha_publicacion', 'desc')
        ->take(5)
        ->get();
    return view('landing', compact('publicaciones'));
});


Route::resource('publicaciones', PublicacionController::class);





//login
// Login (GET) - muestra el formulario
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

// Login (POST) - procesa el login
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

// Logout
Route::post('/logout', function (Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Panel de publicaciones (protegido)
Route::middleware(['auth'])->group(function () {
    Route::resource('publicaciones', PublicacionController::class);
});
