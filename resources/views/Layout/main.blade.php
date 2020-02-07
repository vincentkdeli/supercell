<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>superceLL</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    
    @section('navbar')
        {{-- NAVBAR FOR ADMIN --}}
        @if(Auth::user() != null && Auth::user()->role == "admin")
            <div class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="collapse navbar-collapse" id="navbarNav">

                    {{-- LEFT HAND SIDE --}}
                    <ul class="navbar-nav mr-auto">
                        {{-- home logo --}}
                        <li class="nav-item active">
                            <a class="navbar-brand" href="/home"><img src="/asset/x.png" width="30" height="30" class="inline-block align-top" alt="ipx"></a>
                        </li>
                        {{-- phones menu --}}
                        <li class="nav-item dropdown active">
                            <a href="#" class="nav-link dropdown-toggle text-light" id="navDropPhone" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Phones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navDropPhone">
                                <a href="/insertphone" class="dropdown-item">Insert Phone</a>
                                <div class="dropdown-divider"></div>
                                <a href="/managephone" class="dropdown-item">Manage Phones</a>
                            </div>
                        </li>
                        {{-- brands menu --}}
                        <li class="nav-item dropdown active">
                            <a href="#" class="nav-link dropdown-toggle text-light" id="navDropBrand" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Brand
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navDropBrand">
                                <a href="/insertbrand" class="dropdown-item">Insert Brand</a>
                                <div class="dropdown-divider"></div>
                                <a href="/managebrand" class="dropdown-item">Manage Brands</a>
                            </div>
                        </li>
                        {{-- Member menu --}}
                        <li class="nav-item dropdown active">
                            <a href="#" class="nav-link dropdown-toggle text-light" id="navDropMember" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Member
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navDropMember">
                                <a href="/insertmember" class="dropdown-item">Insert Member</a>
                                <div class="dropdown-divider"></div>
                                <a href="/managemember" class="dropdown-item">Manage Members</a>
                            </div>
                        </li>
                        {{-- Transaction List --}}
                        <li class="nav-item active">
                            <a href="/transactionlist" class="nav-link text-light">Transaction List</a>
                        </li>
                    </ul>            
                    
                    {{-- RIGHT HAND SIDE --}}
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <span class="nav-link text-light">{{date("D, d M Y")}}</span>
                        </li>
                        <li class="nav-item active">
                            <span class="nav-link text-light">Hi, admin</span>
                        </li>
                        <li class="nav-item active">
                            <a href="/logout" class="nav-link text-light">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        {{-- NAVBAR FOR USER --}}
        @elseif(Auth::user() != null && Auth::user()->role == "user")
            <div class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="collapse navbar-collapse" id="navbarNav">

                    {{-- LEFT HAND SIDE --}}
                    <ul class="navbar-nav mr-auto">
                        {{-- home logo --}}
                        <li class="nav-item active">
                            <a class="navbar-brand" href="/home"><img src="/asset/x.png" width="30" height="30" class="inline-block align-top" alt="ipx"></a>
                        </li>
                        {{-- update profile menu --}}
                        <li class="nav-item active">
                            <a href="/updateprofile" class="nav-link text-light">Update Profile</a>
                        </li>
                        {{-- phone list menu --}}
                        <li class="nav-item active">
                            <a href="/phonelist" class="nav-link text-light">Phone List</a>
                        </li>
                        {{-- cart menu --}}
                        <li class="nav-item active">
                            <a href="/cart" class="nav-link text-light"><i class="fa fa-cart-plus"></i> Cart</a>
                        </li>
                        {{-- transaction history menu --}}
                        <li class="nav-item active">
                            <a href="/transactionhistory" class="nav-link text-light">Transaction History</a>
                        </li>
                    </ul>            
                    
                    {{-- RIGHT HAND SIDE --}}
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <span class="nav-link text-light">{{date("D, d M Y")}}</span>
                        </li>
                        <li class="nav-item active">
                            <span class="nav-link text-light">Hi, {{Auth::user()->name}}</span>
                        </li>
                        <li class="nav-item active">
                            <a href="/logout" class="nav-link text-light">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        {{-- NAVBAR FOR GUEST --}}
        @else
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
        @endif
    @show
    
    @yield('content')

    @section('footer')
        <footer class="page-footer font-small special-color-dark bg-danger fixed-bottom">
            {{-- <div class="container">
                <ul class="list-unstyled list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com" class="btn-floating btn-fb mx-1">
                            <i class="fa fa-facebook text-light"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://twitter.com" class="btn-floating btn-tw mx-1">
                            <i class="fa fa-twitter text-light"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://plus.google.com" class="btn-floating btn-gplus mx-1">
                            <i class="fa fa-google-plus text-light"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com" class="btn-floating btn-gh mx-1">
                            <i class="fa fa-github text-light"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com" class="btn-floating btn-ig mx-1">
                            <i class="fa fa-instagram text-light"></i>
                        </a>
                    </li>
                </ul>
            </div> --}}
            <div class="footer-copyright text-center py-3 text-light">
                superceLL &copy; 2018 | your daily dose | follow us | 
                <a href="https://www.facebook.com" class="btn-floating btn-fb mx-1"><i class="fa fa-facebook text-light"></i></a>
                <a href="https://twitter.com" class="btn-floating btn-tw mx-1"><i class="fa fa-twitter text-light"></i></a>
                <a href="https://plus.google.com" class="btn-floating btn-gplus mx-1"><i class="fa fa-google-plus text-light"></i></a>
                <a href="https://github.com" class="btn-floating btn-gh mx-1"><i class="fa fa-github text-light"></i></a>
                <a href="https://www.instagram.com" class="btn-floating btn-ig mx-1"><i class="fa fa-instagram text-light"></i></a>
            </div>
        </footer>
    @show

</body>
</html>