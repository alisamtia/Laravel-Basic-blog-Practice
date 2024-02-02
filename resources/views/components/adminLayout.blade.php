@props(['name','path','padding'=>'3'])
<x-layout name="{{$name}}" SEMsg="admin-panel">
<main role="main">
        <div class="wrapper">

            <div class="breadcrumb-wrap">
                <div class="container py-3">
                    <div class="row d-flex justify-content-md-between justify-content-sm-center">
                        <div class="">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item ml-1 font-weight-bold active" aria-current="page">
                                        {{ $path }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <aside class="col-lg-3 pt-4 pt-lg-0">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card mb-4">
                                    <div class="card-body px-3 py-2">
                                        <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
                                            <img src="{{asset(request()->user()->avatar)}}" class="img-lg rounded-circle" alt="profile image">
                                            <div class="ml-sm-3 ml-md-0 ml-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
                                                <h6 class="mb-0">{{ucwords(request()->user()->username)}}</h6>
                                                <p class="text-muted mb-1" style="font-size:13px !important;">{{request()->user()->email}}</p>
                                                <p class="mb-0 text-primary font-weight-bold small">{{ucwords(request()->user()->role)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <ul class="nav flex-column dash-nav">
                                <li class="nav-item">
                                    <a class="nav-link active d-flex justify-content-between align-items-center" aria-current="page" href="{{ route('dashboard') }}">
                                        <div style="{{ Route::is('dashboard') ? 'color:#319795' : ''}}"><i class="las la-arrow-right"></i>Dashboard</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active d-flex justify-content-between align-items-center" aria-current="page" href="{{route('posts.index')}}">
                                        <div style="{{ Route::is('posts.index') ? 'color:#319795' : ''}}"><i class="las la-file"></i>Posts</div>
                                        <div class="d-flex  align-items-center">

                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active d-flex justify-content-between align-items-center" aria-current="page" href="{{route('posts.create')}}">
                                        <div style="{{ Route::is('posts.create') ? 'color:#319795' : ''}}"><i class="las la-plus"></i>Add Post</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active d-flex justify-content-between align-items-center" aria-current="page" href="{{route('comments.index')}}">
                                        <div style="{{ Route::is('comments.index') ? 'color:#319795' : ''}}"><i class="las la-comments"></i>All Comments</div>
                                        <div class="d-flex  align-items-center">
                                        </div>
                                    </a>
                                <li class="nav-item">
                                    <a class="nav-link active d-flex justify-content-between align-items-center" aria-current="page" href="{{route('categories.index')}}">
                                        <div style="{{ Route::is('categories.index') ? 'color:#319795' : ''}}"><i class="las la-box"></i>Categories</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active d-flex justify-content-between align-items-center" aria-current="page" href="{{route('users.index')}}">
                                        <div style="{{ Route::is('users.index') ? 'color:#319795' : ''}}"><i class="las la-users"></i>All Users</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active d-flex justify-content-between align-items-center text-danger" aria-current="page" href="#">
                                        <form action="{{ route('logout') }}" method="POST">@method("DELETE") @csrf<div class="flex"><button type="submit" style="background:none;border:none;padding:0px;margin:0px;font-weight:700;color:red;"><i class="las la-sign-out-alt"></i>Logout</button></div></form>
                                    </a>
                                </li>
                            </ul>

                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center mt-lg-6 mt-sm-3 mb-1 text-muted">
                                <span>Help center</span>
                                <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="8" x2="12" y2="16"></line>
                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                    </svg>
                                </a>
                            </h6>
                            <ul class="nav flex-column dash-nav">

                                <li class="nav-item">
                                    <a class="nav-link active d-flex justify-content-between align-items-center text-small" aria-current="page" href="#">
                                        Faq
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active d-flex justify-content-between align-items-center text-small" aria-current="page" href="#">
                                        Support
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active d-flex justify-content-between align-items-center text-small" aria-current="page" href="#">
                                        Contact
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </aside>
                    <div class="col-lg-9 border pt-4 p-{{$padding}}">







                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{session('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <script>
                            let alertElement = document.querySelector('.alert-danger');
                            alertElement.style.transition = 'opacity 1s';

                            setTimeout(function() {
                                alertElement.style.opacity = '0';
                                alertElement.style.display = 'none';
                            }, 5000);
                        </script>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{session('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <script>
                            let alertElement = document.querySelector('.alert-success');
                            alertElement.style.transition = 'opacity 1s';

                            setTimeout(function() {
                                alertElement.style.opacity = '0';
                                alertElement.style.display = 'none';
                            }, 5000);
                        </script>
                    @endif









                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
