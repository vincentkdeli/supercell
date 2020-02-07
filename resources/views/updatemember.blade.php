@extends('Layout.main')

@section('content')
    <div class="container">
        <form action="/updatemember/{{$data->id}}" method="POST" class="text-center mt-5" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <h1>UPDATE MEMBER</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="name" value={{$data->name}}>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" value={{$data->email}}>
            </div>
            <div class="form-group">
                <input type="file" name="profilepicture" class="form-control">
            </div>
            <div class="form-group">
                <div class="form-radio form-control">
                    <input type="radio" name="gender" value="M">Male
                    <input type="radio" name="gender" value="F">Female
                </div>
            </div>

            <div class="form-date">
                <input type="date" class="form-control" name="dateofbirth" value={{$data->dateofbirth}}>
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="address" value={{$data->address}}>
            </div>
            <div class="form-submit">
                <input type="submit" class="btn btn-primary" name="register" value="Edit Profile">
            </div>
        </form>
    </div>

    @if($errors->any())
        {{implode($errors->all())}}
    @endif
@endsection