<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PgruposModel extends Model
{
    protected $table = 'profesores_has_grupos';
    protected $fillable = [
        'id_profesores', 'id_grupos',
    ];
}
