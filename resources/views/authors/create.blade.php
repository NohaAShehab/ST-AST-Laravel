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

    <h1> Add new Author </h1>
    <form  action="{{route("authors.store")}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"  name="name" value="{{old("name")}}"
                   class="form-control" >
        </div>
        <div>
            <label class="form-label">Author Image</label>
            <input type="file" name="image" value="{{old("image")}}"  class="form-control" >
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email"  name="email" value="{{old("email")}}"
                   class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

