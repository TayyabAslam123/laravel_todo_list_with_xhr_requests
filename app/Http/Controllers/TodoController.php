<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\todo;

use Redirect,Response;
   

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data=todo::all();
        return view('todos',compact('data'));
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
    //     return response()->json([
    //     'code'=>200, 
    //     'message'=>'todo Created successfully',
    //     'data' => ['name'=>$request['name'],'status'=>$request['status']]
    // ], 200);

        // $var=new todo();
        // $var->name=$request->name;
        // $var->status=$request->status;
        // $todo=$var->save();

        

        // return response()->json([
        //     'status'=>'success', 
        //     'message'=>'new todo Created successfully'
        // ], 200);

        // $todo = todo::updateOrCreate(
           
        //     ['name' => $request['name'], 'status' => $request['status']]
        // );
        // return Response::json($todo);



        $post = todo::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'status' => $request->status
          ]);

  return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $post], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = todo::where('id',$id)->delete();
        return Response::json(
            ['status'=>'success',
              'message'=>'your todo is deleted'
            ]
        );

    }
}
