<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartera;
use Illuminate\Support\Facades\Validator;
class CarteraController extends Controller
{
  
    public function index()
    {
        $cartera = Cartera::all()->where('delete',FALSE);
        if($cartera != NULL){
            return response()->json($cartera);

        }
        else{
            return response()->json([
                'msg' => 'No existen carteras'
            ],404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                'metodoRecarga' => $request->metodoRecarga,
                'tipoMoneda' => $request->tipoMoneda,
            ],

            [
                'metodoRecarga' => 'required|min:3',
                'tipoMoneda' => 'required|min:3',
            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }


        $cartera = new Cartera();
        $cartera->metodoRecarga = $request->metodoRecarga;
        $cartera->tipoMoneda = $request->tipoMoneda;
        $cartera->monto = 0; 
        $cartera->delete = FALSE;
        $cartera->save();

        if($cartera != NULL){
            return response()->json($cartera);

        return response()->json([
            'msg' => 'No se ha creado la cartera'
        ]);    
        }

    }

    public function show($id)
    {
        $cartera = Cartera::find($id);
        if($cartera != NULL){
            return response()->json($cartera);
        }
        return response()->json([
            'msg' => 'No se encontro ningun valor con la id asociada'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'metodoRecarga' => $request->metodoRecarga,
                'tipoMoneda' => $request->tipoMoneda,
                'monto' => $request->monto,
            ],

            [
                'metodoRecarga' => 'required',
                'tipoMoneda' => 'required',
                'monto' => 'required',
            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }

        $cartera = Cartera::find($id);
        if($cartera == NULL){
            return response()->json([
                "message" => 'El id es invalido'
            ]);
        }
        if ($request->metodoRecarga!= NULL) {
            $cartera->metodoRecarga = $request->metodoRecarga;
        }
        if ($request->tipoMoneda != NULL) {
            $cartera->tipoMoneda = $request->tipoMoneda;
        }
        if ($request->monto != NULL) {
            $cartera->monto = $request->monto;
        }

        $cartera->save();
        return response()->json($cartera);
    }
   
    public function destroy($id)
    {
     // Validación ID
     if(ctype_digit($id) != TRUE){
        return response()->json([
            "msg" => "El id es invalido",
        ],400);
       }
     
      $cartera = Cartera::find($id);
       //Valida existencia de tupla
       if(($cartera == NULL) || ($cartera->delete==TRUE)){
        return response()->json([
            "msg" => "La cartera no existe",
        ],404);
        }

        $cartera->delete = TRUE;
        $cartera->save();
        return response()->json($cartera);
    }   
}
