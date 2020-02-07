@extends('Layout.main')

@section('content')
    <div class="container text-center col-lg-3 mt-5">
        <h1>{{$data->name}}</h1>
        <div class="form-group">
            <img src="/images/{{$data->image}}" class="card-img-top img-thumbnail" alt="image" style="width: 100%; height: 20vh;">
            <br>
            <br>
            <h3 class="form-control">Brand: {{$data->brand->name}}</h3>
            <h3 class="form-control">Price: {{$data->price - ($data->price * $data->discount / 100)}}</h3>
            <h3 class="form-control">Stock: {{$data->stock}}</h3>
        </div>
    </div>
    
    <div class="container">
        <div class="pull-left ml-5">
            <h3>Description:</h3>
            <p>{{$data->description}}</p>
        </div>

        <div class="pull-right mr-5">
            <h3>Comments: </h3>
            
            @if (count($comment) <= 0)
                <p>There is no comment for this item</p>
            @else
                @foreach ($comment as $c)
                    <p><strong>{{$c->user->email}}</strong></p>
                    <small>{{$c->date_time}}</small>
                    <p>{{$c->comment}}</p>
                @endforeach
            @endif
        </div>
        
        <br><br><br><br><br><br><br><br>

        <div class="container">
            <form action="/addtocart/{{$data->id}}" method="POST" class="mt-5" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="pull-left">
                    <label for="quantity">Qty:</label>
                    <input type="number" name="quantity" value="0">
                </div>
                <div class="pull-right">
                    <input type="submit" class="btn btn-danger btn-block" name="addtocart" value="Add to Cart">
                </div>

                <div class="clearfix"></div>
            </form>

            <form action="/insertcomment/{{$data->id}}" method="POST" class="mt-5" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="pull-left">
                    <input type="text" class="form-control" name="comment" placeholder="Your comment here">
                </div>
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary btn-block" name="insertcomment" value="Insert Comment">
                </div>
            
                <div class="clearfix"></div>
            </form>
        </div>
    </div>

    @if($errors->any())
        {{implode($errors->all())}}
    @endif
@endsection