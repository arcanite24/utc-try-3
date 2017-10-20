<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuatrimestre extends Model
{
    //
    protected $table='cuatrimestre';
    protected $primaryKey='id_cuatrimestre';
    public $timestamps=false;

    protected $fillable=[
    	'descripcion'
    ];
}
