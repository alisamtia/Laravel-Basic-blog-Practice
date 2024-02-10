<x-layout name="{{$post->title}} Post" meta_description="{{$post->meta_description}}">


<main role="main">
        <div class="wrapper">

            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-9">
                        <div class="blog-post mb-5 mt-6">
                            <div class="blog-post--header mb-6">
                                <h1 class="blog-title">
                                    {{ $post->title }}
                                </h1>
                                <div class="meta-info">
                                    <ul class="list-unstyled list-inline">
                                        <li class="post-author list-inline-item">
                                            By <a href="{{ route('posts.authorFilter',$post->author) }}" tabindex="0">{{ ucwords($post->author->username) }}</a>
                                        </li>
                                        <li class="post-date list-inline-item">{{ $post->created_at->diffForHumans() }}</li>
                                        <li class="post-comment list-inline-item">{{ count($post->comments) }} Comments</li>
                                    </ul>
                                </div>
                            </div>
                        {!! $post->body !!}
                        </div>
                        <hr class="my-5" />
                        <div class="mb-3 mt-5">
                            <h3>Comments</h3>
                            <ul class="m-0 p-0">
@foreach($post->comments as $comment)
                                <li class="media mt-5">
                                    <a href="#">
                                        <img class="img-lg rounded-circle mr-3 " src="{{asset($comment->user->avatar)}}" alt="..." />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="h6 mb-1">
                                        {{ucwords($comment->user->username)}} <span class="small ml-2 text-muted">{{$comment->created_at->diffForHumans()}}</span>
                                        </h4>
                                        <p class="mb-1">
                                            The Ice Village is connected to the Hoshino Resort Tomamu, and it’s
                                            open both for day trips and longer stays for the resort’s guests—
                                            starting.
                                        </p>
                    @auth
                        @if(request()->user()->role==="admin")
                        <div class="flex">
                            <form action="{{route('comments.destroy',$comment)}}" method="POST" style="display:flex;gap:5px;">
                                @csrf
                                @method("DELETE")
                                <a href="{{route('comments.edit',$comment)}}" style="font-weight:400;">Edit</a>
                                <button style="padding:0px !important;border:none;background:none;color:red;font-weight:400;" type="submit">Remove</button>
                            </form>
                        </div>
                        @elseif($comment->user_id===request()->user()->id)
                            <form action="{{route('comments.destroy',$comment)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button style="padding:0px !important;border:none;background:none;color" type="submit">Remove</button>
                            </form>
                        @endif
                    @endauth
                        </div>
                        </li>
                        @endforeach
                            </ul>
                        </div>

                        <hr class="my-5" />
                        @auth
                        <h3>Leave a reply</h3>
                        <form action="{{route('comments.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="post_id" type="hidden" value="{{$post->id}}" />
                                <textarea required name="body" rows="6" class="form-control" placeholder="Your Reply">{{old('body')}}</textarea>
                                @error('body')
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary btn-wide btn-md" type="submit">
                                    Leave Reply
                                </button>
                            </div>
                        </form>
@endauth
@guest
    <h4 class="text-xl font-bold">Register or Login to Participate in the Comments</h4>
@endguest
                    </div>
                </div>
            </div>
        </div>
    </main>










</x-layout>
