<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes or URLS
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {  // http://127.0.0.1:8000 ((localhost ))
    return view('welcome');
});


// Route::get("/iti", function(){
//     return "iti";

// });


Route::get("/iti", function(){
    return " <h1 style='color:red'> iti </h1>";

});

Route::get("/laravel", function(){
    return view("laravel");
});

# /home/username

Route::get("/home/{username}", function($username){

    return "<h1> Username: {$username} </h1>";
});

Route::get("/homepage/{user}",static function($user){

    # data sent to the views must in form of associative array

    $info = ["name"=>"noha", "dept"=>"opensource"];
    $data  =["myuser"=>$user, "info"=>$info, "num"=>10];
    return view("homepage", $data);
});

Route::get("/users", static function(){

    $allusers = [
        ["name"=>"Ahmed", "email"=>"ahmed@gmail.com", "id"=>1],
        ["name"=>"Ali", "email"=>"ali@gmail.com", "id"=>2],
        ["name"=>"Mohmaed", "email"=>"mohamed@gmail.com", "id"=>3],

    ];

    return view("users", ["users"=>$allusers]);
});












