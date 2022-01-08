<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //como se hace soft delete entonces consideramos a los usuarios
        //que tengan la bandera 'delete' = TRUE
        $usuario = Usuario::all()->where('delete',FALSE);
        return response($usuario,200);
    }

    
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->delete = FALSE; 

        $fallido = FALSE;
        $mensajeFallos = '';

        //validación 'nombre'
        if($request->nombre == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos-"El campo 'nombre' está vacío\n";
        }

        else{
            $usuario->nombre = $request -> nombre;
        }

        //Validación 'contraseña'
        if($request->contraseña == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'contraseña' está vacío\n";
        }
        else{
            $usuario->contraseña = $request->contraseña;
        }

        //Validación 'email'
        if($request->email == NULL){
            $fallido = TRUE; 
            $mensajeFallos = $mensajeFallos. "El campo 'email' está vacío\n";
        }

        if( ((strpos($request->email,'.') == FALSE) || (strpos($request->email,'@')==FALSE)
            || (substr_count($request->email,'@') > 1 )) && ($fallido == FALSE)){

                $fallido = TRUE;
                $mensajeFallos = $mensajeFallos."El campo 'email' no es válido\n";
            }

        else{
            $usuario->email = $request->email;
        }

         //en caso de no haber fallado en alguno de los casos se guarda la nueva tupla
         if($fallido == FALSE){

            $usuario->save();
            return response()->json([
                'msg' => 'Se ha creado un nuevo usuario',
                'id' => $usuario->id,
            ,201]);
        }


        else{
           return response()->json([
                'msg' => $mensajeFallos,
            ],400); 
        }
        


    }
    public function show($id)
    {     
        //Validación ID ingresada
        if(ctype_digit($id) != TRUE){
            return responde()->json([
                'msg' => 'La ID ingresada no es válida',
            ],400);
        }

        $usuario = Usuario::find($id);

        //Verificación de la existencia de la tupla
        //considerando la bandera 'delete' 
        if(empty($usuario) || ($usuario->delete == TRUE)){
            return response()->json([
                'msg' => 'El usuario solicitado no existe',
            ],404);
        }
        return response($usuario,200);
    }

  
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        //verificar existencia de tupla 
        if(empty($usuario) || ($usuario->delete == TRUE)){
            return response()->json([
                'msg' => 'El usuario solicitado no existe',
            ],404);
        }

        $fallido = FALSE;
        $mensajeFallos = '';

        //validación 'nombre'
        if($request->nombre == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos-"El campo 'nombre' está vacío\n";
        }

        else{
            $usuario->nombre = $request -> nombre;
        }

        //Validación 'contraseña'
        if($request->contraseña == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'contraseña' está vacío\n";
        }
        else{
            $usuario->contraseña = $request->contraseña;
        }

        //Validación 'email'
        if($request->email == NULL){
            $fallido = TRUE; 
            $mensajeFallos = $mensajeFallos. "El campo 'email' está vacío\n";
        }

        if( ((strpos($request->email,'.') == FALSE) || (strpos($request->email,'@')==FALSE)
            || (substr_count($request->email,'@') > 1 )) && ($fallido == FALSE)){

                $fallido = TRUE;
                $mensajeFallos = $mensajeFallos."El campo 'email' no es válido\n";
            }

        else{
            $usuario->email = $request->email;
        }

         //en caso de no haber fallado en alguno de los casos se modifica la tupla
         if($fallido == FALSE){
            $usuario->save();
            return response()->json([
                'msg' => 'Se ha actualizado el usuario',
                'id' => $usuario->id,
            ,200]);
        }


        else{
           return response()->json([
                'msg' => $mensajeFallos,
            ],400); 
        }
        
    }


    public function destroy($id)
    {
        // Validación ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                'msg' => 'El id es inválido',
            ],400);
        }

        $usuario = Usuario::find($id);

        //Valida existencia de tupla
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                'msg' => 'El usuario no existe',
            ],404);
        }

        $usuario->delete = TRUE;
        $usuario->save();
        return response()->json([
            'msg' => 'El usuario ha sido eliminado',
        ],200);
    }
}
