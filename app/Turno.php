<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    //
    protected $table='turno';
    protected $primaryKey='id_turno';
    public $timestamps=false;

    protected $fillable=[
    	'descripciont'
    ];
}
