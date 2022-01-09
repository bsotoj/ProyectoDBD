<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaDeseo;
use App\Models\Juego;
use App\Models\ListaDeseosJuegos;
use Illuminate\Support\Facades\Validator;
class ListaDeseosJuegos extends Controller
{
    
    public function index()
    {
        $listaDeseosJuegos = ListaDeseosJuegos::all()->where('delete',FALSE);
        if($listaDeseosJuegos != NULL){
            return response()->json($listaDeseosJuegos);
        }
        return response()->json([
            'message' => 'Tabla intermedia no encontrada.'
        ], 404);
    }
   
    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                'idListaDeseo' => $request->idListaDeseo,
                'idJuego' => $request->idJuego,  
            ],
            [
                'idListaDeseo' => 'required',
                'idJuego' => 'required',
            ]
        );
        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos.'
            ]);
        }
        $listaDeseo = ListaDeseo::find($request->idListaDeseo);
        if($listaDeseo == NULL){
            return response()->json([
                "message" => 'Id de ListaDeseo invalido'
            ]);
        }

        $juego = Juego::find($request->idJuego);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id de juego invalido.'
            ]);
        }
        $listaDeseosJuegos = new ListaDeseosJuegos();
        $listaDeseosJuegos->idListaDeseo = $request->idListaDeseo;
        $listaDeseosJuegos->idJuego = $request->idJuego;
        $listaDeseosJuegos->delete = FALSE;
        $listaDeseosJuegos->save();

        if ($listaDeseosJuegos != NULL) {
            return response()->json([
                "message" => 'Se ha creado una nueva tabla intermedia.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado la tabla.'
        ]);
    }

    
    public function show($id)
    {
        $listaDeseosJuegos = ListaDeseosJuegos::find($id);
        if ($listaDeseosJuegos != NULL) {
            return response()->json($listaDeseosJuegos);
        }
        return response()->json([
            "message" => 'No se encontro ninguna tabla con ese id.'
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'idListaDeseo' => $request->idListaDeseo,
                'idJuego' => $request->idJuego,
            ],
            [
                'idListaDeseo' => 'required',
                'idJuego' => 'required',
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos.'
            ]);
        }
        $listaDeseo = ListaDeseo::find($request->idListaDeseo);
        if($listaDeseo == NULL){
            return response()->json([
                "message" => 'Id de ListaDeseo invalido.'
            ]);
        }

        $juego = Juego::find($request->idJuego);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id de comunidad invalido.'
            ]);
        }
        
        $listaDeseosJuegos = ListaDeseosJuegos::find($id);
        if($listaDeseosJuegos == NULL){
            return response()->json([
                "message" => 'El Id es invalido.'
            ]);
        }

        if ($request->idListaDeseo != NULL) {
            $listaDeseosJuegos->idListaDeseo = $request->idListaDeseo;
        }
        if ($request->idJuego != NULL) {
            $listaDeseosJuegos->idJuego = $request->idJuego;
        }
        $listaDeseosJuegos->save();
        return response()->json($listaDeseosJuegos);
    }

  
    public function destroy($id)
    {
        // Validación ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "msg" => "El id es inválido.",
            ],400);
           }
         
          $listaDeseosJuegos = ListaDeseosJuegos::find($id);
           //Valida existencia de tupla
           if(($listaDeseosJuegos == NULL) || ($listaDeseosJuegos->delete==TRUE)){
            return response()->json([
                "msg" => "La tabla no existe.",
            ],404);
        }
            $listaDeseosJuegos->delete = TRUE;
            $listaDeseosJuegos->save();
            return response()->json($listaDeseosJuegos);
    }
}
