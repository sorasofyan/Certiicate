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
       // $data = Certificate::all();
        $datacount= Certificate::all()->count();
        $datadate = Certificate::orderBy('created_at', 'DESC')->get();
        $dataname = Certificate::where('name','=','aaa')->get();
        $dataprice = Certificate::where('price','=','0')->get();
        return response()->json(['Count'=>$datacount,'orderdby->created_at'=>$datadate,'Name'=>$dataname,'price'=>$dataprice]);

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return Certificate::find($id);
        $data=Certificate::find($id);
        $data->name = $request->input('name');
        $data->price = $request->input('price');
        $data->image = $request->input('image');
        $data->description = $request->input('description');
        
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
        $data = Certificate::findOrFail($id);
        $data->delete();
        //$data = Certificate::all();
       // return response(['data'=> $data,'message'=>"Deleted successfully"]);
        return response("Deleted successfully");
    }
   
}
