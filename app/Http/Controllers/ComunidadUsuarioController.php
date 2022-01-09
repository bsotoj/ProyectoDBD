<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ComunidadUsuario;
use App\Models\Usuario;
use App\Models\Comunidad;

class ComunidadUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunidadUsuario = ComunidadUsuario::all()->where('delete',FALSE);
        if($comunidadUsuario != NULL){
            return response()->json($comunidadUsuario);
        }
        return response()->json([
            'message' => 'Tabla intermedia no encontrada.'
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
                'idComunidad' => $request->idComunidad,  
            ],
            [
                'idUsuario' => 'required',
                'idComunidad' => 'required',
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

        $comunidad = Comunidad::find($request->idComunidad);
        if($comunidad == NULL){
            return response()->json([
                "message" => 'Id de comunidad invalido.'
            ]);
        }
        $comunidadUsuario = new ComunidadUsuario();
        $comunidadUsuario->idUsuario = $request->idUsuario;
        $comunidadUsuario->idComunidad = $request->idComunidad;
        $comunidadUsuario->delete = FALSE;
        $comunidadUsuario->save();

        if ($comunidadUsuario != NULL) {
            return response()->json([
                "message" => 'Se ha creado una nueva tabla intermedia.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado la tabla.'
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
        $comunidadUsuario = ComunidadUsuario::find($id);
        if ($comunidadUsuario != NULL) {
            return response()->json($comunidadUsuario);
        }
        return response()->json([
            "message" => 'No se encontro ninguna tabla con ese id.'
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
                'idComunidad' => $request->idComunidad,
            ],
            [
                'idUsuario' => 'required',
                'idComunidad' => 'required',
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

        $comunidad = Comunidad::find($request->idComunidad);
        if($comunidad == NULL){
            return response()->json([
                "message" => 'Id de comunidad invalido.'
            ]);
        }
        
        $comunidadUsuario = ComunidadUsuario::find($id);
        if($comunidadUsuario == NULL){
            return response()->json([
                "message" => 'El Id es invalido.'
            ]);
        }

        if ($request->idUsuario != NULL) {
            $comunidadUsuario->idUsuario = $request->idUsuario;
        }
        if ($request->idComunidad != NULL) {
            $comunidadUsuario->idComunidad = $request->idComunidad;
        }
        $comunidadUsuario->save();
        return response()->json($comunidadUsuario);
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
         
          $comunidadUsuario = ComunidadUsuario::find($id);
           //Valida existencia de tupla
           if(($comunidadUsuario == NULL) || ($comunidadUsuario->delete==TRUE)){
            return response()->json([
                "msg" => "La tabla no existe.",
            ],404);
        }
            $comunidadUsuario->delete = TRUE;
            $comunidadUsuario->save();
            return response()->json($comunidadUsuario);
    }
}
