<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    //
    protected $table='nivel';
    protected $primaryKey='id_nivel';
    public $timestamps=false;

    protected $fillable=[
    	'descripcion'
    ];
}
