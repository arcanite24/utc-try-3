<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TurnoModel extends Model
{
    protected $table = 'turno';
    protected $fillable = [
        'id_turno', 'descripcion', 
    ];
}
