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
        
        $data = Question::all();
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
        $Question = new Question();
        //On left field name in DB and on right field name in Form/view
        $Question->name = $request->input('name');
        $Question->content = $request->input('content');
        $Question->unit_id = $request->input('unit_id');

        $Question->save();
        
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
        $data=Question::find($id);

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
        $data=Question::find($id);
        //On left field name in DB and on right field name in Form/view
        $Question->name = $request->input('name');
        $Question->content = $request->input('content');
        $Question->unit_id = $request->input('unit_id');


        $Question->save();
        
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
        $data = Question::all();
        return response(['data'=> $data,'message'=>"Deleted successfully"]);
    }

}
