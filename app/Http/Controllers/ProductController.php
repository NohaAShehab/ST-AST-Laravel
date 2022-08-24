<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    ### function index ---> select * from Product
    function  index(){
        $products = Product::all();  # call the model to get the data
//        return $products;
        return view("products.index", ["products"=>$products]);
    }


    # get the data related the objects
    function show($id){
//        $product = Product::find($id);   #
////        return $product;
//        if($product){
//            return view("products.show", ["product"=>$product]);
//        }
//        return  "Not found product, show called ";

        $product = Product::findOrFail($id);
        return view("products.show", ["product"=>$product]);
    }

    function  create(){
        return view("products.create");
    }

    function store(){
//        var_dump($_POST);
        ### you can see the data sent in the post request ---
//        $data = request();
//        dump($data);
        $name = request("name");
//        dump($name);
        $price = request("price");
        $description = request("description");
        $image = request("image");

        $newproduct = new Product();
        $newproduct->name = $name;
        $newproduct->description = $description;
        $newproduct->price = $price;
        $newproduct->image = $image;
        $newproduct->save();
//        return "added";

        return to_route("products.index");
    }
}
