@extends('Layout.main')

@section('navbar')
    <div class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- LEFT HAND SIDE --}}
            <ul class="navbar-nav mr-auto">
                {{-- home logo --}}
                <li class="nav-item active">
                    <a class="navbar-brand" href="/home"><img src="/asset/x.png" width="30" height="30" class="inline-block align-top" alt="ipx"></a>
                </li>
            </ul>            
            
            {{-- RIGHT HAND SIDE --}}
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <span class="nav-link text-light">{{date("D, d M Y")}}</span>
                </li>
                <li class="nav-item active">
                    <a href="/login" class="nav-link text-light">Login</a>
                </li>
                <li class="nav-item active">
                    <a href="/register" class="nav-link text-light">Register</a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <form action="/register" method="POST" class="text-center mt-5" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <h1>Register</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm" placeholder="Re-Type Password">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="profilepicture">
            </div>
            <div class="form-group">
                <div class="form-radio form-control">
                    <input type="radio"name="gender" value="M">Male
                    <input type="radio"name="gender" value="F">Female
                </div>
            </div>
            <div class="form-date">
                <input type="date" class="form-control" name="dateofbirth">
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
            <div class="form-submit">
                <input type="submit" class="btn btn-primary" name="register" value="Register">
            </div>
        </form>
    </div>

    @if($errors->any())
        {{implode($errors->all())}}
    @endif
@endsection