@extends('Layout.main')

@section('content')
    <div class="container">
        <form action="/insertmember" method="POST" class="text-center mt-5" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <h1>Insert member</h1>
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
                    <input type="radio" name="gender" value="M">Male
                    <input type="radio" name="gender" value="F">Female
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