<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Biblioteca;
use App\Models\Usuario;
use App\Models\Juego;

class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *patrece mustafa 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biblioteca = Biblioteca::all()->where('delete',FALSE);
        if($biblioteca != NULL){
            return response()->json($biblioteca);
        }
        return response()->json([
            'message' => 'Biblioteca no encontrada'
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
                'idUsuario' => $request->idUsuario,
                'idJuego' => $request->idJuego,  
            ],
            [
                'idUsuario' => 'required',
                'idJuego' => 'required',
            ]
        );
        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos.'
            ]);
        }
        $usuario = Usuario::find($request->idUsuario);
        if($usuario == NULL){
            return response()->json([
                "message" => 'Id de usuario invalido'
            ]);
        }

        $juego = Juego::find($request->idJuego);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id de juego invalido'
            ]);
        }
        $biblioteca = new Biblioteca();
        $biblioteca->idUsuario = $request->idUsuario;
        $biblioteca->idJuego = $request->idJuego;
        $biblioteca->delete = FALSE;
        $biblioteca->save();

        if ($biblioteca != NULL) {
            return response()->json([
                "message" => 'Se ha creado una biblioteca.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado una biblioteca.'
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
        $biblioteca = Biblioteca::find($id);
        if ($biblioteca != NULL) {
            return response()->json($biblioteca);
        }
        return response()->json([
            "message" => 'No se encontro ninguna biblioteca con ese id.'
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
                'idUsuario' => $request->idUsuario,
                'idJuego' => $request->idJuego,
            ],
            [
                'idUsuario' => 'required',
                'idJuego' => 'required',
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos.'
            ]);
        }
        $usuario = Usuario::find($request->idUsuario);
        if($usuario == NULL){
            return response()->json([
                "message" => 'Id de usuario invalido.'
            ]);
        }

        $juego = Juego::find($request->idJuego);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id de juego invalido.'
            ]);
        }
        
        $biblioteca = Biblioteca::find($id);
        if($biblioteca == NULL){
            return response()->json([
                "message" => 'El Id es invalido.'
            ]);
        }

        if ($request->idUsuario != NULL) {
            $biblioteca->idUsuario = $request->idUsuario;
        }
        if ($request->idJuego != NULL) {
            $biblioteca->idJuego = $request->idJuego;
        }
        $biblioteca->save();
        return response()->json($biblioteca);
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
         
          $biblioteca = Biblioteca::find($id);
           //Valida existencia de tupla
           if(($biblioteca == NULL) || ($biblioteca->delete==TRUE)){
            return response()->json([
                "msg" => "La biblioteca no existe.",
            ],404);
        }
    
            $biblioteca->delete = TRUE;
            $biblioteca->save();
            return response()->json($biblioteca);
    }
    
   

    public function viewGames($id){
        $bibliotecas = Biblioteca::all()->where('delete',FALSE)
                                        ->where('idUsuario',$id);
        $juegos= array();
        $juego= Juego::all()->where('delete',FALSE);
        $usuario = Usuario::find($id);
        foreach($bibliotecas as $biblioteca){
            $juego = Juego::find($biblioteca->idJuego);
            array_push($juegos,$juego);
        }
        return view('biblioteca',compact('usuario','juegos'));
        
    }
}
