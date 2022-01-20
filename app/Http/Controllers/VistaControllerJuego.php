<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Juego;
use Illuminate\Support\Facades\Validator;

class VistaControllerJuego extends Controller{

    public function viewGame($id){
        $usuario = Usuario::find($id);
        $juegos= Juego::all();
        return view('setGames',compact('usuario','juegos'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function setGameU(Request $request){
        
        $validator = Validator::make(
            [
            'idGenero' => 'required',
            'nombreJuego' => 'required|min:2|max:255',
            'edadRestriccion' => 'required|min:6|max:60',
            'almacenamiento' =>'required|min:2|max:20',
            'linkJuego' => 'required',
            ],
    
            [
            
            'idGenero.required' => 'Debes ingresar un id de juego',
            'idGenero.min'=>'Debe ser de largo mínimo :min',
            'idGenero.max'=>'Debe ser de largo máximo :max',

            'nombreJuego.required' => 'Debes ingresar un nombre de usuario',
            'nombreJuego.min'=>'Debe ser de largo mínimo :min',
            'nombreJuego.max'=>'Debe ser de largo máximo :max',
    
            'edadRestriccion.required' => 'Debes ingresar una edad de restriccion',
            'edadRestriccion.min'=>'Debe ser de largo mínimo :min',
            'edadRestriccion.max'=>'Debe ser de largo máximo :max',
    
            'almacenamiento.required' => 'Debes ingresar un almacenamiento',
            'almacenamiento.min'=>'Debe ser de largo mínimo :min',
            'almacenamiento.max'=>'Debe ser de largo máximo :max',
    
            'linkJuego.required' => 'Link requerido',
    
            ]
            );
    
    
        //Caso falla la validación
        if($validator->fails()){
        return response($validator->errors(), 400);
        }
    
        $juego = Juego::find($request->id);
    
        if($juego == NULL){
            return response()->json([
                "msg" => 'El id es invalido',
                'id' => $request->id
            ]);
        }
        if($request->idGenero !=NULL){
            $juego->idGenero = $request->idGenero;
            
        }
        if($request->nombre !=NULL){
            $juego->nombreJuego = $request->nombre; 
            
        }
        if($request->edadRestriccion !=NULL){
            $juego->edadRestriccion = $request->edadRestriccion; 
            
        }
        if($request->almacenamiento !=NULL){
            $juego->almacenamiento = $request->almacenamiento; 
            
        }
        if($request->linkJuego !=NULL){
            $juego->linkJuego = $request->linkJuego;
        }
        
        $juego->save();
        return redirect('/catalogo');
         

    }

}