@extends('Layout.main')

@section('content')
    <div class="container">
        <form action="/updatephone/{{$phoneData->id}}" method="POST" class="text-center mt-5" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <h1>Update Phone</h1>
            <div class="form-group">
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <td>Brand</td>
                <select name="brand">
                    <option value="">Brand</option>
                    @foreach($brandData as $phoneBrand)
                        <option value="{{$phoneBrand->id}}">{{$phoneBrand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="description" placeholder="Description">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="price" placeholder="Price">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="discount" placeholder="Discount">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="stock"  placeholder="Stock">
            </div>
            <div class="form-submit">
                <input type="submit" class="form-control btn btn-danger" name="insertphone" value="Update Phone">
            </div>
        </form>
    </div>

    @if($errors->any())
        {{implode($errors->all())}}
    @endif
@endsection