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
    <div class="mt-10 mb-10 grid lg:grid-cols-3 grid-cols-2 gap-4">
    @if(count($posts)>2)
        @foreach ($posts->skip(2) as $post)
            <x-posts.basic :post=$post />
        @endforeach
        {{ $posts->links() }}
    @endif
    </div>
@endif
</x-layout>
