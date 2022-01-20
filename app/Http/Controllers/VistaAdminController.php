<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\UsuarioRol;
use App\Models\Region;
use Illuminate\Support\Facades\Validator;
class VistaAdminController extends Controller{

    public function adminView($id){
        $user = Usuario::find($id);
        $usuarioRol = UsuarioRol::all()->where('delete',FALSE);

        foreach($usuarioRol as $u){
            if($u->idUsuario == $user->id){
                $rol = Rol::find($u->idRol);
                if($rol->nombreRol == 'Administrador'){
                    return view('administrar',compact('user'));
                }
            }
        }
        
         return response()->json([
            "msg" => 'Solo el administrador puede tener acceso',
            ]);
      
    
    }
   
    
    public function viewUsers($id){
        $admin = Usuario::find($id);
        $aux= Usuario::all()->where('delete',FALSE);
        $usuarios = array();

        foreach($aux as $usuario){
            if($usuario->id != $admin->id){
                array_push($usuarios,$usuario);
            }
        }
        return view('adminUserGet',compact('usuarios','admin'));

    }

 
    public function candidatosEditar($id){
        $admin = Usuario::find($id);
        $aux = Usuario::all()->where('delete',FALSE); 
        $usuarios = array(); 

        foreach($aux as $usuario){
            if($usuario->id != $admin->id){
                array_push($usuarios,$usuario);
            }
        }
        //return response()->json($usuarios);
        return view('adminUserPut',compact('usuarios'));
    }
   // Route::get('/administrar/Id={id}/editar','VistaAdminController@candidatosEditar');


    public function prepararUsuarioModificar(Request $request){
        //return response()->json($request);
        $usuario = Usuario::find($request->id);
        //return response()->json($usuario);
        $regiones = Region::all();
        return view('setAdminProfile',compact('usuario','regiones'));
    }



    public function getUsers($id){
        $admin = Usuario::find($id);
        $aux= Usuario::all()->where('delete',FALSE);
        $usuarios = array();

        foreach($aux as $usuario){
            if($usuario->id != $admin->id){
                array_push($usuarios,$usuario);
            }
        }
        return view('adminUserDelete',compact('usuarios'));
    }

    public function updateUser(Request $request){
        $validator = Validator::make(
            [
            'nombreUsuario' => 'required|min:2|max:255',
            'nombre' => 'required|min:2|max:255',
            'contraseña' => 'required|min:2|max:20',
            'email' => 'required|regex:/^.+@.+$/i',
            'fechaNacimiento' => 'required',
    
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
            ]
            );
    
    
        //Caso falla la validación
        if($validator->fails()){
        return response($validator->errors(), 400);
        }
    
        $user = Usuario::find($request->id);
        if($user == NULL){
            return response->json([
                "msg" => 'El id es invalido',
                'id' => $request->id
            ]);
        }
        if($request->nombre !=NULL){
            $user->nombre = $request->nombre;
            
        }
        if($request->nombreUsuario !=NULL){
            $user->nombreUsuario = $request->nombreUsuario; 
            
        }
        if($request->contraseña !=NULL){
            $user->contraseña = $request->contraseña; 
            
        }
        if($request->email !=NULL){
            $user->email = $request->email; 
            
        }
        if($request->idRegion !=NULL){
            $user->idRegion = $request->idRegion;
        }
        
        $user->save();
        $usuarioRol = UsuarioRol::all()->where('delete',FALSE);
    
        foreach($usuarioRol as $u ){
            if($u->idUsuario == $user->id){
                $rol = Rol::find($u->idRol);
                return view('login');
            }
        }
    
    }
    
    public function redirigir($id){
        $user= Usuario::find($id);
        $usuarioRol = UsuarioRol::all()->where('delete',FALSE);
        
        foreach($usuarioRol as $u){
            if($u->idUsuario == $user->id){
                $rol=Rol::find($u->idRol);
                return view('profile',compact('user','rol'));
            }
        }

    }

}
