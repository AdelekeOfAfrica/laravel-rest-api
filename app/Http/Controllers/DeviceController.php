<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Product;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // fetching all the data info 
    
    public function list(){

        return Device::all();
        

    }

    // fetching with a particular params 

    public function para($id=null){
        $para = $id?Device::findOrFail($id):Device::all();
        return $para;
        return ["result"=>"result successfully found "];
    }

    // adding data into the database 

    public function add(Request $request){

        $new = new Device;
        $new->id = $request->id;
        $new->name = $request->name;
        $new->member_id = $request->member_id;
        $check = $new->save();

        if($check){
            return ["result"=>"data successfully saved"];
        }
        else{
            return ["result"=>"data not successfully saved"];
        }



    }
    // update  data into the database 

    public function update(Request $request)
    {
       $up = Device::findorFail($request->id);
       $up->name=$request->name;
       $up->member_id=$request->member_id;
       $result=$up->save();

       if($result){
        return ["result"=>"data successfully updated"];
    }
    else{
        return ["result"=>"data not successfully updated"];
    }
      
    }

    // searching the database by name 

    public function search($name)
    {
        $search = Device::where("name","like","%".$name."%")->get();
        return $search;

    }

    public function delete($id)
    {
        $del=Device::findOrFail($id);
        $result= $del->delete();
        if($result){
            return ["result"=>"data deleted saved"];
        }
        else{
            return ["result"=>"data not deleteed "];
        }
    }

    public function products(Request $request)
    {
       $pro = new Product();
       $pro->name = $request->name;
       $pro->slug = $request->slug;
       $pro->description = $request->description;
       $pro->price= $request->price;
       $result= $pro->save();

       if($result){
        return ["result"=>"data deleted saved"];
    }
    else{
        return ["result"=>"data not deleteed "];
    }


    }

}
