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

    <h1> Add new Image </h1>
    <form  action="{{route("images.store")}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label class="form-label">Image Description</label>
            <input type="text"  name="description" value="{{old("title")}}"
                   class="form-control" >
        </div>
        <div>
            <label class="form-label">Book Image</label>
            <input type="file" name="image" value="{{old("image")}}"  class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

