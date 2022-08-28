<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthorController;
use App\Mail\ITIMail;

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

## call function userIndex in the usercontroller
use App\Http\Controllers\UserController;
Route::get("/users",[UserController::class, "usersIndex"]);

# userController::class ---> give the route the class scope ---> so
# the route can see all the functions in the class


Route::get("users/{id}",[UserController::class, "show"]);

use App\Http\Controllers\ProductController;
Route::get("/products", [ProductController::class, "index"])->name("products.index");
Route::get("/products/create", [ProductController::class, "create"])->name("products.create");
Route::get('/products/{id}', [ProductController::class, "show"])->name("product.show");
### route method POST
Route::post("/products", [ProductController::class, "store"])->name("products.store");
Route::get("/products/{id}/edit",[ProductController::class, "edit"])->name("product.edit");
Route::put("/products/{id}",[ProductController::class, "update"])->name("product.update");
Route::delete("/products/{id}", [ProductController::class, "destroy"])->name("product.destroy");




Route::resource("books",BookController::class);  # generate all the required routes for crud

Route::resource("images", ImageController::class);


//Route::group(["middleware"=>"auth"], function (){
//    Route::resource("authors", AuthorController::class);
//});
//Route::middleware('auth')->group(function(){
//    Route::resource("authors", AuthorController::class);
//    Route::resource("images", ImageController::class);
//});

//Route::resource("authors", AuthorController::class)->middleware("auth");
Route::resource("images", ImageController::class);
Route::get("/test", function (){
    return "test";
})->middleware("auth");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
    ->middleware("active");

################ Eng. Youssef Ayman suggests
Route::middleware('auth')->group(function () {
    Route::resource('authors', AuthorController::class, ['except' => ['index', 'show']]);
});

Route::resource('authors', AuthorController::class, ['only' => ['index', 'show']]);

Route::get("send-email", function (){
    $details = ["title"=>"This is my first email", "body"=>"Nice to meet you",
        "name"=>"Youssef Ayman"];

    \Illuminate\Support\Facades\Mail::to("nohashehab.iti@gmail.com")->send(new ITIMail($details));

    dump("email sent");
});
