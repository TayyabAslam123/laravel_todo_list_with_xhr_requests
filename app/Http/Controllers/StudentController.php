<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Student;
use Exception;
use Redirect,Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Student::all();
        // return $data;
        return view('student',compact('data'));
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
    
  
     //validation on email
     $validator = Validator::make($request->all(), [
        'name' => 'required',
        'roll_no'=>'required'
         ]);
  
      if ($validator->fails()) {
               return response(['code'=>500,'content'=>$validator->errors()->first()],500);
       }

try{
        $v=new Student();
        $v->name=$request->name;
        $v->roll_no=$request->roll_no;
        $v->save();
    return response()->json(['code'=>200, 'message'=>'Student Created successfully','data' => $v], 200);

}catch(Exception $e)
  
{
    return response()->json(['code'=>500,'content'=>$e->getMessage()],500);
  
}


//         try{
//         $post = Student::updateOrCreate(
//             ['id' => $request->id], 
//             [
//             'name' => $request->name,
//             'roll_no' => $request->roll_no
//           ]
//         );

//         return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $post], 200);


// }catch(\Exception $e)
  
// {
//     return Response::json(['title'=>'Unable to Enroll Student','content'=>$e->getMessage()]);
  
// }
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
        
        $user = Student::where('id',$id)->delete();

        return Response::json(
            ['status'=>'success',
              'message'=>'your todo is deleted'
            ]
        );
    }
}
