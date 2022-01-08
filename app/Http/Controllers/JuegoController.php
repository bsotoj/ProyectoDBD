<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;


class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juego = Juego::all()->where('delete',FALSE);
        if($juego != NULL){
            return response()->json($juego);

        }
        else{
            return response()->json([
                'msg' => 'No existen juegos'
            ],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $juego = new Juego();
        $juego->delete = FALSE; 

        $fallido = FALSE;
        $mensajeFallos = '';

        $juego->nombreJuego = $request->nombreJuego;
        //validación 'nombreJuego'
        if($request->nombreJuego == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'nombreJuego' está vacío";
        }
        else{
            $juego->nombreJuego = $request -> nombreJuego;
        }
        //validacion 'edadRestriccion'
        if($request->edadRestriccion == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'edadRestriccion' está vacío";
        }
        else{
            $juego->edadRestriccion = $request -> edadRestriccion;
        }
        //validación 'almacenamiento'
        if($request->almacenamiento == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'almacenamiento' está vacío";
        }
        else{
            $juego->almacenamiento = $request -> almacenamiento;
        }
        //validacion 'capacidadJuego'
        if($request->capacidadJuego == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'capacidadJuego' está vacío";
        }
        else{
            $juego->capacidadJuego = $request -> capacidadJuego;
        }
        //validacion 'linkJuego'
        if($request->linkJuego == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'linkJuego' está vacío";
        }
        else{
            $juego->linkJuego = $request -> linkJuego;
        }

        if($fallido == FALSE){

            $juego->save();
            return response()->json([
                "msg" => "Se ha creado un nuevo Juego",
            ],201);
        }

        else{
            return response()->json([
                 "msg" => $mensajeFallos,
             ],400); 
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
        $juego = Juego:: find($id);
        //Verificación de la existencia de la tupla
        //considerando la bandera 'delete' 
        if(empty($juego) || ($juego->delete == TRUE)){
            return response()->json([
                "msg" => "El juego solicitado no existe",
            ],404);
        }
        return response($juego);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        

        $juego = Juego::find($id);
        if($juego == NULL){
            return response()->json([
                "message" => 'El id es invalido'
            ]);
        }
        if ($request->nombreJuego!= NULL) {
            $juego->nombreJuego = $request->nombreJuego;
        }

        $juego->save();
        return response()->json($juego);
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
     
      $juego = Juego::find($id);
       //Valida existencia de tupla
       if(($juego == NULL) || ($juego->delete==TRUE)){
        return response()->json([
            "msg" => "El juego no existe",
        ],404);
    }

        $juego->delete = TRUE;
        $juego->save();
        return response()->json([
        "msg" => "El juego ha sido eliminado",
        ],200);
    }
}
