@extends('layouts.app')




@section('content')
    <h1> All users </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>ID</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td> {{ $u['name'] }} </td>
                    <td> {{ $u['email'] }} </td>
                    <td> {{ $u['id'] }} </td>
                    <td> <a href="/users/{{$u['id']}}" class="btn btn-primary"> View </a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @endsection

