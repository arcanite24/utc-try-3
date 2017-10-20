<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaltasModel extends Model
{
    protected $table = 'faltas';
    protected $primaryKey='id_faltas';
    public $timestamps=false;

    protected $fillable = [
        'id_faltas', 'id','id_materia', 'matricula', 'parcial1', 'parcial2', 'parcial3','updated_at', 'created_at',
    ];
}