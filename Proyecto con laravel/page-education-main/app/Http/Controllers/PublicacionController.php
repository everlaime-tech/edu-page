<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = Publicacion::latest()->get();
        return view('publicaciones.index', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publicaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|string',
            'activa' => 'boolean',
        ]);

        Publicacion::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'fecha_publicacion' => now(),
            'imagen' => $request->imagen,
            'activa' => $request->activa,

        ]);


        return redirect()->route('publicaciones.index')->with('mensaje', 'Publicación creada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publicacion $publicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publicacion $publicacion)
    {
        return view('publicaciones.edit', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publicacion $publicacion)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|string',
            'activa' => 'boolean',
        ]);

        $data = [
            'titulo' => $request->input('titulo'),
            'contenido' => $request->input('contenido'),
            'imagen' => $request->input('imagen'),
        ];
        $data['activa'] = $request->has('activa') ? 1 : 0;
        $publicacion->update($data);
        return redirect()->route('publicaciones.index')->with('mensaje', 'Publicación actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicacion $publicacion)
    {
        $publicacion->delete();
        return redirect()->route('publicaciones.index')->with('mensaje', 'Publicación eliminada.');
    }
}
