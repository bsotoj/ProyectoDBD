<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Pais;
use App\Models\Usuario;
use App\Models\Cartera;
use App\Models\ListaDeseo;
use App\Models\Rol;
use App\Models\UsuarioRol;
use Illuminate\Support\Facades\Validator;
class RegistroController extends Controller
{
   public function registrar(Request $request){


        $validator = Validator::make(
    
            [
            'nombreUsuario' => 'required|min:2|max:255',
            'nombre' => 'required|min:2|max:255',
            'contraseña' => 'required|min:2|max:20',
            'email' => 'required|regex:/^.+@.+$/i',
            'fechaNacimiento' => 'required',
            'metodoRecarga' => 'required|min:2|max:255',
            'nombreLista' => 'required',
            'idRegion' => $request->idRegion, 
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

            'metodoRecarga.required' => 'Debes ingresar un método de recarga',
            'metodoRecarga.min'=>'Debe ser de largo mínimo :min',
            'metodoRecarga.max'=>'Debe ser de largo máximo :max',


            'nombreLista.required' => 'Debes ingresar un nombre de tu lista de deseos',
            'nombreLista.min'=>'Debe ser de largo mínimo :min',
            'nombreLista.max'=>'Debe ser de largo máximo :max',
            ]
            );
            
            if($validator->fails())
            {
                return view('login.register');
            }

            $cartera = new Cartera();
            $cartera->metodoRecarga = $request ->metodoRecarga;
            $cartera->monto = 0; 
            $cartera->delete = FALSE; 
            $cartera->tipoMoneda = 'CL';
            $cartera->save();

            $listaDeseo = new ListaDeseo(); 
            $listaDeseo->nombreLista = $request->nombreLista;
            $listaDeseo->delete = FALSE; 
            $listaDeseo->save();

           
            
            $usuario= new Usuario();
            $usuario->nombreUsuario = $request->nombreUsuario;
            $usuario->nombre = $request->nombre;
            $usuario->contraseña = $request->contraseña;
            $usuario->delete = FALSE; 
            $usuario->email = $request ->email;
            $usuario->fechaNacimiento = $request->fechaNacimiento;
            $usuario->idCartera = $cartera->id;
            $usuario->idListaDeseos = $listaDeseo->id; 
            $usuario->idRegion = $request->idRegion;
            $usuario->save();

            $rol= Rol::all()->Random();
            $usuarioRol = new UsuarioRol();
            $usuarioRol->idRol = $rol->id;
            $usuarioRol->idUsuario = $usuario->id;
            $usuarioRol->delete = FALSE; 
            $usuarioRol->save();

            $users= Usuario::all()->where('delete',FALSE);
            return view('home',compact('users'));
         
            
   
}
}
