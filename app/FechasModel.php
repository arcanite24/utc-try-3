<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class FechasModel extends Model
{
    protected $table = 'fechas';
    protected $primaryKey='id_fecha';
    public $timestamps=false;
    
    protected $fillable = [
        'id_fecha', 'parcial_activo', 'fecha_fin'
    ];
}
