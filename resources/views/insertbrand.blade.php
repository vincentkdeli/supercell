@extends('Layout.main')

@section('content')
    <div class="container col-lg-3">
        <form action="/insertbrand" method="POST" class="text-center mt-5" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <h1>Insert Brand</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Brand">
            </div>
            <div class="form-submit">
                <input type="submit" name="insertbrand" value="Insert Brand" class="btn btn-outline-primary">
            </div>
        </form>
    </div>

    @if($errors->any())
        {{implode($errors->all())}}
    @endif
@endsection