<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Alumnos_bachModel extends Model
{
    protected $table = 'alumnos_bach';
    protected $fillable = [
        'id_alumnos_bach', 'matricula', 'nombre', 'password', 'id_grupos',
    ];
}
