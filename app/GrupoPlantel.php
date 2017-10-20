<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoPlantel extends Model
{
    //
    protected $table='plantel_has_grupos';

    public $timestamps=false;

    protected $fillable=[
    'id_plantel',
    'id_grupos'
    	
    ];
}
