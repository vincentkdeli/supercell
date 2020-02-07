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
    <div class="container col-lg-4">
        <form action="/login" method="POST" class="text-center mt-5">
            {{ csrf_field() }}
            
            <h1>Login</h1>
            <div class="form-group">
                {{-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> --}}
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                {{-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> --}}
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group form-check">
                {{-- <input type="checkbox" class="form-checl-input" id="exampleCheck1">
                <label for="exampleCheck1" class="form-check-label">Remember Me</label> --}}
                <input type="checkbox" name="remember" value="remember" class="form-check-input"> Remember Me
            </div>
            {{-- <button type="submit" class="btn btn-primary">Log In</button> --}}
            <input type="submit" class="btn btn-primary" name="login" value="Log In">
        </form>
    </div>

    @if($errors->any())
        {{implode($errors->all())}}
    @endif
@endsection