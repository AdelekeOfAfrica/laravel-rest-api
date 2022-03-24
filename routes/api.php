<?php

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\dummyAPI;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProductController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// these one is for the new api as at today 
//public routes 
Route::post('/login',[AuthController::class,'login']);
Route::get('/index',[ProductController::class,'index']);
Route::post('/products',[DeviceController::class,'products']);
Route::post('/store',[ProductController::class,'store']);
Route::get('/get/{id}',[ProductController::class,'edit']);
Route::get('/show/{id}',[ProductController::class,'show']);
Route::put('/update/{id}',[ProductController::class,'update']);
Route::delete('/deletes/{id}',[ProductController::class,'destroy']);

Route::post('/register',[AuthController::class,'Register']);

Route::post('/product', function(){
    return Product::create([
        "name"=>"product_two",
        "slug"=>"product_two",
        "description"=>"second product",
        "price"=>"99.99"

    ]);

});
//protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('/show/{id}',[ProductController::class,'show']);
    Route::post('/logout',[AuthController::class,'logout']); 
});
//end 


Route::get("data",[dummyAPI::class,'getdata']);
Route::get("list",[DeviceController::class,'list']);
Route::get("list/{id}",[DeviceController::class,'para']);
Route::post("add",[DeviceController::class,'add']);
Route::put("update",[DeviceController::class,'update']);
Route::get("search/{name}",[DeviceController::class,'search']);
Route::delete("delete/{id}",[DeviceController::class,'delete']);







