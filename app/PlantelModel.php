<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PlantelModel extends Model
{
    protected $table = 'plantel';
    protected $fillable = [
        'id_plantel', 'descripcion',
    ];
}
