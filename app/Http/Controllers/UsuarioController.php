<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Region;
use App\Models\Cartera;
use App\Models\ListaDeseo;
use App\Models\Rol;
use App\Models\UsuarioRol;
use Illuminate\Support\Facades\Validator;
class UsuarioController extends Controller
{
    public function index()
    {
     
        $usuario = Usuario::all()->where('delete',FALSE);
        return response()->json($usuario);
        return view('profile',compact('usuario'));
    }

    
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->delete = FALSE; 

        $validator = Validator::make(
            $request->all(),
            [
            'nombreUsuario' => 'required|min:2|max:255',
            'nombre' => 'required|min:2|max:255',
            'contraseña' => 'required|min:2|max:20',
            'email' => 'required|regex:/^.+@.+$/i',
            'fechaNacimiento' => 'required',
            'idCartera'=> 'required|integer',
            'idRegion' => 'required|integer',
            'idListaDeseos' =>'required|integer',

            ],

            [
            'nombreUsuario.required' => 'Debes ingresar un nombre de usuario',
            'nombreUsuario.min'=>'Debe ser de largo mínimo :min',
            'nombreUsuario.max'=>'Debe ser de largo máximo :max',

            'nombre.required' => 'Debes ingresar un nombre',
            'nombre.min'=>'Debe ser de largo mínimo :min',
            'nombre.max'=>'Debe ser de largo máximo :max',

            'contraseña.required' => 'Debes ingresar una contraseña',
            'contraseña.min'=>'Debe ser de largo mínimo :min',
            'contraseña.max'=>'Debe ser de largo máximo :max',

            'email.required' => 'Email requerido',

            'fechaNacimiento.required' => 'Fecha Nacimiento requerida',

            'idCartera.required' => 'Debes asociar una cartera',
            'idCartera.integer' => 'Debe ser un número',

            'idRegion.required' => 'Debes asociar una region',
            'idRegion.integer' => 'Debe ser un número',

            'idListaDeseos.required' => 'Debes asociar una lista de deseo',
            'idListaDeseos.integer' => 'Debe ser un número',
            ]
            );


//Caso falla la validación
if($validator->fails()){
    return response($validator->errors(), 400);
}
        $cartera = Cartera::find($request->idCartera);
        if($cartera == NULL){
            return response()->json([
                "message" => 'Id de cartera invalida'
            ]);
        }
        else{
            $usuario->idCartera = $request->idCartera;
        }

        $region = Region::find($request->idRegion);
        if($region == NULL){
            return response()->json([
                "message" => 'Id de region invalida'
            ]);
        }
        else{
            $usuario->idRegion = $request->idRegion;
        }

        $listaDeseo = ListaDeseo::find($request->idListaDeseos);
        if($listaDeseo == NULL){
            return response()->json([
                "message" => 'Id de listaDeseo invalida'
            ]);
        }
        else{
            $usuario->idListaDeseos = $request->idListaDeseos;
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



    public function login(Request $request){
        /*
        $validator = Validator::make(
            $request->nombreUsuario,$request->contraseña,
            [
                'nombreUsuario' => 'required|min:2|max:255',
                'contraseña' => 'required|min:2|max:20',
            ],

            [
                'nombreUsuario.required' => 'Debes ingresar un nombre de usuario',
                'nombreUsuario.min'=>'Debe ser de largo mínimo :min',
                'nombreUsuario.max'=>'Debe ser de largo máximo :max',

                'contraseña.required' => 'Debes ingresar una contraseña',
                'contraseña.min'=>'Debe ser de largo mínimo :min',
                'contraseña.max'=>'Debe ser de largo máximo :max',
            ]
        );
        
        $validator->validate();
        */
        $users = Usuario::all()->where('delete',FALSE);
        foreach($users as $usuario){
            if($usuario->nombreUsuario == $request->nombreUsuario & $usuario->contraseña == $request->contraseña){
                $user = Usuario::find($usuario->id);
                $uRol = UsuarioRol::all()->where('delete',FALSE); 
                foreach($uRol as $usuarioRolBuscado){
                    if($usuarioRolBuscado->idUsuario == $user->id){
                        $rol = Rol::find($usuarioRolBuscado->idRol);
                        return view('profile',compact('user','rol'));

                    }
                }
            }
        }
        /*
        return response()->json([
            "msg" => "El usuario ingresado no existe",
        ],404);
        */

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


        $cartera = Cartera::find($request->idCartera);
        if($cartera == NULL){
            return response()->json([
                "message" => 'Id de cartera invalida'
            ]);
        }
        else{
            $usuario->idCartera = $request->idCartera;
        }

        $region = Region::find($request->idRegion);
        if($region == NULL){
            return response()->json([
                "message" => 'Id de region invalida'
            ]);
        }
        else{
            $usuario->idRegion = $request->idRegion;
        }

        $listaDeseo = ListaDeseo::find($request->idListaDeseos);
        if($listaDeseo == NULL){
            return response()->json([
                "message" => 'Id de listaDeseo invalida'
            ]);
        }
        else{
            $usuario->idListaDeseos = $request->idListaDeseos;
        }
         //en caso de no haber fallado en alguno de los casos se guarda la nueva tupla
         if($fallido == FALSE){

            $usuario->save();
            return response()->json($usuario);
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
        return response()->json($usuario);
    }
}
