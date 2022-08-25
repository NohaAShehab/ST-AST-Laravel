
@extends("layouts.app")

@section("content")
    <h1> {{$book->title}} Info </h1>

        <div class="card" style="width: 50%; margin:auto;">
            <img src="{{asset("bookimages/".$book->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h2 class="card-title"> {{$book->title}}</h2>
                <p class="card-text">Description: {{$book->description}}</p>
                <p class="card-text">No of pages: {{$book->no_of_pages}}</p>
                <p class="card-text">Summary: {{$book->summary}}</p>
                <p class="card-text">Created_at: {{$book->created_at}}</p>
                <p class="card-text">Updated_at: {{$book->updated_at}}</p>

                <a href="{{route("books.index")}}" class="btn btn-primary">Back to all books</a>
            </div>
        </div>

@endsection
