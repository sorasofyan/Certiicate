<?php

namespace App\Http\Controllers;
use App\Question;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       /* $data = Question::all();
        return response()->json($data);*/

        $datacount = Question::all()->count();
        $datadate = Question::orderBy('created_at', 'DESC')->get();
        $dataname = Question::where('name','=','one')->get();
        
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
        $Question = new Question();
        //On left field name in DB and on right field name in Form/view
        $Question->name = $request->input('name');
        $Question->content = $request->input('content');
        $Question->unit_id = $request->input('unit_id');

        $Question->save();
        
       return response()->json($Question);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Question::find($id);

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
        $data=Question::find($id);
        //On left field name in DB and on right field name in Form/view
        $data->name = $request->input('name');
        $data->content = $request->input('content');
        $data->unit_id = $request->input('unit_id');


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
        
        $data = Question::findOrFail($id);
        $data->delete();
      
        return response("Deleted successfully");
    }

}
