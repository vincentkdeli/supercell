@extends('Layout.main')

@section('content')
    <br>
    <div class="container">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Member Name</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td><a href="/updatemember/{{$user->id}}" class="btn btn-primary">Update</a></td>
                        <td><a href="/deletemember/{{$user->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection