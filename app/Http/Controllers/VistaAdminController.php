<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Juego;
use App\Models\UsuarioRol;
use App\Models\Biblioteca;
use App\Models\Genero;
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

    public function viewGames($id){
        $admin = Usuario::find($id);
        $juegos = Juego::all()->where('delete',FALSE);
        return view('adminGameGet',compact('admin','juegos'));
        
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
        //return response()->json($usuarios);
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


    public function softDelete(Request $request)
    {
       //return response()->json($request);
        $usuario = Usuario::find($request->id);
        $usuario->delete = TRUE;
        $usuario->save();

        $usuarios = Usuario::all()->where('delete',FALSE);
        return view('login');
    }


    public function catalogoActualJuegos($id){
        $genero = Genero::all()->where('delete',FALSE);
        $usuario = Usuario::find($id);
        return view('adminGamePost',compact('genero','usuario'));
    }


    
    //PUT JUEGO SIENDO ADMIN
    public function adminCreateGame(Request $request){
        $validator = Validator::make(
            [
            'nombreJuego' => 'required|min:1|max:255',
            'edadRestriccion' => 'required',
            'almacenamiento' => 'required',
            'linkJuego' => 'required',
        
            ],
        
            [
            'nombreJuego.required' => 'Debes ingresar un nombre de juego',
            'nombreJuego.min'=>'Debe ser de largo mínimo :min',
            'nombreJuego.max'=>'Debe ser de largo máximo :max',
        
            'edadRestriccion.required' => 'Debes ingresar una edad de restricción',
           
        
            'almacenamiento.required' => 'Debes ingresar la capacidad requerida del juego',
        
            'linkJuego'.'required' => 'Se requiere una sinopsis(link) del juego',
            ]
            );
        
        
        //Caso falla la validación
        if($validator->fails()){
        return response($validator->errors(), 400);
        }
        $juego = new Juego();
        if($request->nombreJuego !=NULL){
            $juego->nombreJuego = $request->nombreJuego;
            
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
        if($request->idGenero !=NULL){
            $juego->idGenero = $request->idGenero; 
            
        }
       
        $juego->delete = FALSE;
        $juego->save();
        $biblioteca = new Biblioteca();
        $biblioteca->idUsuario = $request->id;
        $biblioteca->idJuego = $juego->id;
        $biblioteca->delete= FALSE;
        $biblioteca->save();
        $juegos = Juego::all()->where('delete',FALSE);

        return view('catalogo',compact('juegos'));

        
    }
    //PUT PARA EDITAR UN JUEGO DESDE LA VISTA ADMIN 
    public function juegosCandidatosEditar(){
        $juegos = Juego::all()->where('delete',FALSE);
        return view('adminGamePut',compact('juegos'));
    }


    public function prepararJuegoModificar(Request $request){
        $juego = Juego::find($request->id);
        $generos = Genero::all()->where('delete',FALSE); 
        return view('setGameAdmin',compact('juego','generos'));

    }
    
    public function adminSetGame(Request $request){
        $validator = Validator::make(
            [
            'nombreJuego' => 'required|min:2|max:255',
            'edadRestriccion' => 'required',
            'almacenamiento' => 'required',
            'linkJuego' => 'required',
    
            ],
    
            [
            'nombreJuego.required' => 'Debes ingresar un nombre de juego',
            'edadRestriccion.required' => 'Debes ingresar una edad de restricción',
            'almacenamiento.required' => 'Debes ingresar la capacidad de almacenamiento',
            'linkJuego.required' => 'Link de juego requerido',
            ]
            );
    
    
        //Caso falla la validación
        if($validator->fails()){
        return response($validator->errors(), 400);
        }

        $juego = Juego::find($request->id);

        if($request->nombreJuego !=NULL){
            $juego->nombreJuego = $request->nombreJuego;
            
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
        $juegos= Juego::all()->where('delete',FALSE);
        return view('catalogo',compact('juegos'));
    

    }



    public function catalogoParaBorrar($id){
        $admin = Usuario::find($id);
        $juegos = Juego::all()->where('delete',FALSE);
        return view('adminGameDelete',compact('admin','juegos'));

    }


    //SOFT DELETE PARA UN JUEGO SIENDO ADMIN
    public function gameSoftDelete(Request $request){
        $juego = Juego::find($request->idJuego);
        $juego->delete = TRUE;
        $juego->save();
        $juegos = Juego::all()->where('delete',FALSE);
        $user= Usuario::find($request->id);
        return view('catalogoSoftDelete',compact('user','juegos'));
        

    }

}

    
   

