<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class projeto extends Model
{
    //
    protected $fillable = [
        'nome',
        'objetivo',
        'categoria',
        'img'
    ];
}
