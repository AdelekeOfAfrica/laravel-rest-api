<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Itestinterface;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     

     
     protected $test;
     

     public function __construct(Itestinterface $test){
      $this->test=$test;
     }
    public function index()
    {
        //
        //return Product::all();

        $tests = $this->test->all();

        return response()->json([
           'status'=>true,
           'data'=>$tests ,
           'message'=>'query ok',
        ]);
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
        //
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);
        //return Product::create($request->all());
        $this->test->store( $request->all());

        return response()->json([
            'status'=>true,
            'message'=>"info successfully saved to the database",
        ]);
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
        return Product::findOrFail($id);

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
        $test = $this->test->get($id);

        return response()->json([
            'status'=>true,
            'data'=>$test ,
            'message'=>'query ok',
         ]);
     

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id=null, Request $request)
    {
        
        $update = $this->test->update($id,$request->all());
        
        

        return response()->json([
            'status'=>true,
            'data'=>$update,
            'message'=>"data successfully updated"
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->test->delete($id);
        return response()->json([
            'status'=>true,
            'message'=>"data successfully deleted"
        ]);
    }
}
