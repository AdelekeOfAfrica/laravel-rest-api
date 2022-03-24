<?php

namespace App\Repositories;




interface Itestinterface{

    public function all(); //to get all the details 

    public function get($id); //getting individual details 

    public function store(array $data);// storing of data into the database where $data represent request 

    public function update ($id, array $data); // updating individual ddetails 

    public function delete($id);

}