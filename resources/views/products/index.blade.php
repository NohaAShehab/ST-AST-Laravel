@extends("layouts.app")


@section("content")
<h1> All Products</h1>
{{--        @dump($products)--}}
    <table class="table" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
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
            <td><a href="{{route("product.edit",$p->id)}}" class="btn btn-warning"> Edit </a></td>
{{--            <td><a href="" class="btn btn-danger"> Delete</a></td>--}}
            <td>
                <form action="{{route("product.destroy", $p->id)}}" method="POST">
                    @csrf
                    @method("delete")
                    <input type="submit"  class="btn btn-danger" value="Delete">
                </form>
            </td>


        </tr>

    @endforeach
        </tbody>
    </table>
        <a href="{{route("products.create")}}" class="btn btn-success"> Create new product  </a>
@endsection
