<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class AlumnosModel extends Model
{
    protected $table = 'alumnos';
    protected $fillable = [
        'id_alumnos', 'name', 'password', 'email', 'id_grupos', 'matricula', 
    ];
}
