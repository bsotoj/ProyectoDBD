<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logro;
use Illuminate\Support\Facades\Validator;

class LogroController extends Controller
{
    public function index()
    {
        $Logro = Logro::all()->where('delete',FALSE);
        if($Logro != NULL){
            return response()->json($Logro);

        }
        else{
            return response()->json([
                'msg' => 'No existen listas de deseo'
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
                'nombreLogro'=>'required|min:3'
            ]
        );
        if($validator->fails()){
            return response()->json([
                'msg' => 'Datos ingresafos invalidos'
            ]);
        }
        $Logro = new Logro();
        $Logro->nombreLogro = $request->nombreLogro;
        $Logro->delete = FALSE;
        $Logro->save();

        if($Logro != NULL){
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
        $Logro = Logro::find($id);
        if($Logro != NULL){
            return response()->json($Logro);
        }
        return response()->json([
            'msg' => 'No se encontro ningun valor con la id asociada'
        ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'nombreLogro' => $request->Logro,
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
        $Logro = Logro::find($id);
        if($Logro == NULL){
            return response()->json([
                "message" => 'El id es invalido'
            ]);
        }
        if($request->Logro != NULL){
            $Logro->Logro = $request->Logro;
        }

        $Logro->save();
        return response()->json($Logro);
    }

    public function destroy($id)
    {
     if(ctype_digit($id) != TRUE){
        return response()->json([
            "msg" => "El id es invalido",
        ],400);
       }
     
      $Logro = Logro::find($id);
       if(($Logro == NULL) || ($Logro->delete==TRUE)){
        return response()->json([
            "msg" => "La Logro no existe",
        ],404);
        }

        $Logro->delete = TRUE;
        $Logro->save();
        return response()->json([
        "msg" => "La Logro ha sido eliminada",
        ],200);
    } 
}