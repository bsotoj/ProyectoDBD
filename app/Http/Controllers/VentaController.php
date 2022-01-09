<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;

class VentaController extends Controller
{
    public function index()
    {
        $venta = Venta::all()->where('delete',FALSE);
        if($venta != NULL){
            return response()->json($venta);

        }
        else{
            return response()->json([
                'msg' => 'No existen ventas'
            ],404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                'idUsuario' => $request->idUsuario,
                'fechaVenta' => $request->fechaVenta,
                'descuento' => $request->descuento,
                'monto' => $request->monto,
            ],

            [
                'idUsuario' => 'required',
                'fechaVenta' => 'required',
                'descuento' => 'required',
                'monto' => 'required',
            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }
        $usuario = Usuario::find($request->idUsuario);
        if($usuario == NULL){
            return response()->json([
                "message" => 'Id del usuario invalido'
            ]);
        }

        $venta = new Venta();
        $venta->idUsuario = $request->idUsuario;
        $venta->fechaVenta = $request->fechaVenta;
        $venta->descuento = $request->descuento;
        $venta->monto = $request->monto; 
        $venta->delete = FALSE;
        $venta->save();

        if($venta != NULL){
            return response()->json([
                'msg' => 'Se ha creado una nueva venta'
            ],202);

        return response()->json([
            'msg' => 'No se ha creado la venta'
        ]);    
        }

    }

    public function show($id)
    {
        $venta = Venta::find($id);
        if($venta != NULL){
            return response()->json($venta);
        }
        return response()->json([
            'msg' => 'No se encontro ningun valor con la id asociada'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'idUsuario' => $request->idUsuario,
                'fechaVenta' => $request->fechaVenta,
                'descuento' => $request->descuento,
                'monto' => $request->monto,
            ],

            [
                'idUsuario' => 'required',
                'fechaVenta' => 'required',
                'descuento' => 'required',
                'monto' => 'required',
            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }

        $venta = Venta::find($request->idUsuario);
        if($venta == NULL){
            return response()->json([
                "message" => 'Id de venta invalido'
            ]);
        }

        $venta = Venta::find($id);
        if($venta == NULL){
            return response()->json([
                "message" => 'El id es invalido'
            ]);
        }
        if ($request->idUsuario!= NULL) {
            $venta->idUsuario = $request->idUsuario;
        }
        if ($request->fechaVenta!= NULL) {
            $venta->fechaVenta = $request->fechaVenta;
        }
        if ($request->descuento != NULL) {
            $venta->descuento = $request->descuento;
        }
        if ($request->monto != NULL) {
            $venta->monto = $request->monto;
        }

        $venta->save();
        return response()->json($venta);
    }
   
    public function destroy($id)
    {
     // Validación ID
     if(ctype_digit($id) != TRUE){
        return response()->json([
            "msg" => "El id es invalido",
        ],400);
       }
     
      $venta = Venta::find($id);
       //Valida existencia de tupla
       if(($venta == NULL) || ($venta->delete==TRUE)){
        return response()->json([
            "msg" => "La venta no existe",
        ],404);
        }

        $venta->delete = TRUE;
        $venta->save();
        return response()->json($venta);
    }   
}