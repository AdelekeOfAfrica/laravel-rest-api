<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    //
    public function getdata()
    {
        return["name"=>"michael","email"=>"askyourself@gmail.com"];
    }
}
