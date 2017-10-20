<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ProfesoresModel extends Model
{
    protected $table = 'profesores';
    protected $primaryKey='id_profesores';
    public $timestamps=false;

    protected $fillable = [
      'name', 'email', 'cardex','password','calificacion','rubro1','rubro2',
    ];
}
