<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Product::all();
        return view('product',compact('data'));
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
      
        return $request;
        try{
            // $v=new Product();
            // $v->name=$request->name;
            // $v->price=$request->price;
            // $v->save();
            $v = Product::updateOrCreate(['id' => $request->id], [
                'name' => $request->name,
                'price' => $request->price
              ]);


        return response()->json(['code'=>200, 'message'=>'Product Created successfully','data' => $v], 200);
    
    }catch(Exception $e)
      
    {
        return response()->json(['code'=>500,'content'=>$e->getMessage()],500);
      
    }
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
         
        $user = Product::where('id',$id)->delete();

        return response()->json(
            ['status'=>'success',
              'message'=>'your product is deleted'
            ]
        );
    }
}
