<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "USERS";
    public $timestamps = false;
    protected $fillable = [
        'id'
        ,'NOMBRE'
        ,'APE_PAT'
        ,'APE_MAT'
        ,'ESTADOID'
        ,'MUNICIPIOID'
        ,'COLONIAID'
        ,'CALLE'
        ,'NUMERO'
        ,'CP'
        ,'EMAIL'
        ,'TELEFONO_CEL'
        ,'TELEFONO_FIJO'
        ,'FECHA_NAC'
        ,'USUARIO'
        ,'PASSWORD'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
