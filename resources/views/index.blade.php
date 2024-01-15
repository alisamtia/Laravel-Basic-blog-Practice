<x-layout name="Simple Blog Post">
    <div class="gap-10 grid lg:grid-cols-2 grid-cols-1 gap-4">
        <x-posts.basic type="featured" :post=$posts[0] />
        <x-posts.basic type="featured" :post=$posts[1] />
    </div>
    <div class="mt-10 mb-10 grid lg:grid-cols-3 grid-cols-2 gap-4">
        @foreach ($posts->skip(1) as $post)
            <x-posts.basic :post=$post />
        @endforeach
        {{ $posts->links() }}
    </div>
</x-layout>
