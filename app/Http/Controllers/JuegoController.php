<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Genero;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\UsuarioRol;
use App\Models\Biblioteca;
use Illuminate\Support\Facades\Validator;



class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        $juegos = Juego::all()->where('delete',FALSE);
        if($juegos->isEmpty()){
            return response()->json([], 204);
        }
        return view('catalogo',compact('juegos'));    }
    /*
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
*/

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
                'idGenero' => $request->idGenero,
                'nombreJuego' => $request -> nombreJuego,
                'edadRestriccion'=> $request -> edadRestriccion,
                'almacenamiento'=> $request -> almacenamiento,
                'capacidadJuego'=> $request -> capacidadJuego,
                'linkJuego'=> $request -> linkJuego,
            ],

            [
                'idGenero' => 'required|min:3',
                'nombreJuego' => 'required|min:3',
                'edadRestriccion'=> 'required|min:3',
                'almacenamiento'=> 'required|min:3',
                'capacidadJuego'=> 'required|min:3',
                'linkJuego'=> 'required|min:3',

            ]
            );
            if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }
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

        if($request->idGenero == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos ."-El campo idGenero está vacío";
        }
        else{
            $juego->idGenero = $request->idGenero;
        }

        if($fallido == FALSE){

            $juego->save();
            return response()->json($juego);
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
        
        $validator = Validator::make(
            [
                'idGenero' => $request->idGenero,
                'nombreJuego' => $request -> nombreJuego,
                'edadRestriccion'=> $request -> edadRestriccion,
                'almacenamiento'=> $request -> almacenamiento,
                'capacidadJuego'=> $request -> capacidadJuego,
                'linkJuego'=> $request -> linkJuego,
            ],

            [
                'idGenero' => 'required|min:3',
                'nombreJuego' => 'required|min:3',
                'edadRestriccion'=> 'required|min:3',
                'almacenamiento'=> 'required|min:3',
                'capacidadJuego'=> 'required|min:3',
                'linkJuego'=> 'required|min:3',

            ]
            );
            if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }

        $juego = Juego::find($id);
        if(empty($juego)){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos. "El juego buscado no existe";
        }
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
        //validacion 'idGenero'
        if($request->idGenero == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos ."-El campo idGenero está vacío";
        }
        else{
            $juego->idGenero = $request->idGenero;
        }

        if($fallido == FALSE){

            $juego->save();
            return response()->json($juego);
        }

        else{
            return response()->json([
                 "msg" => $mensajeFallos,
             ],400); 
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
        return response()->json($juego);
    }

    public function newGame($id){
        $usuario = Usuario::find($id);
        $usuarioRol = UsuarioRol::all()->where('delete',FALSE);
        foreach($usuarioRol as $uR){
            if($uR->idUsuario == $usuario->id){
                $rol = Rol::find($uR->idRol);
                if($rol->nombreRol == 'Administrador' || $rol->nombreRol == 'Desarrollador'){
                    $genero = Genero::all()->where('delete',FALSE);
                    return view('crearJuego',compact('usuario','genero'));
                }
                else{
                    return response()->json([
                        "msg" => 'Solo los administradores y desarrolladores pueden agregar juegos',
                    ]);

                }
            }
        } 
        
    }
   
    public function crear(Request $request){
        $validator = Validator::make(
            [
                'nombreJuego' => $request -> nombreJuego,
                'edadRestriccion'=> $request -> edadRestriccion,
                'almacenamiento'=> $request -> almacenamiento,
                'linkJuego'=> $request -> linkJuego,
            ],

            [
                'nombreJuego' => 'required|min:3',
                'edadRestriccion'=> 'required|min:3',
                'almacenamiento'=> 'required|min:3',
                'linkJuego'=> 'required|min:3',

            ]
            );
            if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }

       $juego =  new Juego();
       $juego->nombreJuego = $request->nombreJuego;
       $juego->edadRestriccion = $request->edadRestriccion;
       $juego->linkJuego = $request->linkJuego;
       $juego->idGenero = $request->idGenero;
       $juego->delete=FALSE;
       $juego->save(); 
       
       $biblioteca = new Biblioteca();
       $biblioteca->idUsuario = $request->id;
       $biblioteca->idJuego = $juego->id;
       $biblioteca->delete= FALSE;
       $biblioteca->save();
       
       $juegos = Juego::all()->where('delete',FALSE);
       return view('catalogo','juegos');
    }
}
