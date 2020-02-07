@extends('Layout.main')

@section('content')
    <div class="container text-center col-lg-5">
        <h1>Manage Phone</h1>

        <form action="/managephone/search" method="GET" class="form-group">
            <input type="phoneSearch" name="keyword" aria-label="Search" placeholder="Search by name or brand" class="form-control active mr-sm-2">
            <input type="submit" class="form-control btn btn-outline-info" value="Search">
            <select name="searchType">
                <option value="phoneName">Name</option>
                <option value="phoneBrand">Brand</option>
            </select>
        </form>
    </div>
    <div class="card-deck">
        @foreach ($data as $phone)
            <div class="card" style="width: 18rem">
                <img src="/images/{{$phone->image}}" alt="" class="card-img-top img-thumbnail" style="width: 100%; height: 20vh;">
                <div class="card-body">
                    <h5 class="card-title">{{$phone->name}}</h5>
                    <a href="/updatephone/{{$phone->id}}" class="btn btn-primary">Update</a>
                    <a href="/deletephone/{{$phone->id}}" class="btn btn-danger">Delete</a>
                </div>
            </div>    
        @endforeach
    </div>
    
    {{$data->links()}}
@endsection