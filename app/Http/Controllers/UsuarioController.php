<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Region;
use App\Models\Cartera;
use App\Models\ListaDeseo;
class UsuarioController extends Controller
{
    public function index()
    {
     
        $usuario = Usuario::all()->where('delete',FALSE);
        return response()->json($usuario);
    }

    
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->delete = FALSE; 

        $fallido = FALSE;
        $mensajeFallos = '';
        //validación 'nombreUsuario'
         if($request->nombreUsuario == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'nombreUsuario' está vacío";
        }

        else{
            $usuario->nombreUsuario = $request -> nombreUsuario;
        }

        //validación 'nombre'
        if($request->nombre == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."-El campo 'nombre' está vacío";
        }

        else{
            $usuario->nombre = $request -> nombre;
        }

        //Validación 'contraseña'
        if($request->contraseña == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos. "-El campo 'contraseña' está vacío";
        }
        else{
            $usuario->contraseña = $request->contraseña;
        }

        //Validación 'email'
        if($request->email == NULL){
            $fallido = TRUE; 
            $mensajeFallos = $mensajeFallos. "-El campo 'email' está vacío";
        }

        if( ((strpos($request->email,'.') == FALSE) || (strpos($request->email,'@')==FALSE)
            || (substr_count($request->email,'@') > 1 )) && ($fallido == FALSE)){

                $fallido = TRUE;
                $mensajeFallos = $mensajeFallos."-El campo 'email' no es válido";
            }

        else{
            $usuario->email = $request->email;
        }
         //validación 'fechaNacimiento'
         if($request->fechaNacimiento == NULL){
             $fallido = TRUE;
             $mensajeFallos=$mensajeFallos."El campo 'fechaNacimiento está vacío";
         }

         if(((strpos($request->fechaNacimiento,'-') == FALSE)) || (substr_count($request->fechaNacimiento,'-') < 2)
         || (substr_count($request->fechaNacimiento,'-') > 2) && ($fallido == FALSE)
         ){
             $fallido = TRUE;
             $mensajeFallos = $mensajeFallos."El campo 'fechaNacimiento no es válido";
         }


         else{
             $usuario->fechaNacimiento = $request->fechaNacimiento;
         }


         //en caso de no haber fallado en alguno de los casos se guarda la nueva tupla
         if($fallido == FALSE){

            $usuario->save();
            return response()->json([
                "msg" => "Se ha creado un nuevo usuario",
            ],201);
        }
       

        else{
           return response()->json([
                "msg" => $mensajeFallos,
            ],400); 
        }
        


    }
    
    
    public function show($id)
    {     
        //Validación ID ingresada
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "msg" => "La ID ingresada no es válida",
            ],400);
        }

        $usuario = Usuario::find($id);

        //Verificación de la existencia de la tupla
        //considerando la bandera 'delete' 
        if(empty($usuario) || ($usuario->delete == TRUE)){
            return response()->json([
                "msg" => "El usuario solicitado no existe",
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
                "msg" => "El usuario solicitado no existe",
            ],404);
        }

        $fallido = FALSE;
        $mensajeFallos = '';

        //validación 'nombre'
        if($request->nombre == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos-"El campo 'nombre' está vacío";
        }

        else{
            $usuario->nombre = $request -> nombre;
        }

        //Validación 'contraseña'
        if($request->contraseña == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'contraseña' está vacío";
        }
        else{
            $usuario->contraseña = $request->contraseña;
        }

        //Validación 'email'
        if($request->email == NULL){
            $fallido = TRUE; 
            $mensajeFallos = $mensajeFallos. "-El campo 'email' está vacío";
        }

        if( ((strpos($request->email,'.') == FALSE) || (strpos($request->email,'@')==FALSE)
            || (substr_count($request->email,'@') > 1 )) && ($fallido == FALSE)){

                $fallido = TRUE;
                $mensajeFallos = $mensajeFallos."El campo 'email' no es válido";
            }

        else{
            $usuario->email = $request->email;
        }

        //validación 'fechaNacimiento'
        if($request->fechaNacimiento == NULL){
            $fallido = TRUE;
            $mensajeFallos=$mensajeFallos."El campo 'fechaNacimiento está vacío";
        }

        if(((strpos($request->fechaNacimiento,'-') == FALSE)) || (substr_count($request->fechaNacimiento,'-') < 2)
        || (substr_count($request->fechaNacimiento,'-') > 2) && ($fallido == FALSE)
        ){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."-El campo 'fechaNacimiento no es válido";
        }


        else{
            $usuario->fechaNacimiento = $request->fechaNacimiento;
        }


         //en caso de no haber fallado en alguno de los casos se modifica la tupla
         if($fallido == FALSE){
            $usuario->save();
            return response()->json([
                "msg" => "Se ha actualizado el usuario",
            ],200);
        }


        else{
           return response()->json([
                "msg" => $mensajeFallos,
            ],400); 
        }
        
    }


    public function destroy($id)
    {
        // Validación ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "msg" => "El id es inválido",
            ],400);
        }

        $usuario = Usuario::find($id);

        //Valida existencia de tupla
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "msg" => "El usuario no existe",
            ],404);
        }

        $usuario->delete = TRUE;
        $usuario->save();
        return response()->json([
            "msg" => "El usuario ha sido eliminado",
        ],200);
    }
}
