<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaDeseo;
use Illuminate\Support\Facades\Validator;

class ListaDeseoController extends Controller
{
    public function index()
    {
        $listaDeseo = ListaDeseo::all()->where('delete',FALSE);
        if($listaDeseo != NULL){
            return response()->json($listaDeseo);

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
                'nombreLista'=>$request->nombreLista,
            ],
            [
                'nombreLista'=>'required|min:3'
            ]
            );
        if($validator->fails()){
            return response()->json([
                'msg' => 'Datos ingresafos invalidos'
            ]);
        }
        $listaDeseo = new ListaDeseo();
        $listaDeseo->nombreLista = $request->nombreLista;
        $listaDeseo->delete = FALSE;
        $listaDeseo->save();

        if($listaDeseo != NULL){
            return response()->json([
                'msg' => 'Se ha creado una nueva lista de deseo'
            ],202);

        return response()->json([
            'msg' => 'No se ha creado la listaDeseo'
        ]);
        }
    }

    public function show($id)
    {
        $listaDeseo = ListaDeseo::find($id);
        if($listaDeseo != NULL){
            return response()->json($listaDeseo);
        }
        return response()->json([
            'msg' => 'No se encontro ningun valor con la id asociada'
        ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'nombreLista' => $request->nombreLista,
            ],

            [
                'nombreLista' => 'required',
            ]
            );
        if ($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }
        $listaDeseo = ListaDeseo::find($id);
        if($listaDeseo == NULL){
            return response()->json([
                "message" => 'El id es invalido'
            ]);
        }
        if($request->nombreLista != NULL){
            $listaDeseo->nombreLista = $request->nombreLista;
        }

        $listaDeseo->save();
        return response()->json($listaDeseo);
    }

    public function destroy($id)
    {
     if(ctype_digit($id) != TRUE){
        return response()->json([
            "msg" => "El id es invalido",
        ],400);
       }
     
      $listaDeseo = listaDeseo::find($id);
       if(($listaDeseo == NULL) || ($listaDeseo->delete==TRUE)){
        return response()->json([
            "msg" => "La listaDeseo no existe",
        ],404);
        }

        $listaDeseo->delete = TRUE;
        $listaDeseo->save();
        return response()->json([
        "msg" => "La listaDeseo ha sido eliminada",
        ],200);
    } 
}
