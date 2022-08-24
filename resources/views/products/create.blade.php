@extends("layouts.app")

@section("content")

    <h1> Add new product </h1>
    <form  action="{{route("products.store")}}" method="POST">

        @csrf
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text"  name="name" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Product Description</label>
            <input type="text"  name='description' class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="number" name="price" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="text" name="image" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
