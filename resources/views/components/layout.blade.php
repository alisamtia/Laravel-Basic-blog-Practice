@props(["name"])
<!DOCTYPE html>
<html>
<head>
<title>{{$name}}</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<header class="lg:flex border-b lg:py-5 justify-center">
    <div class="flex gap-10 lg:flex-row flex-col lg:w-2/3">
        <div class="flex gap-10 mr-auto mx-auto">
            <a href="/" class="{{Route::is('index') ? 'text-blue-500' : '' }} text-lg my-auto hover:text-blue-500">Home</a>
            <a href="#" class="text-lg my-auto hover:text-blue-500">About</a>
            <a href="#" class="text-lg my-auto hover:text-blue-500">Contact</a>
        </div>
        <img src="/images/logo.png" class="mx-auto" width="140">
        <div class="flex gap-10 lg:ml-auto mx-auto">
            @auth
                <a href="/dashboard" class="{{Route::is('dashboard') ? 'text-blue-500' : '' }} text-lg my-auto hover:text-blue-500">Dashboard</a>
                <form class="my-auto" action="/logout" method="POST">
                @csrf
                <button type="submit" class="text-lg my-auto hover:text-blue-500">Logout</button>
                </form>
            @endauth
            @guest
                <a href="/login" class="{{Route::is('login') ? 'text-blue-500' : '' }} text-lg my-auto hover:text-blue-500">Login</a>
                <a href="/register" class="{{Route::is('register') ? 'text-blue-500' : '' }} text-lg my-auto hover:text-blue-500">Register</a>
            @endguest
        </div>
    </div>
</header>

<body>

@if(session("success"))
    <div class="fixed right-3 bottom-3 text-white py-2 px-5 rounded-xl z-30 bg-green-600">
    {{session("success")}}
    </div>
@endif
@if(session("error"))
    <div class="fixed right-3 bottom-3 text-white py-2 px-5 rounded-xl z-30 bg-red-600">
    {{session("error")}}
    </div>
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