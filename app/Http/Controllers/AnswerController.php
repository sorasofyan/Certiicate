<?php

namespace App\Http\Controllers;
use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*  $data = Answer::all();
        return response()->json($data);*/
        $datacount = Answer::all()->count();
        $datadate = Answer::orderBy('created_at', 'DESC')->get();
        $dataname = Answer::where('content','=','yes')->get();
        
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
        $Answer = new Answer();
        //On left field name in DB and on right field name in Form/view
        $Answer->right = $request->input('right');
        $Answer->content = $request->input('content');
        $Answer->question_id = $request->input('question_id');

        $Answer->save();
        return response()->json($Answer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Answer::find($id);

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
        $data=Answer::find($id);
        //On left field name in DB and on right field name in Form/view
        $data->right = $request->input('right');
        $data->content = $request->input('content');
        $data->question_id = $request->input('question_id');


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
        
        $data = Answer::findOrFail($id);
        $data->delete();
        return response("Deleted successfully");
    }
}
