@extends("layouts.app")


@section("content")
<h1> All Book</h1>
{{--        @dump($products)--}}
    <table class="table" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>No of pages</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
    @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->no_of_pages}}</td>

            <td><a href="{{route("books.show", $book->id)}}" class="btn btn-primary"> Book details </a></td>
            <td><a href="{{route("books.edit", $book->id)}}" class="btn btn-warning"> Edit </a></td>
            <td>
                <form action="{{route("books.destroy", $book->id)}}" method="POST">
                    @csrf
                    @method("delete")
                    <input type="submit"  class="btn btn-danger" value="Delete">
                </form>
            </td>


        </tr>

    @endforeach
        </tbody>
    </table>
        <a href="{{route("books.create")}}" class="btn btn-success"> Create new Book  </a>
@endsection
