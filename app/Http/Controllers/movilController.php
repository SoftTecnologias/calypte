<?php

namespace App\Http\Controllers;

use App\Contactos;
use App\InfoTravel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use function MongoDB\BSON\toJSON;

class movilController extends Controller
{

    function newTravel(Request $request,$id){
      try {
          $idTravel = DB::table('infoTravel')->insertGetId([
              'idUsuario' => $id
              , 'lat_inicio' => $request->lat
              , 'lng_inicio' => $request->lng
              , 'lat_final' => ''
              , 'lng_final' => ''
              , 'hora_inicio' => ''
              , 'hora_final' => ''
              , 'estado' => true
          ]);

          $mongo = DB::connection('mongodb');

          $mongo->collection('test01')->insert(["id"=>$idTravel+0,"coords"=>['lat' => [], 'lng' => [] ]]);

            return Response::json($idTravel);

      }catch (Exception $e){
          return $e;
      }

    }

    function pointsTravel(Request $request,$id){
        try {
            $mongo = DB::connection('mongodb');

            $mongo->collection('test01')->where('id',$id+0)->push(["coords.lat"=>$request->lat,"coords.lng"=>$request->lng]);

            //return $mongo->collection('test01')->where('id',$id+0)->get();

        }catch (Exception $e){
            return $e->getMessage();
        }

    }

    function InformacionContato(Request $request,$id){
        try{
            $info = InfoTravel::where('estado','=',1)->where('idUsuario','=',$id)->firstOrFail();
            return Response::json($info);
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    function pointsContact($id){
        try {
            $mongo = DB::connection('mongodb');

            //$mongo->collection('test01')->where('id',$id+0)->push(["coords.lat"=>$request->lat,"coords.lng"=>$request->lng]);

            return $mongo->collection('test01')->where('id',$id+0)->get();

        }catch (Exception $e){
            return $e->getMessage();
        }

    }

    function login(Request $request){
        try{


            $us = User::where('USUARIO','=',$request->usuario)->first();
            if($us != null) {

                if (Hash::check($request->pass, $us->PASSWORD)) {
                    $respuesta = ["code" => 200, "data" => $us, "message" => "success"];
                } else {
                    $respuesta = ["code" => 404, "data" => "usuario o contraseña incorrectos", "message" => "error"];
                }
            }else{
                $respuesta = ["code"=>404,"data"=>$request,"message"=>"error"];
            }
        }catch (Exception $e){
            $respuesta = ["code"=>500,"data"=>$e->getMessage(),"message"=>"error"];
        }
        return Response::json($respuesta);
    }

    function signup(Request $request){
       try{
           $objeto = $request["params"];

         //return $objeto['pass'];

        User::create([
            'NOMBRE' => $objeto['nombre']
            ,'APE_PAT' => $objeto['ap_pat']
            ,'APE_MAT' => $objeto['ap_mat']
            ,'ESTADOID' => $objeto['estado']
            ,'MUNICIPIOID' =>$objeto['municipio']
            ,'COLONIAID' => $objeto['colonia']
            ,'CALLE' => $objeto['calle']
            ,'NUMERO' => $objeto['numero']
            ,'CP' => $objeto['cp']
            ,'EMAIL' => $objeto['correo']
            ,'TELEFONO_CEL' => $objeto['tel_cel']
            ,'TELEFONO_FIJO' => $objeto['tel_fij']
            ,'FECHA_NAC' => $objeto['fecha']
            ,'USUARIO' => $objeto['tel_cel']
            ,'PASSWORD' => bcrypt($objeto['pass'])
        ]);

        $respuesta = ["code" => 200, "msg" => 'El usuario se agrego correctamente', 'detail' => 'success'];
    }catch (Exception $e){
        $respuesta = ["code" => 500, "msg" => $e, 'detail' => 'error'];
    }

return Response::json($respuesta);
    }

    //Contactos de confianza
    function addContact(Request $request, $id){
        try{

            $contact = new Contactos;

            $contact->idUsuario = $id;
            $contact->TELEFONO = '3112545496';

            $contact->save();

            $respuesta = ["code"=>404,"data"=>$request,"message"=>"error"];

        }catch (Exception $e){
            $respuesta = ["code"=>500,"data"=>$e->getMessage(),"message"=>"error"];
        }
        return Response::json($respuesta);
    }

    function  getContacts($id){
        try{
            $user = User::all()->where('id',$id);
            $contacts = Contactos::all()->where('TELEFONO',$user[0]->USUARIO);
            $contactos = [];
            foreach ($contacts as $contact){
                $u = User::where('id',$contact->idUsuario)->first();
                array_push($contactos,["nombre" => $u->NOMBRE,"id" => $u->id]);
            }
            $respuesta = ["code"=>404,"data"=>$contactos,"message"=>"error"];
        }catch (Exception $e){
            $respuesta = ["code"=>500,"data"=>$e->getMessage(),"message"=>"error"];
        }
        return Response::json($respuesta);
    }
}
