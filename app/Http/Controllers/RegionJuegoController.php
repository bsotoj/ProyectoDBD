<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Juego;
use App\Models\RegionJuego;
class RegionJuegoController extends Controller
{
    public function index()
    {
        $regionJuego = RegionJuego::all()->where('delete',FALSE);
        if($regionJuego != NULL){
            return response()->json($regionJuego);
        }
        return response()->json([
            'message' => 'Not Found!'
        ], 404);
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make(
            [
                'nombre' =>$request ->nombre,
                'precio' =>$request ->precio,
                'moneda' =>$request ->moneda,
                'idRegion' => $request->idRegion,
                'idJuego' => $request->idJuego,
            ],
            [
                'nombre' => 'required',
                'precio'=> 'required',
                'moneda'=> 'required',
                'idRegion' => 'required',
                'idJuego' => 'required',
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos'
            ]);
        }

        $juego = Juego::find($request->idJuego);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id de juego invalido'
            ]);
        }

        $region = Region::find($request->idRegion);
        if($region == NULL){
            return response()->json([
                "message" => 'Id del region es invalido'
            ]);
        }
 
        $regionJuego = new RegionJuego();
        $regionJuego->delete = FALSE;
        $regionJuego->nombre = $request->nombre;
        $regionJuego->precio = $request->precio;
        $regionJuego->moneda = $request->moneda;
        $regionJuego->idRegion = $request->idRegion;
        $regionJuego->idJuego = $request->idJuego;
        $regionJuego->save();

        if ($regionJuego != NULL) {
            return response()->json($regionJuego);
        }
        return response()->json([
            "message" => 'No se ha creado regionJuego.'
        ]);

     
    }

    public function show($id)
    {
        $regionJuego = RegionJuego::find($id);
        if ($regionJuego != NULL) {
            return response()->json($regionJuego);
        }
        return response()->json([
            "message" => 'No se encontro ningun valor de id.'
        ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'nombre' =>$request ->nombre,
                'precio' =>$request ->precio,
                'moneda' =>$request ->moneda,
                'idRegion' => $request->idRegion,
                'idJuego' => $request->idJuego,
            ],
            [
                'nombre' => 'required',
                'precio'=> 'required',
                'moneda'=> 'required',
                'idRegion' => 'required',
                'idJuego' => 'required',
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos'
            ]);
        }

        $juego = Juego::find($request->idJuego);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id del juego invalido'
            ]);
        }

        $region = Region::find($request->idRegion);
        if($region == NULL){
            return response()->json([
                "message" => 'Id de region invalido'
            ]);
        }
        
        $regionJuego = RegionJuego::find($id);
        if($regionJuego == NULL || $regionJuego->delete == TRUE ){
            return response()->json([
                "message" => 'El Id es invalido'
            ]);
        }
        if ($request->idRegion != NULL) {
            $regionJuego->idRegion = $request->idRegion;
        }
        if ($request->idJuego != NULL) {
            $regionJuego->idJuego = $request->idJuego;
        }
        if ($request->nombre != NULL) {
            $regionJuego->nombre = $request->nombre;
        }
        if ($request->precio != NULL) {
            $regionJuego->precio = $request->precio;
        }
        if($request->moneda != NULL){
            $regionJuego->moneda = $request->moneda;
        }
        $regionJuego -> save();
        return response()->json($regionJuego);
}

    public function destroy($id)
    {
        // Validación ID
        if(ctype_digit($id) != TRUE){
           return response()->json([
               "msg" => "El id es inválido",
           ],400);
          }
        
         $regionJuego = RegionJuego::find($id);
          //Valida existencia de tupla
          if(($regionJuego == NULL) || ($regionJuego->delete==TRUE)){
           return response()->json([
               "msg" => "El regionJuego no existe",
           ],404);
       }
   
           $regionJuego->delete = TRUE;
           $regionJuego->save();
            return response()->json($regionJuego);
       }    
}
