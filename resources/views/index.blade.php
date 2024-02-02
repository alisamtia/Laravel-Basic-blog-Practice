<x-layout name="Hey">
<main role="main">
        <div class="wrapper">

            <div class="breadcrumb-wrap">
                <div class="container py-3">
                    <div class="row d-flex justify-content-md-between justify-content-sm-center">
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                
                <x-posts.featured :post=$posts[1] />
                <div class="row d-flex flex-wrap align-items-stretch">
                    @foreach($posts as $post)
                        <x-posts.basic :post=$post />
                    @endforeach
                </div>

<div style="display:flex;justify-content:center;">
{{ $posts->links() }}
</div>
            </div>
        </div>
    </main>
</x-layout>