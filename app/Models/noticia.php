<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    //
    protected $fillable = [
        'titulo',
        'subtitulo',
        'categoria',
        'img',
        'noticia'
    ];
}
