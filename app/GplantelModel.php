<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class GplantelModel extends Model
{
    protected $table = 'plantel_has_grupos';
    protected $fillable = [
        'id_plantel', 'id_grupos',
    ];
}
