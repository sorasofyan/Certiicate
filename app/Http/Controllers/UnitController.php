<?php

namespace App\Http\Controllers;
use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Unit::all();
        return response()->json($data);
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
        $Unit = new Unit();
        //On left field name in DB and on right field name in Form/view
        $Unit->name = $request->input('name');
        $Unit->material_id = $request->input('material_id');

        $Unit->save();
        
       return response()->json($Unit);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Unit::find($id);

        return response()->json($Unit);
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
        $data=Unit::find($id);
        //On left field name in DB and on right field name in Form/view
        $Unit->name = $request->input('name');
        $Unit->material_id = $request->input('material_id');


        $Unit->save();
        return response()->json($Unit);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Unit::findOrFail($id);
        $data->delete();
        $data = Unit::all();
        return response(['data'=> $data,'message'=>"Deleted successfully"]);
    }
}
