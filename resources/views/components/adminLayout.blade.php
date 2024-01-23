@props(['name'])
<x-layout name="{{$name}} - Simple Blog Post">
<div class="lg:flex lg:flex-row flex flex-col gap-10 mb-10">
    <div class="border lg:w-1/4 gap-1 p-10 flex flex-col justify-center rounded-xl">
        <a href="{{route('dashboard')}}" class="{{ Route::is('dashboard') ? 'text-blue-500' : 'hover:text-blue-500'}} text-lg">Dashboard</a>
        <a href="{{route('posts.index')}}" class="{{ Route::is('posts.index') ? 'text-blue-500' : 'hover:text-blue-500'}} text-lg">All Posts</a>
        <a href="{{route('posts.create')}}" class="{{ Route::is('posts.create') ? 'text-blue-500' : 'hover:text-blue-500'}} text-lg">New Post</a>
        <a href="{{route('categories.index')}}" class="{{ Route::is('categories.index') ? 'text-blue-500' : 'hover:text-blue-500'}} text-lg">All Category</a>
        <a href="{{route('categories.create')}}" class="{{ Route::is('categories.create') ? 'text-blue-500' : 'hover:text-blue-500'}} text-lg">New Category</a>
    </div>

    <div class="lg:w-3/4 border rounded-2xl p-10">
        <div class="flex">
            <h1 class="mb-4 text-2xl font-bold">{{$name}}</h1>
            <div class="flex ml-auto gap-1">
                <a href="{{route('posts.create')}}"><button class="text-white bg-blue-500 pt-1 pb-1 pl-5 pr-5">New Post</button></a>
                <a href="{{route('categories.create')}}"><button class="text-white bg-blue-500 pt-1 pb-1 pl-5 pr-5">New Category</button></a>
            </div>
        </div>
        {{ $slot }}
    </div>
</div>
</x-layout>
