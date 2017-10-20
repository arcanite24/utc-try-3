<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class GruposModel extends Model
{
    protected $table = 'grupos';
    protected $fillable = [
        'id_grupos', 'descripcion', 'id_turno', 'id_carrera', 'id_nivel','id_cuatrimestre',
    ];
}
