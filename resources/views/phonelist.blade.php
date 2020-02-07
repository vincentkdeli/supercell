@extends('Layout.main')

@section('content')
    <div class="container text-center col-lg-5">
        <h1>Phone List</h1>

        <form action="/phonelist/search" method="GET" class="form-group">
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
            <div class="card" style="width: 100%">
                <img src="/images/{{$phone->image}}" alt="" class="card-img-top img-thumbnail" style="width: 100%; height: 20vh;">
                <div class="card-body">
                    <h5 class="card-title">{{$phone->name}}</h5>
                    <p class="card-text"><del>Rp. {{$phone->price}},-</del></p>
                    <p class="card-text text-danger">Rp. <strong>{{$phone->price - ($phone->price * $phone->discount / 100)}}</strong>,-</p>
                    <p class="card-text">Discount: {{$phone->discount}} %</p>
                    <a href="/addtocart/{{$phone->id}}" class="btn btn-primary">Buy</a>
                </div>
            </div>
        @endforeach
    </div>
    
    {{$data->links()}}
@endsection