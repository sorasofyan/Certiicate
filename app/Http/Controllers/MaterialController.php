<?php

namespace App\Http\Controllers;
use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data = Material::all();
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
         
        $Material = new Material();
        //On left field name in DB and on right field name in Form/view
        $Material->name = $request->input('name');
        $Material->price = $request->input('price');
        $Material->certificate_id = $request->input('certificate_id');

        $Material->save();
        
       return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Material::find($id);

        return response()->json($data);
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
          
        $data=Material::find($id);
        //On left field name in DB and on right field name in Form/view
        $Material->name = $request->input('name');
        $Material->price = $request->input('price');
        $Material->certificate_id = $request->input('certificate_id');

        $Material->save();
        
       return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Material::findOrFail($id);
        $data->delete();
        $data = Material::all();
        return response(['data'=> $data,'message'=>"Deleted successfully"]);
    }
}
