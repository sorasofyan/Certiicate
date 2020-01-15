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
       /* $data = Unit::all();
        return response()->json($data);*/

        $datacount = Unit::all()->count();
        $datadate = Unit::orderBy('created_at', 'DESC')->get();
        $dataname = Unit::where('name','=','aaaa')->get();
        
        return response()->json(['Count'=>$datacount,'orderdby->created_at'=>$datadate,'Name'=>$dataname]);

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

        return response()->json($data);
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
        $data->name = $request->input('name');
        $data->material_id = $request->input('material_id');


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
        $data = Unit::findOrFail($id);
        $data->delete();
        return response("Deleted successfully");
    }
}
