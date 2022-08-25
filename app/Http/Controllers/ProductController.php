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
        $name = request("name");
        $price = request("price");
        $description = request("description");
        $image = request("image");

        $newproduct = new Product();
        $newproduct->name = $name;
        $newproduct->description = $description;
        $newproduct->price = $price;
        $newproduct->image = $image;
        $newproduct->save();
        return to_route("products.index");
    }

    function  edit($id){
        $product = Product::findOrFail($id);
        # return view(viewname) ---> from views folder in the resources
        return view("products.edit", ["product"=>$product]);
    }

    function update($id){
        $product = Product::findOrFail($id);
        ## get the data from the request
//        dump(request());

        $name = request("name");
        $price = request("price");
        $description = request("description");
        $image = request("image");
        ################# update
        $product->name=  $name;
        $product->price = $price;
        $product->description = $description;
        $product->image = $image;
        $product->save();

        # return to_route(routename)===> name of the route in web.php
        return to_route("product.show", $product->id);
    }

    function destroy($id){
        $product= Product::findOrFail($id);
        $product->delete();
        return to_route("products.index");
    }
}
