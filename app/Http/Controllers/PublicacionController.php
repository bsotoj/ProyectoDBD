<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Publicacion;
use App\Models\Comunidad;
use App\Models\Usuario;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicacion = Publicacion::all()->where('delete',FALSE);
        if($publicacion != NULL){
            return response()->json($publicacion);
        }
        return response()->json([
            'message' => 'Publicación no encontrada.'
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
                'nombrePublicacion' => $request->nombrePublicacion,
                'mensajePublicacion' => $request->mensajePublicacion,
                'idComunidad' => $request->idComunidad,
                'idUsuario' => $request->idUsuario 
            ],
            [
                'nombrePublicacion' => 'required|min:3',
                'mensajePublicacion' => 'required|min:3',
                'idComunidad' => 'required',
                'idUsuario' => 'required'
            ]
            );
            if($validator->fails())
            {
                return response()->json([
                    'msg' => 'Datos ingresados invalidos.'
                ]);
            }
            $comunidad = Comunidad::find($request->idComunidad);
            if($comunidad == NULL){
                return response()->json([
                    "message" => 'Id de comunidad invalido.'
                ]);
            }
            $usuario = Usuario::find($request->idUsuario);
            if($usuario == NULL){
                return response()->json([
                    "message" => 'Id de usuario invalido.'
                ]);
            }
            $publicacion = new Publicacion();
            $publicacion->nombrePublicacion = $request->nombrePublicacion;
            $publicacion->mensajePublicacion = $request->mensajePublicacion;
            $publicacion->idComunidad = $request->idComunidad;
            $publicacion->idUsuario = $request->idUsuario;
            $publicacion->delete = FALSE;
            $publicacion->save();
            if ($publicacion != NULL) {
                return response()->json([
                    "message" => 'Se ha creado una publicación.'
                ],202);
            }
            return response()->json([
                'msg' => 'No se ha creado la publicación.'
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
        $publicacion = Publicacion::find($id);
        if ($publicacion != NULL) {
            return response()->json($publicacion);
        }
        return response()->json([
            "message" => 'No se encontro ninguna publicación con ese id.'
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
                'nombrePublicacion' => $request->nombrePublicacion,
                'mensajePublicacion' => $request->mensajePublicacion,
                'idComunidad' => $request->idComunidad,
                'idUsuario' => $request->idUsuario 
            ],
            [
                'nombrePublicacion' => 'required|min:3',
                'mensajePublicacion' => 'required|min:3',
                'idComunidad' => 'required',
                'idUsuario' => 'required'
            ]
            );
            if($validator->fails())
            {
                return response()->json([
                    'msg' => 'Datos ingresados invalidos'
                ]);
            }
            $comunidad = Comunidad::find($request->idComunidad);
            if($comunidad == NULL){
                return response()->json([
                    "message" => 'Id de comunidad invalido.'
                ]);
            }
            $usuario = Usuario::find($request->idUsuario);
            if($usuario == NULL){
                return response()->json([
                    "message" => 'Id de usuario invalido.'
                ]);
            }
            $publicacion = Publicacion::find($id);
            if($publicacion == NULL){
                return response()->json([
                    "message" => 'El id es invalido.'
                ]);
            }
            if ($request->nombrePublicacion!= NULL) {
                $publicacion->nombrePublicacion = $request->nombrePublicacion;
            }
            if ($request->mensajePublicacion != NULL) {
                $publicacion->mensajePublicacion = $request->mensajePublicacion;
            if ($request->idComunidad != NULL) {
                $publicacion->idComunidad = $request->idComunidad;
            }
            if ($request->idUsuario != NULL) {
                $publicacion->idUsuario = $request->idUsuario;
            }
            $publicacion->save();
            return response()->json($publicacion);
    }
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
         
          $publicacion = Publicacion::find($id);
           //Valida existencia de tupla
           if(($publicacion == NULL) || ($publicacion->delete==TRUE)){
            return response()->json([
                "msg" => "La publicacion no existe.",
            ],404);
        }
            $publicacion->delete = TRUE;
            $publicacion->save();
            return response()->json($publicacion);
    }
}

