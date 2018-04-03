<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    function newUser(Request $request){
        try{

            User::create([
                'NOMBRE' => $request->name
                ,'APE_PAT' => $request->ape_pat
                ,'APE_MAT' => $request->ape_mat
                ,'ESTADOID' => $request->estado
                ,'MUNICIPIOID' => $request->municipio
                ,'COLONIAID' => $request->colonia
                ,'CALLE' => $request->calle
                ,'NUMERO' => $request->numero
                ,'CP' => $request->cp
                ,'EMAIL' => $request->mail
                ,'TELEFONO_CEL' => $request->telcel
                ,'TELEFONO_FIJO' => $request->telfij
                ,'FECHA_NAC' => $request->fecha
                ,'USUARIO' => $request->user
                ,'PASSWORD' => bcrypt($request->pass)
            ]);

            $respuesta = ["code" => 200, "msg" => 'El usuario se agrego correctamente', 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e, 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }
}
