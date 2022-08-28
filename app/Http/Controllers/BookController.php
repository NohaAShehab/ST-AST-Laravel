<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Constraint\FileExists;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{

    function __construct(){
//        $this->middleware("auth");  # require login for all functions in this controller
//        $this->middleware("auth")->only(["store", "update", "destroy"]);
        $this->middleware("auth")->except(["create", "view", "index", "edit"]);
        $this->middleware("active")->only("store"); # Yes or no ?


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        return view("books.index", ["books"=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize("create", Book::class);

        $authors = Author::all();
        return view("books.create", ["authors"=>$authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            "title"=>"required|min:5",
            "no_of_pages"=>"min_digits:2"
        ]);
        $inputdata = $request->all();
        $image = $request->file("image");
        dump($image);
        if($image){
            $imagename=implode(".",
                [date('YmdHis'),$inputdata["title"], $image->getClientOriginalExtension()]);
            $dstentaiton_path ="bookimages/";
            $image->move($dstentaiton_path, $imagename);
            $inputdata["image"] = $imagename;
        }


        Book::create($inputdata);
        return to_route("books.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // $book ---> contains the resource I need to show
//        dump($book);

        return  view("books.show", ["book"=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        $authors = Author::all();
        return view("books.edit", ["book"=>$book, "authors"=>$authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        $user= auth()->user();
        if($user->can('update',$book)) {
                $request->validate([
                    "title" => "required|min:5",
                    "no_of_pages" => "min_digits:2"
                ]);
                $inputdata = $request->all();
                if ($request->file("image")) {
                    $this->deleteImage($book);
                    $new_image = $request->file("image"); #contain image object needed to be uploaded
                    ## prepare the image name
                    $imagename = implode(".",
                        [date('YmdHis'), $inputdata["title"], $new_image->getClientOriginalExtension()]);
                    ## prepere the destination I want to move the image to
                    $dstentaiton_path = "bookimages/";
                    $new_image->move($dstentaiton_path, $imagename);
                    $inputdata["image"] = $imagename;
                }

                $book->update($inputdata);
                return to_route("books.show", $book->id);
        }
        return  abort(401);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
//        if (Gate::allows('isAdmin')){
//            dump($book);
//            if(File::exists(public_path("bookimages/$book->image"))){
//                File::delete(public_path("bookimages/$book->image"));
//            }
//        $book->delete();
//        return to_route("books.index");
//        }
////        return "You are not authoried";
//        return abort(401);  # call page ---> status code

        if(Gate::allows("owner", [$book])) {
            if(File::exists(public_path("bookimages/$book->image"))){
                File::delete(public_path("bookimages/$book->image"));
            }
            $book->delete();
            return to_route("books.index");
        }
        return  abort(401);
    }

    private function  deleteImage(Book $book){
        if(File::exists(public_path("bookimages/$book->image"))){
            File::delete(public_path("bookimages/$book->image"));
        }
    }
}
