<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::get();
        if($subject->isEmpty()){
            return response()->json([
                'msg' => 'No hay subjects',
            ],204);
        }
        return response($subject, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = new Subject();
        $subject->nombre = $request->nombre;

        $subject->save();
        return response()->json([
            'msg' => 'Se creó un nuevo subject',
            'id' => $subject->id,
        ],202);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        if(empty($subject)){
            return response()->json([
                'msg'=>'No existe ese subject',
            ],204);
        }
        return response($subject);
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
        $subject = Subject::find($id);
        $subject->nombre = $request->nombre;

        $subject->save();
        return response()->json([
            'msg' => 'Se actualizó un nuevo subject',
            'id' => $subject,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
    

        $subject->delete();
        return response()->json([
            'msg' => 'Se borró un subject',
            'id' => $subject->id,
        ],200);
    }
}
