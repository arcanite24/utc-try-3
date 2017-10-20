<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //
    protected $table='carrera';
    protected $primaryKey='id_carrera';
    public $timestamps=false;

    protected $fillable=[
    	'descripcionc'
    ];
}
