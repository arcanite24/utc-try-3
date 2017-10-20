<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    //
    protected $table='profesores';
    protected $primaryKey='id_profesores';
    public $timestamps=false;

    protected $fillable=[
    	'name',
    	'cardex',
    	'password',
    	'email'

    ];
}
