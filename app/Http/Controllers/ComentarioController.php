<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comentario;
use App\Models\Juego;
use App\Models\Usuario;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentario = Comentario::all()->where('delete',FALSE);
        if($comentario != NULL){
            return response()->json($comentario);
        }
        return response()->json([
            'message' => 'Comentario no encontrado.'
        ], 404);
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
                'mensaje' => $request->mensaje,
                'idJuego' => $request->idJuego,
                'idUsuario' => $request->idUsuario
            ],
            [
                'mensaje' => 'required|min:3',  
                'idJuego' => 'required',
                'idUsuario' => 'required'
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
                "message" => 'Id de juego invalido.'
            ]);
        }
        $usuario = Usuario::find($request->idUsuario);
        if($usuario == NULL){
            return response()->json([
                "message" => 'Id de usuario invalido.'
            ]);
        }
        $comentario = new Comentario();
        $comentario->mensaje = $request->mensaje;
        $comentario->idJuego = $request->idJuego;
        $comentario->idUsuario = $request->idUsuario;
        $comentario->save();
        if ($comentario != NULL) {
            return response()->json([
                "message" => 'Se ha creado un comentario.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado un comentario.'
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
        $comentario = Comentario::find($id);
        if ($comentario != NULL) {
            return response()->json($comentario);
        }
        return response()->json([
            "message" => 'No se encontro ningun comentario con ese id.'
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
                'mensaje' => $request->mensaje,
                'idJuego' => $request->idJuego,
                'idUsuario' => $request->idUsuario
            ],
            [
                'mensaje' => 'required',  
                'idJuego' => 'required',
                'idUsuario' => 'required'
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
                "message" => 'Id de juego invalido.'
            ]);
        }
        $usuario = Usuario::find($request->idUsuario);
        if($usuario == NULL){
            return response()->json([
                "message" => 'Id de usuario invalido.'
            ]);
        }
        $comentario = Comentario::find($id);
        if($comentario == NULL){
            return response()->json([
                "message" => 'El Id es invalido.'
            ]);
        }
        if ($request->mensaje!= NULL){
                $comentario->mensaje = $request->mensaje;
        }
        if ($request->idJuego != NULL) {
            $comentario->idJuego = $request->idJuego;
        }
        if ($request->idUsuario != NULL) {
            $comentario->idUsuario = $request->idUsuario;
        }
        $comentario->save();
        return response()->json($comentario);
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
                "msg" => "El id es inválido.",
            ],400);
           }
         
          $comentario = Comentario::find($id);
           //Valida existencia de tupla
           if(($comentario == NULL) || ($comentario->delete==TRUE)){
            return response()->json([
                "msg" => "El comentario no existe.",
            ],404);
        }
            $comentario->delete = TRUE;
            $comentario->save();
            return response()->json([
            "msg" => "El comentario ha sido eliminado.",
            ],200);
    }
}
