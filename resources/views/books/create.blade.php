@extends("layouts.app")

@section("content")

    <h1> Add new Book </h1>
    <form  action="{{route("books.store")}}" method="POST">

        @csrf
        <div class="mb-3">
            <label class="form-label">Book title</label>
            <input type="text"  name="title" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Book Description</label>
            <input type="text"  name='description' class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">No of Page</label>
            <input type="number" name="no_of_pages" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Summary</label>
            <input type="text"  name='summary' class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Book Image</label>
            <input type="text" name="image" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
