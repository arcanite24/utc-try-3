<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperUser extends Model
{
    //
    protected $table='superuser';
    protected $primaryKey='id_superUser';
    public $timestamps=false;

    protected $fillable=[
    	'name',
    	'cardex',
    	'password',
    	'email',
    	'id_plantel',

    ];
}
