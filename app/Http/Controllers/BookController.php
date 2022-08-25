<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
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
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // when I use the resource controller this will provide $request object --> represent the content
        // in the request() ---> function
//        dump($request);
////        dump("===============================");
////        dump(request());
//        $title = $request["title"];
//        dump($title);
        dump($request->all());
        $request->validate([
            "title"=>"required|min:5",
            "no_of_pages"=>"min_digits:2"
        ]);
        Book::create($request->all());
//        return  "added";
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
        return view("books.edit", ["book"=>$book]);
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
        $request->validate([
            "title"=>"required|min:5",
            "no_of_pages"=>"min_digits:2"
        ]);

        $book->update($request->all());
        return  to_route("books.show", $book->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return to_route("books.index");
    }
}
