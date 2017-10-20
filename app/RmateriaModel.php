<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RmateriaModel extends Model
{
    protected $table = 'grupos_has_materias';

    protected $fillable = [
        'id_grupos','id_materias', 'id_profesores',
    ];
}
