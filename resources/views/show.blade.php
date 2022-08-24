@extends("layouts.app")


@section("content")
    <h1> User info</h1>

{{--    @dump($userinfo)--}}

    <div class="card" style="width: 18rem;">
        <img src="{{asset('usersimages/images/'.$userinfo["image"])}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Name: {{$userinfo["name"]}}</h5>
            <p class="card-text">ID: {{$userinfo["id"]}}</p>
            <p class="card-text">Email: {{$userinfo["email"]}}</p>
            <a href="/users" class="btn btn-primary">Back</a>
        </div>
    </div>

@endsection
