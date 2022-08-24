@extends("layouts.app")


@section("content")

        @dump($products)
    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>
    @foreach($products as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->price}}</td>
{{--            <td><a href="/products/{{$p->id}}" class="btn btn-primary"> Show </a></td>--}}
            <td><a href="{{route("product.show",$p->id)}}" class="btn btn-primary"> Product details </a></td>

        </tr>

    @endforeach
        </tbody>
    </table>
        <a href="{{route("products.create")}}" class="btn btn-success"> Create new product  </a>
@endsection
