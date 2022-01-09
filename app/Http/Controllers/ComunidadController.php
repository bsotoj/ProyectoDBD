<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunidad;
use App\Models\Juego;
use Illuminate\Support\Facades\Validator;

class ComunidadController extends Controller
{
    public function index()
    {
            $comunidad = Comunidad::all()->where('delete',FALSE);
            if($comunidad != NULL){
                return response()->json($comunidad);
    
            }
            else{
                return response()->json([
                    'msg' => 'No existen comunidades para mostrar'
                ],404);
            }
    }


    public function store(Request $request)
    {
         $validator = Validator::make(
            [ 
            'idJuego' => $request->idJuego,
            'nombreComunidad' => $request->nombreComunidad
            ],
            [
            'idJuego' => 'required',  
            'nombreComunidad' => 'required'    
            ]
        );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]); 
        }
        $juego = Juego::find($request->idJuego);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id de pais invalido'
            ]);
        }
        $comunidad = new Comunidad();
        $comunidad->idJuego = $request->idJuego;
        $comunidad->nombreComunidad = $request->nombreComunidad;
        $comunidad->delete = FALSE;
        $comunidad->save();

        if ($comunidad != NULL) {
            return response()->json([
                "message" => 'Se ha creado una nueva comunidad.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado una comunidad.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comunidad = Comunidad::find($id);
        if ($comunidad != NULL) {
            return response()->json($comunidad);
        }
        return response()->json([
            "message" => 'No se encontro ningun valor con ese id.'
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
                'idJuego' => $request->idJuego,
                'nombreComunidad' => $request->nombreComunidad  
            ],
            [
                'idJuego' => 'required',
                'nombreComunidad' => 'required'
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos.'
            ]);
        }

        $juego = Juego::find($request->idJuego);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id de pais invalido'
            ]);
        }

        $comunidad = Comunidad::find($id);
        if($comunidad == NULL){
            return response()->json([
                "message" => 'El Id es invalido'
            ]);
        }

        if ($request->idJuego != NULL){
            $comunidad->idJuego = $request->idJuego;
        }

        if ($request->nombreComunidad!= NULL){
            $comunidad->nombreComunidad = $request->nombreComunidad;
        }
        $comunidad->save();
        return response()->json($comunidad);
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
         
          $comunidad = Comunidad::find($id);
           //Valida existencia de tupla
           if(($comunidad == NULL) || ($comunidad->delete==TRUE)){
            return response()->json([
                "msg" => "La comunidad no existe",
            ],404);
        }
            $comunidad->delete = TRUE;
            $comunidad->save();
            return response()->json([
            "msg" => "La comunidad ha sido eliminado",
            ],200);
        }
}
