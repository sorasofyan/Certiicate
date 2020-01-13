<?php

namespace App\Http\Controllers;
use App\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Certificate::all();
        $datacount=Certificate::all()->count();
        $datadate =Certificate::orderBy('created_at', 'DESC')->get();
        $dataname =Certificate::orderBy('name')->get();
        return response()->json([$data, $dataname,$datacount,$datadate]);
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

        $Certificate = new Certificate();
        //On left field name in DB and on right field name in Form/view
        $Certificate->name = $request->input('name');
        $Certificate->price = $request->input('price');
        $Certificate->image = $request->input('image');
        $Certificate->description = $request->input('description');
        
      
        $Certificate->save();
        
       return response()->json($Certificate);
    }

    /**
     *
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Certificate::find($id);

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
        $data=Certificate::find($id);
        $Certificate->name = $request->input('name');
        $Certificate->price = $request->input('price');
        $Certificate->image = $request->input('image');
        $Certificate->description = $request->input('description');
        
        $data->save();  
        return response()->json($Certificate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Certificate::findOrFail($id);
        $data->delete();
        $data = Certificate::all();
        return response(['data'=> $data,'message'=>"Deleted successfully"]);
    }
   
}
