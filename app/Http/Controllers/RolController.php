<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use Illuminate\Support\Facades\Validator;
class RolController extends Controller
{
    public function index()
    {
        $rol = Rol::all()->where('delete',FALSE);
        if($rol != NULL){
            return response()->json($rol);

        }
        else{
            return response()->json([
                'msg' => 'No existen roles'
            ],404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                'nombreRol' => $request->nombreRol,
            
            ],

            [
                'nombreRol' => 'required',
            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }


        $rol = new Rol();
        $rol->nombreRol = $request->nombreRol;
        $rol->delete = FALSE;
        $rol->save();

        if($rol != NULL){
            return response()->json([
                'msg' => 'se ha creado un nuevo rol'
            ],202);

        return response()->json([
            'msg' => 'no se ha creado el rol'
        ]);    
        }

    }

    public function show($id)
    {
        $rol = Rol::find($id);
        if($rol != NULL){
            return response()->json($rol);
        }
        return response()->json([
            'msg' => 'no se encontro ningun valor con la id asociada'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'nombreRol' => $request->nombreRol,
            ],

            [
                'nombreRol' => 'required|min:3',

            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }

        $rol = Rol::find($id);
        if($rol == NULL){
            return response()->json([
                "message" => 'El id es invalido'
            ]);
        }
        if ($request->nombreRol!= NULL) {
            $rol->nombreRol = $request->nombreRol;
        }

        $rol->save();
        return response()->json($rol);
    }
   
    public function destroy($id)
    {
     // Validación ID
     if(ctype_digit($id) != TRUE){
        return response()->json([
            "msg" => "El id es inválido",
        ],400);
       }
     
      $rol = Rol::find($id);
       //Valida existencia de tupla
       if(($rol == NULL) || ($rol->delete==TRUE)){
        return response()->json([
            "msg" => "El rol no existe",
        ],404);
    }

        $rol->delete = TRUE;
        $rol->save();
        return response()->json($rol);
    }    
}
