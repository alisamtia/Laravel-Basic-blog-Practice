<x-adminLayout name="All Posts" path="Posts">
<div class="card-header py-3 border-bottom">
    <div class="d-flex align-items-center">
        <div>
            <h6 class="card-title mb-0">All Posts</h6>
        </div>
    </div>
</div>
<div class="">
    <div class="table-responsive">
        <table class="table table-hover m-b-0">
            <thead>
                <tr>
                    <th class="border-0">Image</th>
                    <th class="border-0" style="width:400px">Name</th>
                    <th class="border-0" data-breakpoints="sm xs">Category</th>
                    <th class="border-0" data-breakpoints="xs">Created</th>

                    <th class="border-0" data-breakpoints="sm xs md">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td><img src="{{ asset($post->thumbnail) }}" alt="Product img" class="img-lg rounded"></td>
                    <td>
                        <h6>{{$post->title}}</h6>
                    </td>
                    <td>

                        <span class="text-muted">{{ucwords($post->category->name)}}</span>
                        </td>
                        <td>{{$post->created_at->diffForHumans()}}</td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('posts.edit',$post)}}"><button type="button" class="btn btn-sm btn-primary"><i class="las la-edit"></i></button></a>

                                <form method="POST" action="{{route('posts.destroy',$post->slug)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button action="submit" class="btn btn-sm btn-danger"><i class="las la-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <hr>
    {{ $posts->links() }}
</div>
</x-adminLayout>