<x-layout name="{{$post->title}} - Simple Blog Post">
    <img src="/storage/{{$post->thumbnail}}" class="rounded-xl" />
    <h1 class="py-4 text-4xl font-bold text-black">{{$post->title}}</h1>
    <div class="mb-5 flex gap-3">
        <a href="/?category={{$post->category->id}}"><p class="text-blue-500 my-auto">{{ ucwords($post->category->name) }}</p></a>
        <div class="flex gap-2">
            <a href="/?user={{$post->author->id}}">
                <div class="flex gap-2">
                        <img src="/storage/{{ $post->author->avatar }}" width="40" class="rounded-3xl">
                        <p class="my-auto">{{ucwords($post->author->username)}}</p>
                </div>
            </a>
            <span class="my-auto text-gray-400 lg:text-sm text-xs">{{$post->created_at->diffForHumans()}}</span>
        </div>
    </div>
    <p class="pb-7">
        {{ $post->body }}
    </p>
</x-layout>
