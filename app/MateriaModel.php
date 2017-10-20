<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaModel extends Model
{
    protected $table = 'materia';

    protected $fillable = [
        'id_materias','descripcion',
    ];
}
