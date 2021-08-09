<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');


    return Cache::get('key');


});

Route::get("/foor",function(){

   return "hello world";

});

Route::get("/user","User\UserController@index");
Route::get("/jugg","User\UserController@jugg");

Route::match(["get","Post"],"res","User\UserController@index");

Route::get('/routename',function(){

    return "name";

})->name('rname');

Route::prefix('admin')->group(function(){

   Route::get("user",function(){

      return 1;
   });

   Route::get("dash",function(){

      return 2;

   });

});

Route::get("getpara/{id?}",function($id=1){

    return $id;

});

Route::get('testinput','User\UserController@testinput');




