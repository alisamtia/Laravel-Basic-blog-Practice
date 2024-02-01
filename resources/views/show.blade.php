<x-layout name="{{$post->title}} - Simple Blog Post">
    <img src="{{$post->thumbnail}}" class="rounded-xl" />
    <h1 class="py-4 text-4xl font-bold text-black">{{$post->title}}</h1>
    <div class="mb-5 flex gap-3">
        <a href="{{ route('posts.categoryFilter',$post->category->slug) }}"><p class="text-blue-500 my-auto">{{ ucwords($post->category->name) }}</p></a>
        <div class="flex gap-2">
            <a href="{{ route('posts.authorFilter',$post->author->username) }}">
                <div class="flex gap-2">
                        <img src="{{ $post->author->avatar }}" width="40" class="rounded-3xl">
                        <p class="my-auto">{{ucwords($post->author->username)}}</p>
                </div>
            </a>
            <span class="my-auto text-gray-400 lg:text-sm text-xs">{{$post->created_at->diffForHumans()}}</span>
        </div>
    </div>
    <p class="pb-7">
        {{ $post->body }}
    </p>
    
    




















    <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
  <div class="max-w-6xl mx-auto px-4">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion ({{ count($post->comments) }})</h2>
    </div>
    <form action="{{route('comments.store')}}" method="POST" class="mb-6">
        @csrf
        <input value="{{$post->id}}" name="post_id" type="hidden" />
        <x-form.textarea name="body" rows="5" />
        <div class="mt-4">
            <x-form.btn text="Post comment" />
        </div>
    </form>




@if(count($post->comments))
    @foreach($post->comments as $comment)
        <article class="border-b-2 p-6 text-base bg-white rounded-lg dark:bg-gray-900">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="{{$comment->user->avatar}}"
                            alt="{{$comment->user->username}}">{{ ucwords($comment->user->username) }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                            title="{{$comment->created_at->diffForHumans()}}">{{$comment->created_at->diffForHumans()}}</time></p>
                </div>

                @auth
                    @if($comment->user_id===request()->user()->id)
                    <form action="{{route('comments.destroy',$comment)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button
                            class="text-red-500 flex items-center p-2 text-sm font-medium text-center dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="submit">
                                Remove
                        </button>
                    </form>
                    @endif
                @endauth

            </footer>
            <p class="text-gray-500 dark:text-gray-400">{{ $comment->body }}</p>
        </article>
    @endforeach
@endif

    <!-- <article class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                        class="mr-2 w-6 h-6 rounded-full"
                        src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                        alt="Jese Leos">Jese Leos</p>
                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-12"
                        title="February 12th, 2022">Feb. 12, 2022</time></p>
            </div>
            <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                type="button">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                </svg>
                <span class="sr-only">Comment settings</span>
            </button>
            
            <div id="dropdownComment2"
                class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownMenuIconHorizontalButton">
                    <li>
                        <a href="#"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                    </li>
                </ul>
            </div>
        </footer>
        <p class="text-gray-500 dark:text-gray-400">Much appreciated! Glad you liked it ☺️</p>
        <div class="flex items-center mt-4 space-x-4">
            <button type="button"
                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                </svg>                
                Reply
            </button>
        </div>
    </article> -->
    
</section>







</x-layout>
