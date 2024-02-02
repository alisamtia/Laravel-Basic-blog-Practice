@props(["post"])    
<div class="featured-post mb-5 bg-soft-green rounded hover-box-shadow">
    <div class="row align-items-md-center">
        <div class="col-lg-6 col-md-12">
            <div class="featured-post--img position-relative ">
                <img alt="bg image" class="bg-image rounded-left" src="{{asset($post->thumbnail)}}" />
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="p-4">
                <div class="blog-date d-flex justify-content-start align-items-center mb-2">
                    <a href="#!" class="label font-weight-bold">{{ ucwords($post->category->name) }}</a>
                </div>
                <h2 class="h3 mb-2">
                    <a href="{{route('post.show',$post)}}" class="blog-title text-dark">{{ $post->title }}</a>
                </h2>
                
                <p class="lead">
                    Webinar host and Customer Success advocate Jason Doe takes you through the landing page creation process.
                </p>
                <div class="card-footer border-0 d-flex justify-content-between align-items-center mt-5 px-0 py-3">
                <a href="{{ route('posts.authorFilter',$post->author) }}"><div class="author-box d-sm-flex flex-row flex-wrap text-center align-items-center">
                        <img src="{{ asset($post->author->avatar) }}" class="img-sm rounded-circle" alt="profile image" />
                        <div class=" ml-sm-3 ml-md-0 ml-xl-3 text-left">
                            <h6 class="mt-1 mb-0">{{ucwords($post->author->username)}}</h6>
                        </div>
                    </div></a>
                    <!--/author card --> <a href="#!" class="bg-light py-1 px-2 rounded-pill text-muted small">
                        <i class="las la-heart mr-1"></i>145
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>