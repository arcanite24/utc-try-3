<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class CarreraModel extends Model
{
    protected $table = 'carrera';
    protected $fillable = [
        'id_carrera', 'descripcion',
    ];
}
