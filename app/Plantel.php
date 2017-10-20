<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantel extends Model
{
    //
    protected $table='plantel';
    protected $primaryKey='id_plantel';
    public $timestamps=false;

    protected $fillable=[
    	'descripcion'
    ];
}
