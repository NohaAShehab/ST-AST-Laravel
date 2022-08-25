@extends("layouts.app")

@section("content")
{{--    {{$book}}--}}
    <h1> Edit Book: {{$book->title}} </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form  action="{{route("books.update", $book->id)}}"
           method="POST" enctype="multipart/form-data">

        @csrf
        @method("put")
        <div class="mb-3">
            <label class="form-label">Book title</label>
            <input type="text" value="{{$book->title}}"  name="title" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Book Description</label>
            <input type="text"  name='description'   value="{{$book->description}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">No of Page</label>
            <input type="number" name="no_of_pages" value="{{$book->no_of_pages}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Summary</label>
            <input type="text"  name='summary' value="{{$book->summary}}"  class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Book Image</label>
            <input type="file" name="image" value="{{$book->image}}" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
