@extends('Layout.main')

@section('content')
    <div class="container col-lg-3">
        <form action="/updatebrand/{{$data->id}}" method="POST" class="text-center mt-5" enctype="multipart/form-data">
            {{ csrf_field() }}

            <h1>Update Brand</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="name" value={{$data->name}}>
            </div>
            <div class="form-submit">
                <input type="submit" name="insertbrand" value="Update Brand" class="btn btn-outline-primary">
            </div>
        </form>
    </div>

    @if($errors->any())
        {{implode($errors->all())}}
    @endif
@endsection