<x-layout name="Simple Blog Post">
@if(isset($cPage))
<div class="text-3xl font-semibold py-7">{{ucwords($cPage)}}</div>
@endif
@if(count($posts)>0)
    <div class="gap-10 grid lg:grid-cols-2 grid-cols-1 gap-4">
        <x-posts.basic type="featured" :post=$posts[0] />
        @if(count($posts)>1)
        <x-posts.basic type="featured" :post=$posts[1] />
        @endif
    </div>
    @if(count($posts)>2)
    <div class="mt-10 mb-10 grid lg:grid-cols-3 grid-cols-2 gap-4">
        @foreach ($posts->skip(2) as $post)
            <x-posts.basic :post=$post />
        @endforeach
    </div>
        <div class="mb-10">{{ $posts->links() }}</div>
    @endif
@endif
</x-layout>
