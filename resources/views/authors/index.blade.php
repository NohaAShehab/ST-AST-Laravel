@extends("layouts.app")


@section("content")
    <h1> All Products</h1>
    {{--        @dump($products)--}}
    <table class="table" >
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{$author->id}}</td>
                <td>{{$author->name}}</td>
                <td>{{$author->email}}</td>
                <td><a href="{{route("authors.show", $author->id)}}" class="btn btn-primary"> Author details </a></td>

            </tr>

        @endforeach
        </tbody>
    </table>
    <a href="{{route("authors.create")}}" class="btn btn-success"> Create new Author  </a>
@endsection
