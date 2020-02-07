@extends('Layout.main')

@section('content')
    <br>
    <div class="container">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $brand)
                    <tr>
                        <th scope="row">{{$brand->id}}</th>
                        <td>{{$brand->name}}</td>
                        <td><a href="/updatebrand/{{$brand->id}}" class="btn btn-primary">Update</a></td>
                        <td><a href="/deletebrand/{{$brand->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection