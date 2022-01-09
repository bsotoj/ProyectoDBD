<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Pais;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $region = Region::all()->where('delete',FALSE);
            if($region != NULL){
                return response()->json($region);
    
            }
            else{
                return response()->json([
                    'msg' => 'No existen regiones para mostrar'
                ],404);
            }
    }

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
            'idPais' => $request->idPais,
            'nombreRegion' => $request->nombreRegion
            ],
            [
            'idPais' => 'required',   
            'nombreRegion' => 'required|min:3'    
            ]
        );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]); 
        }
        $pais = Pais::find($request->idPais);
        if($pais == NULL){
            return response()->json([
                "message" => 'Id de pais invalido'
            ]);
        }
        $region = new Region();
        $region->idPais = $request->idPais;
        $region->nombreRegion = $request->nombreRegion;
        $region->delete = FALSE;
        $region->save();

        if ($region != NULL) {
            return response()->json([
                "message" => 'Se ha creado una nueva region.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado una region.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::find($id);
        if ($region != NULL) {
            return response()->json($region);
        }
        return response()->json([
            "message" => 'No se encontro ningun valor con ese id.'
        ]);
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
                'idPais' => $request->idPais,
                'nombreRegion' => $request->nombreRegion  
            ],
            [
                'idPais' => 'required',
                'nombreRegion' => 'required'
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos.'
            ]);
        }

        $pais = Pais::find($request->idPais);
        if($pais == NULL){
            return response()->json([
                "message" => 'Id de pais invalido'
            ]);
        }

        $region = Region::find($id);
        if($region == NULL){
            return response()->json([
                "message" => 'El Id es invalido'
            ]);
        }

        if ($request->idPais != NULL){
            $idPais->idPais = $request->idPais;
        }

        if ($request->nombreRegion!= NULL){
            $region->nombreRegion = $request->nombreRegion;
        }
        $region->save();
        return response()->json($region);
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
         
          $region = Region::find($id);
           //Valida existencia de tupla
           if(($region == NULL) || ($region->delete==TRUE)){
            return response()->json([
                "msg" => "La region no existe",
            ],404);
        }
            $region->delete = TRUE;
            $region->save();
            return response()->json([
            "msg" => "La region ha sido eliminado",
            ],200);
        }
}
