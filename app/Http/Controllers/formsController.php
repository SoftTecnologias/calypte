<?php

namespace App\Http\Controllers;

use App\Estado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class formsController extends Controller
{
    function getRegistroForm(){
        return view('forms.registro');
    }

    function getEstados(){
        try{
            $estados = Estado::all();
            $respuesta = ["code" => 200, "msg" => $estados, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function getMunicipios($id){
        try{
            $ciudades = DB::table('MUNICIPIOS')->where('ESTADOID',$id)->get();
            $respuesta = ["code" => 200, "msg" => $ciudades, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function getColonias($id){
        try{
            $localidades = DB::table('COLONIAS')->where('MUNICIPIOID',$id)->get();
            $respuesta = ["code" => 200, "msg" => $localidades, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function getUsers(){
        try{
            $users = DB::table('USERS')->select('USUARIO','EMAIL')->get();

            $respuesta = ["code" => 200, "msg" => $users, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }
}
