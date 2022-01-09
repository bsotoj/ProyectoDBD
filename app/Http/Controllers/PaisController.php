<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use Illuminate\Support\Facades\Validator;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pais = Pais::all()->where('delete',FALSE);
        if($pais != NULL){
            return response()->json($pais);

        }
        else{
            return response()->json([
                'msg' => 'No existe ese pais en la base de datos'
            ],404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                'nombrePais' => $request->nombrePais
            ],
            [
                'nombrePais' => 'required|min:2'
            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]); 
        }

        $pais = new Pais();
        $pais->nombrePais = $request->nombrePais;
        $pais->delete = FALSE;
        $pais->save();
        
        if($pais != NULL){
            return response()->json([
                'msg' => 'se ha agregado un nuevo pais'
            ],202);

        return response()->json([
            'msg' => 'no se ha agregado un nuevo pais'
        ]);    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pais = Pais::find($id);
        if($pais != NULL){
            return response()->json($pais);
        }
        return response()->json([
            'msg' => 'no se encontro ningun elemento con la id asociada'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'nombrePais' => $request->nombrePais
            ],

            [
                'nombrePais' => 'required'
            ]
            );
            if($validator->fails())
            {
                return response()->json([
                    'msg' => 'Datos ingresados invalidos'
                ]);
            }
            $pais = Pais::find($id);
            if($pais == NULL){
                return response()->json([
                    "message" => 'El id es invalido'
                ]);
            }
            if ($request->nombrePais!= NULL) {
                $pais->nombrePais = $request->nombrePais;
            }
            $pais->save();
            return response()->json($pais);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    // Validación ID
    if(ctype_digit($id) != TRUE){
        return response()->json([
            "msg" => "El id es inválido",
        ],400);
       }
     
      $pais = Pais::find($id);
       //Valida existencia de tupla
       if(($pais == NULL) || ($pais->delete==TRUE)){
        return response()->json([
            "msg" => "El pais no existe",
        ],404);
    }

        $pais->delete = TRUE;
        $pais->save();
        return response()->json([
        "msg" => "El pais ha sido eliminado",
        ],200);
    }
}
