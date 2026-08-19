<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $fillable = [
        'titulo',
        'contenido',
        'fecha_publicacion',
        'imagen',
        'activa',


    ];

    protected $casts = [
        'fecha_publicacion' => 'datetime',
        'activa' => 'boolean',
    ];
}
