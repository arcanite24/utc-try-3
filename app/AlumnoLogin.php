<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AlumnoLogin extends Authenticatable
{
	use Notifiable;
    //protected $guard = 'alumno';
    protected $table = 'alumnos';
    protected $primaryKey = 'id_alumnos';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cardex',
    	'email',
        'id_grupos'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
