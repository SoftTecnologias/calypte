<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $table = "CONTACTOS_CONFIANZA";
    public $timestamps = false;
    protected $fillable = [
        'idUsuario'
        ,'TELEFONO'
    ];
}
