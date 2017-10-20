<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class NivelModel extends Model
{
    protected $table = 'nivel';
    protected $fillable = [
        'id_nivel', 'descripcion',
    ];
}
