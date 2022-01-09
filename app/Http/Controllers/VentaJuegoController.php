<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\VentaJuego;
use App\Models\Venta;
use App\Models\Juego;
use Illuminate\Http\Request;

class VentaJuegoController extends Controller
{
    public function index()
    {
        $ventaJuego = ventaJuego::all()->where('delete',FALSE);
        if($ventaJuego != NULL){
            return response()->json($ventaJuego);
        }
        return response()->json([
            'message' => 'Not Found!'
        ], 404);
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make(
            [
                'idVenta' => $request->idVenta,
                'idJuego' => $request->idJuego,
            ],
            [
                'idVenta' => 'required',
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

        $venta = Venta::find($request->idVenta);
        if($venta == NULL){
            return response()->json([
                "message" => 'Id del venta es invalido'
            ]);
        }
 
        $ventaJuego = new VentaJuego();
        $ventaJuego->delete = FALSE;
        $ventaJuego->idJuego = $request->idJuego;
        $ventaJuego->idVenta = $request->idVenta;
        $ventaJuego->save();

        if ($ventaJuego != NULL) {
            return response()->json([
                "message" => 'Se ha creado ventaJuego.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado ventaJuego.'
        ]);

     
    }

    public function show($id)
    {
        $ventaJuego = VentaJuego::find($id);
        if ($ventaJuego != NULL) {
            return response()->json($ventaJuego);
        }
        return response()->json([
            "message" => 'No se encontro ningun valor de id.'
        ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'idVenta' => $request->idVenta,
                'idJuego' => $request->idJuego,
            ],
            [
                'idVenta' => 'required',
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

        $venta = Venta::find($request->idVenta);
        if($venta == NULL){
            return response()->json([
                "message" => 'Id de venta invalido'
            ]);
        }
        
        $ventaJuego = ventaJuego::find($id);
        if($ventaJuego == NULL || $ventaJuego->delete == TRUE ){
            return response()->json([
                "message" => 'El Id es invalido'
            ]);
        }
        if ($request->idVenta != NULL) {
            $ventaJuego->idVenta = $request->idVenta;
        }
        if ($request->idJuego != NULL) {
            $ventaJuego->idJuego = $request->idJuego;
    }
    return response()->json($ventaJuego);
}

    public function destroy($id)
    {
        // Validación ID
        if(ctype_digit($id) != TRUE){
           return response()->json([
               "msg" => "El id es inválido",
           ],400);
          }
        
         $ventaJuego = VentaJuego::find($id);
          //Valida existencia de tupla
          if(($ventaJuego == NULL) || ($ventaJuego->delete==TRUE)){
           return response()->json([
               "msg" => "El ventaJuego no existe",
           ],404);
       }
   
           $ventaJuego->delete = TRUE;
           $ventaJuego->save();
            return response()->json($ventaJuego);
       }    
}