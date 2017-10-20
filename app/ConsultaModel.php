<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultaModel extends Model
{
    protected $table = 'calificaciones';
    protected $primaryKey='id_calificaciones';
    public $timestamps=false;

    protected $fillable = [
        'id_calificaciones','id','id_materia','matricula','parcial1', 'parcial2', 'parcial3', 'updated_at', 'created_at',
    ];
}
