<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amigo;
use Illuminate\Support\Facades\Validator;


class AmigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amigo = Amigo::all()->where('delete',FALSE);
        if($amigo != NULL){
            return response()->json($amigo);

        }
        else{
            return response()->json([
                'msg' => 'No existen amigos'
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
                'idUsuario1' => $request->idUsuario1,
                'idUsuario2' => $request -> idUsuario2,
            ],

            [
                'idUsuario1' => 'required|min:3',
                'idUsuario2' => 'required|min:3',

            ]
            );
            if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }
        $amigo = new Amigo();
        $amigo->idUsuario1 = $request->idUsuario1;
        $amigo->idUsuario2 = $request->idUsuario2;
        $amigo->delete = FALSE;
        $amigo->save();
        if($amigo != NULL){
            return response()->json([
                'msg' => 'se ha creado un nuevo amigo'
            ],202);

        return response()->json([
            'msg' => 'no se ha creado el amigo'
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
       //Validación ID ingresada
       if(ctype_digit($id) != TRUE){
        return response()->json([
            "msg" => "La ID ingresada no es válida",
        ],400);
    }
    $amigo = Amigo:: find($id);
    //Verificación de la existencia de la tupla
    //considerando la bandera 'delete' 
    if(empty($amigo) || ($amigo->delete == TRUE)){
        return response()->json([
            "msg" => "El amigo solicitado no existe",
        ],404);
    }
    return response($amigo);

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
                'idUsuario1' => $request->idUsuario1,
                'idUsuario2' => $request -> idUsuario2,
            ],

            [
                'idUsuario1' => 'required|min:3',
                'idUsuario2' => 'required|min:3',

            ]
            );
            if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }
        $amigo = Amigo::find($id);
        if(empty($amigo)){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos. "El amigo buscado no existe";
        }
        //validación 'idUsuario1'
        if($request->idUsuario1 == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'idUsuario1' está vacío";
        }
        else{
            $amigo->idUsuario1 = $request -> idUsuario1;
        }
        //validacion 'idUsuario2'
        if($request->idUsuario2 == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'idUsuario2' está vacío";
        }
        else{
            $amigo->idUsuario2 = $request -> idUsuario2;
        }
        $amigo->save();
        return response()->json($amigo);
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
     
      $amigo = Amigo::find($id);
       //Valida existencia de tupla
       if(($amigo == NULL) || ($amigo->delete==TRUE)){
        return response()->json([
            "msg" => "El amigo no existe",
        ],404);
    }

        $amigo->delete = TRUE;
        $amigo->save();
        return response()->json($amigo);
    }

}
