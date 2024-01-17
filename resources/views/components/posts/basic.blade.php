@props(["type"=>"normal","post"])

<div class="border p-5 rounded-3xl">
    <img src="/storage/{{$post->thumbnail}}" class="rounded-3xl">
    <a href="/?category={{$post->category->id}}"><p class="font-sans mt-2 font-md ml-1 text-blue-500 text-md">{{ ucwords($post->category->name) }}</p></a>
    <a href="/post/{{$post->id}}"><h3 class="{{$type=='featured'?'text-3xl':'lg:text-2xl text-xl'}} mt-2 font-sans m-none font-semibold">{{ $post->title }}</h3></a>
    <div class="{{$type=='normal'?'lg:flex':'flex'}} mt-3 gap-2">
        <a href="/?user={{$post->author->id}}">
            <div class="flex gap-2">
                    <img src="/storage/{{ $post->author->avatar }}" width="40" class="rounded-3xl">
                    <p class="my-auto {{$type=='normal'? 'text-xs lg:text-lg' : 'text-lg'}}">{{ucwords($post->author->username)}}</p>
            </div>
        </a>
            <span class="my-auto text-gray-400 lg:text-sm text-xs">{{$post->created_at->diffForHumans()}}</span>
    </div>
</div>
