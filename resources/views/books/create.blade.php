@extends("layouts.app")

@section("content")


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1> Add new Book </h1>
    <form  action="{{route("books.store")}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label class="form-label">Book title</label>
            <input type="text"  name="title" value="{{old("title")}}"
                   class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Book Description</label>
            <input type="text"  name='description'  value="{{old("description")}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">No of Page</label>
            <input type="number" name="no_of_pages"  value="{{old("no_of_pages")}}"  class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Summary</label>
            <input type="text"  name='summary'  value="{{old("summary")}}"   class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Book Image</label>
            <input type="file" name="image" value="{{old("image")}}"  class="form-control" >
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="author_id">
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
