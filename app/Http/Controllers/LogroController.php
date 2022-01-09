<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logro;
use Illuminate\Support\Facades\Validator;

class LogroController extends Controller
{
    public function index()
    {
        $logro = Logro::all()->where('delete',FALSE);
        if($logro != NULL){
            return response()->json($logro);

        }
        else{
            return response()->json([
                'msg' => 'No existen logros'
            ],404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                'nombreLogro'=>$request->nombreLogro,
            ],

            [
                'nombreLogro'=>'required',
            ]
        );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }


        $logro = new Logro();
        $logro->nombreLogro = $request->nombreLogro;
        $logro->delete = FALSE;
        $logro->save();

        if($logro != NULL){
            return response()->json([
                'msg' => 'Se ha creado un nuevo logro'
            ],202);

            return response()->json([
                'msg' => 'No se ha creado un logro'
            ]);
        }
    }

    public function show($id)
    {
        $logro = Logro::find($id);
        if($logro != NULL){
            return response()->json($logro);
        }
        return response()->json([
            'msg' => 'No se encontro ningun valor con la id asociada'
        ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'nombreLogro' => $request->nombreLogro,
            ],

            [
                'nombreLogro' => 'required',
            ]
            );
        if ($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }

        $logro = Logro::find($id);
        if($logro == NULL){
            return response()->json([
                "message" => 'El id es invalido'
            ]);
        }
        if($request->nombreLogro != NULL){
            $logro->nombreLogro = $request->nombreLogro;
        }

        $logro->save();
        return response()->json($logro);
    }

    public function destroy($id)
    {
     if(ctype_digit($id) != TRUE){
        return response()->json([
            "msg" => "El id es invalido",
        ],400);
       }
     
      $logro = Logro::find($id);
       if(($logro == NULL) || ($logro->delete==TRUE)){
        return response()->json([
            "msg" => "El logro no existe",
        ],404);
        }

        $logro->delete = TRUE;
        $logro->save();
        return response()->json($logro);
    } 
}