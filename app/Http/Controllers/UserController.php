<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // by default all functions in the controller have public access modifier

    # variables
    public  $allusers = [
            ["name"=>"Ahmed", "email"=>"ahmed@gmail.com", "id"=>1, "image"=>"pic2.jpg"],
            ["name"=>"Ali", "email"=>"ali@gmail.com", "id"=>2,  "image"=>"pic3.jpeg"],
            ["name"=>"Mohmaed", "email"=>"mohamed@gmail.com", "id"=>3, "image"=>"pic4.jpg"],
        ];
    ## functions
     function usersIndex (){

        return view("users", ["users"=>$this->allusers]);
    }

    ## to display the user info details
    function show ($id){
        # check if the id in the $this->users

        foreach ($this->allusers as $user){
            if($user["id"]==$id){
//                return $user;
                return  view("show", ["userinfo"=>$user]);
            }
        }
        return "not found";
    }
}
