<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UsuarioRol;
use App\Models\Usuario;
use App\Models\Rol;

class UsuarioRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioRol = UsuarioRol::all()->where('delete',FALSE);
        if($usuarioRol != NULL){
            return response()->json($usuarioRol);
        }
        return response()->json([
            'message' => 'Tabla no encontrada.'
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
                'idRol' => $request->idRol,  
            ],
            [
                'idUsuario' => 'required',
                'idRol' => 'required',
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
        $rol = Rol::find($request->idRol);
        if($rol == NULL){
            return response()->json([
                "message" => 'Id de rol invalido.'
            ]);
        }
        $usuarioRol = new usuarioRol();
        $usuarioRol->idUsuario = $request->idUsuario;
        $usuarioRol->idRol = $request->idRol;
        $usuarioRol->delete = FALSE;
        $usuarioRol->save();

        if ($usuarioRol != NULL) {
            return response()->json([
                "message" => 'Se ha creado una tabla intermedia.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado una tabla intermedia.'
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
        $usuarioRol = UsuarioRol::find($id);
        if ($usuarioRol != NULL) {
            return response()->json($usuarioRol);
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
                'idRol' => $request->idRol,
            ],
            [
                'idUsuario' => 'required',
                'idRol' => 'required',
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

        $rol = Rol::find($request->idRol);
        if($rol == NULL){
            return response()->json([
                "message" => 'Id de rol invalido.'
            ]);
        }
        
        $usuarioRol = UsuarioRol::find($id);
        if($usuarioRol == NULL){
            return response()->json([
                "message" => 'El Id es invalido.'
            ]);
        }

        if ($request->idUsuario != NULL) {
            $usuarioRol->idUsuario = $request->idUsuario;
        }
        if ($request->idRol != NULL) {
            $usuarioRol->idRol = $request->idRol;
        }
        $usuarioRol->save();
        return response()->json($usuarioRol);
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
         
          $usuarioRol = UsuarioRol::find($id);
           //Valida existencia de tupla
           if(($usuarioRol == NULL) || ($usuarioRol->delete==TRUE)){
            return response()->json([
                "msg" => "La tabla no existe.",
            ],404);
        }
    
            $usuarioRol->delete = TRUE;
            $usuarioRol->save();
            return response()->json($usuarioRol);
    }
}
