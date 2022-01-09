<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\LogroJuego;
use App\Models\Logro;
use App\Models\Juego;
use Illuminate\Http\Request;

class LogroJuegoController extends Controller
{
    public function index()
    {
        $logroJuego = LogroJuego::all()->where('delete',FALSE);
        if($logroJuego != NULL){
            return response()->json($logroJuego);
        }
        return response()->json([
            'message' => 'Not Found!'
        ], 404);
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make(
            [
                'idLogro' => $request->idLogro,
                'idJuego' => $request->idJuego,
            ],
            [
                'idLogro' => 'required',
                'idJuego' => 'required',
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos'
            ]);
        }

        $juego = Juego::find($request->idJuego);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id de juego invalido'
            ]);
        }

        $logro = Logro::find($request->idLogro);
        if($logro == NULL){
            return response()->json([
                "message" => 'Id del logro es invalido'
            ]);
        }
 
        $logroJuego = new LogroJuego();
        $logroJuego->delete = FALSE;
        $logroJuego->idJuego = $request->idJuego;
        $logroJuego->idLogro = $request->idLogro;
        $logroJuego->save();

        if ($logroJuego != NULL) {
            return response()->json([
                "message" => 'Se ha creado logroJuego.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado logroJuego.'
        ]);

     
    }

    public function show($id)
    {
        $logroJuego = LogroJuego::find($id);
        if ($logroJuego != NULL) {
            return response()->json($logroJuego);
        }
        return response()->json([
            "message" => 'No se encontro ningun valor de id.'
        ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'idLogro' => $request->idLogro,
                'idJuego' => $request->idJuego,
            ],
            [
                'idLogro' => 'required',
                'idJuego' => 'required',
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos'
            ]);
        }

        $juego = Juego::find($request->idJuego);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id del juego invalido'
            ]);
        }

        $logro = Logro::find($request->idLogro);
        if($logro == NULL){
            return response()->json([
                "message" => 'Id de logro invalido'
            ]);
        }
        
        $logroJuego = LogroJuego::find($id);
        if($logroJuego == NULL || $logroJuego->delete == TRUE ){
            return response()->json([
                "message" => 'El Id es invalido'
            ]);
        }
        if ($request->idLogro != NULL) {
            $logroJuego->idLogro = $request->idLogro;
        }
        if ($request->idJuego != NULL) {
            $logroJuego->idJuego = $request->idJuego;
    }
    return response()->json($logroJuego);
}

    public function destroy($id)
    {
        // Validación ID
        if(ctype_digit($id) != TRUE){
           return response()->json([
               "msg" => "El id es inválido",
           ],400);
          }
        
         $logroJuego = LogroJuego::find($id);
          //Valida existencia de tupla
          if(($logroJuego == NULL) || ($logroJuego->delete==TRUE)){
           return response()->json([
               "msg" => "El logroJuego no existe",
           ],404);
       }
   
           $logroJuego->delete = TRUE;
           $logroJuego->save();
            return response()->json($logroJuego);
       }    
}