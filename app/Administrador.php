<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    //
    protected $table='administrador';
    protected $primaryKey='id_administrador';
    public $timestamps=false;

    protected $fillable=[
    	'name',
    	'cardex',
    	'password',
    	'email',
    	'id_plantel',
        'tipoAdmin'

    ];
}
