<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class AdministradorModel extends Model
{
    protected $table = 'administrador';
    protected $fillable = [
        'id_administrador', 'name', 'cardex', 'password', 'email', 'id_plantel', 'id_tipoAdmin'
    ];
}
