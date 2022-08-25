@extends("layouts.app")

@section("content")

    <h1> Edit product </h1>
{{--    @dump($product)--}}
    <form  action="{{route("product.update", $product->id)}}" method="POST">
        @csrf
        @method("put")
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text"  name="name"  value="{{$product->name}}" class="form-control"   >
        </div>
        <div class="mb-3">
            <label class="form-label">Product Description</label>
            <input type="text"  name='description' value="{{$product->description}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="number" name="price" value="{{$product->price}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="text" name="image" value="{{$product->image}}" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
