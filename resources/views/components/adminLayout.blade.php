@props(['name'])
<x-layout name="{{$name}} - Simple Blog Post">
<div class="lg:flex lg:flex-row flex flex-col gap-10 mb-10">
    <div class="border lg:w-1/4 gap-1 p-10 flex flex-col justify-center rounded-xl">
        <a href="/dashboard" class="{{Route::is('dashboard') ? 'text-blue-500' : 'hover:text-blue-500'}} text-lg">Dashboard</a>
        <a href="/dashboard/posts" class="{{Route::is('posts') ? 'text-blue-500' : 'hover:text-blue-500'}} text-lg">All Posts</a>
        <a href="/dashboard/post/new" class="{{Route::is('new-post') ? 'text-blue-500' : 'hover:text-blue-500'}} text-lg">New Post</a>
        <a href="/dashboard/categories" class="{{Route::is('categories') ? 'text-blue-500' : 'hover:text-blue-500'}} text-lg">All Category</a>
        <a href="/dashboard/category/new" class="{{Route::is('new-category') ? 'text-blue-500' : 'hover:text-blue-500'}} text-lg">New Category</a>
    </div>

    <div class="lg:w-3/4 border rounded-2xl p-10">
        <div class="flex">
            <h1 class="mb-4 text-2xl font-bold">{{$name}}</h1>
            <div class="flex ml-auto gap-1">
                <a href="/dashboard/post/new"><button class="text-white bg-blue-500 pt-1 pb-1 pl-5 pr-5">New Post</button></a>
                <a href="/dashboard/category/new"><button class="text-white bg-blue-500 pt-1 pb-1 pl-5 pr-5">New Category</button></a>
            </div>
        </div>
        {{ $slot }}
    </div>
</div>
</x-layout>
