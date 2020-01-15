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
        $datacount = Material::all()->count();
        $datadate = Material::orderBy('created_at', 'DESC')->get();
        $dataname = Material::where('name','=','sxwsdx')->get();
        $dataprice = Material::where('price','=','20')->get();
        return response()->json(['Count'=>$datacount,'orderdby->created_at'=>$datadate,'Name'=>$dataname,'price'=>$dataprice]);

       /* $data = Material::all();
        $datacount=Material::all()->count();
        return response()->json([$data,$datacount]);*/
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
        
       return response()->json($Material);
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
        $data->name = $request->input('name');
        $data->price = $request->input('price');
        $data->certificate_id = $request->input('certificate_id');

        $data->save();
        
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
       // $data = Material::all();
        return response("Deleted successfully");
    }
}
