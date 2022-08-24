
@extends("layouts.app")

@section("content")
{{--        @dump($product)--}}
    <h1> Product Info </h1>

        <div class="card" style="width: 18rem;">
            <img src="" class="card-img-top" alt="...">
            <div class="card-body">
                <h2 class="card-title"> {{$product->name}}</h2>
                <p class="card-text">Description: {{$product->description}}</p>
                <p class="card-text">Price: {{$product->price}}</p>
                <p class="card-text">create_at: {{$product->created_at}}</p>
                <p class="card-text">updated_at: {{$product->updated_at}}</p>

                <a href="/products" class="btn btn-primary">Back</a>
            </div>
        </div>

@endsection
