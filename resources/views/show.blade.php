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
    @auth
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
    @endauth

    @guest
        <h4 class="text-xl font-bold">Register or Login to Participate in the Comments</h4>
    @endguest

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
                        @if(request()->user()->role==="admin")
                        <div class="flex">
                            <a href="{{route('comments.edit',$comment)}}" class="text-blue-500 flex items-center p-2 text-sm font-medium text-center dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600">Edit</a>
                            <form action="{{route('comments.destroy',$comment)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="text-red-500 flex items-center p-2 text-sm font-medium text-center dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="submit">Remove</button>
                            </form>
                        </div>
                        @elseif($comment->user_id===request()->user()->id)
                            <form action="{{route('comments.destroy',$comment)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="text-red-500 flex items-center p-2 text-sm font-medium text-center dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="submit">Remove</button>
                            </form>
                        @endif
                    @endauth
                </footer>
                <p class="text-gray-500 dark:text-gray-400">{{ $comment->body }}</p>
            </article>
        @endforeach
    @endif
    
</section>
</x-layout>
