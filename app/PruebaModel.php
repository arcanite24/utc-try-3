<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PruebaModel extends Model
{
    protected $table = 'prueba';
    protected $fillable = [
        'id_prueba', 'id_alumno', 'id_profesores', 'id_nivel','p1','p2','p3','p4','p5','p6','p7','p8','p9','p10','comentario',
    ];
}
