<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    protected $table='grupos';
    protected $primaryKey='id_grupos';
    public $timestamps=false;

    protected $fillable=[
    	'descripciong',
    	'id_turno',
    	'id_carrera',
    	'id_nivel',
    	'id_cuatrimestre'

    ];
}
