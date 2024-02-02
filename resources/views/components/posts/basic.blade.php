@props(["post"])
<div class="col-md-4 mb-4">
    <div class="card hover-box-shadow">
        <div class="post-thumb">
            <img class="card-img-top" src="{{asset($post->thumbnail)}}" />
        </div>
        <div class="card-body pt-4 pb-0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="{{ route('posts.categoryFilter',$post->category->slug) }}" class="label font-weight-bold">{{ucwords($post->category->name)}}</a>
                <span class="small">{{$post->created_at->diffForHumans()}}</span>
            </div>
            <a href="{{route('post.show',$post)}}" class="h4 card-title mb-2">{{$post->title}}</a>
            <a href="{{ route('posts.authorFilter',$post->author) }}">
            <div class="card-footer d-flex justify-content-between align-items-center mt-5 px-0 py-3">
                <div class="d-flex align-items-center">
                    <img src="{{asset($post->author->avatar)}}" class="img-sm rounded-circle sm-avatar" alt="..." />
                    <div class="ml-2">
                        <span class="h6"
                      ><span class="font-weight-bold"
                      ><span class="text-muted">By:</span> </span>{{ucwords($post->author->username)}}</span>
                    </div>
                </div>
</a>
                <a href="#!" class="bg-success-alt py-1 px-2 rounded-pill text-success small">
                    <i class="las la-heart mr-1"></i>49
                </a>
            </div>
        </div>
    </div>
</div>