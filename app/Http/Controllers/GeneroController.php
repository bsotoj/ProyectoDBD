<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;
use Illuminate\Support\Facades\Validator;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genero = Genero::all()->where('delete',FALSE);
        if($genero != NULL){
            return response()->json($genero);

        }
        else{
            return response()->json([
                'msg' => 'No existen ese genero'
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
                'nombreGenero' => $request->nombreGenero
            ],

            [
                'nombreGenero' => 'required|min:3'
            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]); 
        }
        $genero = new Genero();
        $genero->'nombreGenero' = $request->nombreGenero;
        $genero->delete = FALSE;
        $genero->save();
        if($genero != NULL){
            return response()->json([
                'msg' => 'se ha agregado un nuevo genero'
            ],202);

        return response()->json([
            'msg' => 'no se ha agregado un genero'
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
        $genero = Genero::find($id);
        if($genero != NULL){
            return response()->json($genero);
        }
        return response()->json([
            'msg' => 'no se encontro ningun elemento con la id asociada'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'nombreGenero' => $request->nombreGenero
            ],

            [
                'nombreGenero' => 'required'
            ]
            );
            if($validator->fails())
            {
                return response()->json([
                    'msg' => 'Datos ingresados invalidos'
                ]);
            }
            $genero = Genero::find($id);
            if($genero == NULL){
                return response()->json([
                    "message" => 'El id es invalido'
                ]);
            }
            if ($request->nombreGenero!= NULL) {
                $cartera->nombreGenero = $request->nombreGenero;
            }
            $genero->save();
            return response()->json($genero);
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
     
      $genero = Genero::find($id);
       //Valida existencia de tupla
       if(($genero == NULL) || ($genero->delete==TRUE)){
        return response()->json([
            "msg" => "El genero no existe",
        ],404);
    }

        $genero->delete = TRUE;
        $genero->save();
        return response()->json([
        "msg" => "El genero ha sido eliminado",
        ],200);
    } 
}
