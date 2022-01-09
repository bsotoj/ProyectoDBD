<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;
use Illuminate\Support\Facades\Validator;
class PermisoController extends Controller
{
   
    public function index()
    {
        $permiso = Permiso::all()->where('delete',FALSE);
        if($permiso != NULL){
            return response()->json($permiso);

        }
        else{
            return response()->json([
                'msg' => 'No existen permisos'
            ],404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                'nombrePermiso' => $request->nombrePermiso,
            
            ],

            [
                'nombrePermiso' => 'required',
            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }


        $permiso = new Permiso();
        $permiso->nombrePermiso = $request->nombrePermiso;
        $permiso->delete = FALSE;
        $permiso->save();

        if($permiso != NULL){
            return response()->json([
                'msg' => 'se ha creado un nuevo permiso'
            ],202);

        return response()->json([
            'msg' => 'no se ha creado el permiso'
        ]);    
        }

    }

    public function show($id)
    {
        $permiso = Permiso::find($id);
        if($permiso != NULL){
            return response()->json($permiso);
        }
        return response()->json([
            'msg' => 'no se encontro ningun valor con la id asociada'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'nombrePermiso' => $request->nombrePermiso,
            ],

            [
                'nombrePermiso' => 'required|min:3',

            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }

        $permiso = Permiso::find($id);
        if($permiso == NULL){
            return response()->json([
                "message" => 'El id es invalido'
            ]);
        }
        if ($request->nombrePermiso!= NULL) {
            $permiso->nombrePermiso = $request->nombrePermiso;
        }

        $permiso->save();
        return response()->json($permiso);
    }
   
    public function destroy($id)
    {
     // Validación ID
     if(ctype_digit($id) != TRUE){
        return response()->json([
            "msg" => "El id es inválido",
        ],400);
       }
     
      $permiso = Permiso::find($id);
       //Valida existencia de tupla
       if(($permiso == NULL) || ($permiso->delete==TRUE)){
        return response()->json([
            "msg" => "El permiso no existe",
        ],404);
    }

        $permiso->delete = TRUE;
        $permiso->save();
        return response()->json($permiso);
}    
}
