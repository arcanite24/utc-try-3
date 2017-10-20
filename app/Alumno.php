<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //
    protected $table='alumnos';
    protected $primaryKey='id_alumnos';
    public $timestamps=false;

    protected $fillable=[
    	'name',
    	'password',
        'email',
        'remember_token',
    	'id_grupos',
    	'matricula'
    ];
}
