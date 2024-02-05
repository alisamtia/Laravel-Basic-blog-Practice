<x-layout name="Hey">
<main role="main">
        <div class="wrapper mt-5">

@if(isset($cPage))
        <div class="breadcrumb-wrap ml-5">
                <div class="container py-3">
                    <div class="row d-flex justify-content-md-between justify-content-sm-center">
                        <div class="">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="{{route('index')}}">Home</a></li>
                                    <li class="breadcrumb-item ml-1 font-weight-bold active" aria-current="page">
                                        {{ ucwords($cPage) }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
@endif

            <div class="container">
                @if(count($posts))
                    <x-posts.featured :post=$posts[0] />

                    @if(count($posts)>1)
                    <div class="row d-flex flex-wrap align-items-stretch">
                        @foreach($posts->skip(1) as $post)
                            <x-posts.basic :post=$post />
                        @endforeach
                    </div>
                    @endif

                @else
                    <h3 class="text-center my-7">No Post Found!!</h3>
                @endif

<div style="display:flex;justify-content:center;">
{{ $posts->links() }}
</div>
            </div>
        </div>
    </main>
</x-layout>