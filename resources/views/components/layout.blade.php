@props(["name"])
<!DOCTYPE html>
<html>
<head>
<title>{{$name}}</title>
@vite('resources/css/app.css')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="icon" type="image/x-icon" href="{{asset('/images/fav.png')}}">
</head>
<header class="lg:flex border-b lg:py-5 justify-center">
    <div class="flex gap-10 lg:flex-row flex-col lg:w-2/3">
        <div class="flex gap-10 mr-auto mx-auto">
            <a href="{{ route('index') }}" class="{{Route::is('index') ? 'text-blue-500' : '' }} text-lg my-auto hover:text-blue-500">Home</a>
            <a href="#" class="text-lg my-auto hover:text-blue-500">About</a>
            <a href="#" class="text-lg my-auto hover:text-blue-500">Contact</a>
        </div>
        <img src="{{asset('/images/logo.png')}}" class="mx-auto" width="140">
        <div class="flex gap-10 lg:ml-auto mx-auto">
            @auth
                <a href="{{route('dashboard')}}" class="{{Route::is('dashboard') ? 'text-blue-500' : '' }} text-lg my-auto hover:text-blue-500">Dashboard</a>
                <form class="my-auto" action="{{route('login.destroy')}}" method="POST">
                @csrf
                <button type="submit" class="text-lg my-auto hover:text-blue-500">Logout</button>
                </form>
            @endauth
            @guest
                <a href="{{route('login.index')}}" class="{{Route::is('login.index') ? 'text-blue-500' : '' }} text-lg my-auto hover:text-blue-500">Login</a>
                <a href="{{route('register.index')}}" class="{{Route::is('register.index') ? 'text-blue-500' : '' }} text-lg my-auto hover:text-blue-500">Register</a>
            @endguest
        </div>
    </div>
</header>

<body>

@if(session("success"))
    <div id="success-msg" class="fixed right-3 bottom-3 text-white py-2 px-5 rounded-xl z-30 bg-green-600">
    {{session("success")}}
    </div>
    <script>
    setTimeout(function() {
        $('#success-msg').fadeOut('slow');
    }, 3000);
    </script>
@endif
@if(session("error"))
    <div id="error-msg" class="fixed right-3 bottom-3 text-white py-2 px-5 rounded-xl z-30 bg-red-600">
    {{session("error")}}
    </div>
    <script>
    setTimeout(function() {
        $('#error-msg').fadeOut('slow');
    }, 3000);
    </script>
@endif

    <div class="justify-center flex">
        <div class="lg:w-3/4 w-96 mt-10">
            {{ $slot }}
        </div>
    </div>
</body>
<footer class="bg-blue-500 py-3">
    <p class="text-white text-center">All right reserved to Simpleblogpost.com</p>
</footer>
</html>
