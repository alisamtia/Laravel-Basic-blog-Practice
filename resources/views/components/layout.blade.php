@props(['name','SEMsg'=>"false",'meta_description'=>"",'meta_keywords'=>""])
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $meta_description }}" >
    <meta name="keywords" content="{{ $meta_keywords }}">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content='{{ $title=$name==="" ? config("app.siteTitle") ." - ". config("app.siteTagline") : $name." - ".config("app.title") }}' >
    <meta property="og:description" content="{{ $meta_description }}" >
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="icon" type="image/x-icon" href="{{ config('app.siteFavicon') }}">
    
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">

    <style>
        .alert-e {
        padding: 10px;
        background-color: #f44336;
        color: white;
        position:fixed;
        z-index:50;
        bottom: 3px;
        right: 5px;
        border-radious:10px;
        }
        .alert-s {
        padding: 10px;
        background-color: #04AA6D;
        color: white;
        position:fixed;
        z-index:50;
        bottom: 3px;
        right: 5px;
        border-radious:10px;
        }

        .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }

        .closebtn:hover {
        color: black;
        }
    </style>
</head>

<body>







@if($SEMsg==="false")
@if(session('error'))
<div class="alert-e">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Error!</strong> {{session('error')}}
</div>
<script>
setTimeout(function() {
        $('.alert-e').fadeOut('slow');
    }, 3000);
</script>

@endif

@if(session('success'))
<div class="alert-s">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Success!</strong> {{session('success')}}
</div>

<script>
setTimeout(function() {
        $('.alert-s').fadeOut('slow');
    }, 3000);
</script>
@endif
@endif


    <header class="nav-wrap bg-dark fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark px-lg-0">
                <a class="navbar-brand mr-3 swap-link" href="{{route('index')}}">{{config('app.siteTitle')}}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item swap-link"> <a href="{{route('index')}}" class="nav-link">Home</a> </li>
                        <li class="nav-item swap-link"> <a href="#"class="nav-link">About US</a> </li>
                        <li class="nav-item swap-link"> <a href="#" class="nav-link">Contact US</a> </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown megamenu">
                            <a class="nav-link dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><i class="las la-user mr-2" style="font-size:22px;"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                @auth
                                @if(request()->user()->role==="author" || request()->user()->role==="admin")
                                    <a class="dropdown-item font-weight-bold swap-link" href="{{ route('dashboard') }}"><i class="las la-user bg-info-alt p-1 rounded text-info"></i> Dashboard</a>
                                    <a class="dropdown-item swap-link" href="{{ route('posts.index') }}"><i class="las la-sign-out-alt bg-warning-alt text-warning p-1 rounded"></i> All Posts</a>
                                    <a class="dropdown-item swap-link" href="{{ route('posts.create') }}"><i class="las la-cloud-download-alt bg-success-alt text-success p-1 rounded"></i> New Post</a>
                                    <div class="dropdown-divider"></div>
                                @endif
                                <form class="dropdown-item swap-link" action="{{ route('logout') }}" method="POST">@method("DELETE") @csrf<button action="submit" style="background:none;border:none;padding:0px;margin:0px;"><i class="las la-sign-out-alt bg-danger-alt text-danger p-1 rounded"></i> Logout</button></form>
                                @endauth
                                @guest
                                <a class="dropdown-item swap-link" href="{{ route('login.index') }}"><i class="dropdown-icon"></i>Login</a>
                                <a class="dropdown-item swap-link" href="{{ route('register.index') }}"><i class="dropdown-icon"></i>Register</a>
                                @endguest
                            </div>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    {{ $slot }}

    <footer class="section-footer bg-dark position-relative">
        <section class="footer py-5">
            <div class="container">
                <div class="row pb-3">
                    <aside class="col-md-2">
                        <div class="footer-logo">
                            <h4 class="text-white font-weight-bold">{{config('app.siteTitle')}}</h4>
                        </div>
                    </aside>
                    <aside class="col-md">
                        <h6 class="title">Company</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">About us</a></li>
                            <li> <a href="#">Career</a></li>
                            <li> <a href="#">Find a store</a></li>
                            <li> <a href="#">Rules and terms</a></li>
                            <li> <a href="#">Sitemap</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md">
                        <h6 class="title">Help</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">Contact us</a></li>
                            <li> <a href="#">Money refund</a></li>
                            <li> <a href="#">Order status</a></li>
                            <li> <a href="#">Shipping info</a></li>
                            <li> <a href="#">Open dispute</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md">
                        <h6 class="title">Account</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#"> User Login </a></li>
                            <li> <a href="#"> User register </a></li>
                            <li> <a href="#"> Account Setting </a></li>
                            <li> <a href="#"> My Orders </a></li>
                        </ul>
                    </aside>
                    <aside class="col-md">
                        <h6><i class="las la-coffee mr-2"></i>Stay Up-to-Date!</h6>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control bg-dark" placeholder="Subscribe" aria-label="Subscribe.." aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary text-white" type="button" id="button-addon2">@</button>
                            </div>
                        </div>
                    </aside>
                </div>
                <!-- row.// -->
            </div>
            <!-- //container -->
        </section>
        <!-- footer-top.// -->
        <section class="footer-bottom border-top border-dark white pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="pr-2">© {{ now()->format('Y') }} {{config('app.siteTitle')}}</span>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="#" class="mr-2"><img src="{{asset('assets/img/payment/footer-visa.svg')}}" width="42"></a>
                        <a href="#" class="mr-2"><img src="{{asset('assets/img/payment/footer-mastercard.svg')}}" width="42"></a>
                        <a href="#"><img src="{{asset('assets/img/payment/footer-paypal.svg')}}" width="42"></a>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <script src="{{asset('assets/js/main.min.js')}}"></script>

</body>

</html>