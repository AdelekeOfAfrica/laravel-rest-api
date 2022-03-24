<?php

namespace App\Repositories;
use App\Models\Product;


class testinterface  implements Itestinterface
{
 
    public function all(){
        return Product::all();
    } //to get all the details 

    public function get($id){
      return Product::findOrFail($id);
    }
    //getting individual details 

    

    public function store(array $data ){
        return Product::create($data);
    }
    public function update ($id, array $data){
        return Product::findOrFail($id)->update($data);
    }  // updating individual ddetails 

    public function delete($id){
        return Product::destroy($id);
    } 
}