<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoTravel extends Model
{
    protected $table = "infoTravel";
    public $timestamps = false;
    protected $fillable = [
        'id'
        ,'idUsuario'
        ,'lat_inicio'
        ,'lng_inicio'
        ,'lat_final'
        ,'lng_final'
        ,'hora_inicio'
        ,'hora_final'
        ,'estado'
    ];
}
