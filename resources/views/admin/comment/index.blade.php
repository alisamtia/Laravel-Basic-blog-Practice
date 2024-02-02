<x-adminLayout name="All Comments" path="Comments" padding="5">
    <h3>All Comments</h3>
    <p>See what the people are Talking about you, {{ucwords(request()->user()->username)}}</p>

    <ul class="p-0 mt-4">

    @foreach($comments as $comment)
        <li class="d-flex justify-content-between align-items-center rounded p-3 border mb-3">
            <div class="d-flex flex-grow-1 align-items-start">
                <div class="mr-3"><img src="{{ asset($comment->user->avatar) }}" alt="" class="img-sm rounded"></div>
                <div>
                    <h6 class="d-flex align-items-center mb-2"><span>{{$comment->body}}</span></h6>
                    <div class="text-small"><span class="mr-3"><span class="text-muted">Created By: </span> <span>{{ ucwords($comment->user->username) }}</span></span><span class="release"><span class="text-muted">Release Date: </span> <span>{{$comment->created_at->diffForHumans()}}</span></span>
                    </div>
                </div>
            </div>
            <div>
                <div class="btn-group card-option">

                    <button type="button" class="btn shadow-none px-0 dropdown-toggle no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="las la-ellipsis-h h4 mb-0"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item reload-card"><a href="{{ route('comments.edit',$comment) }}"><i class="las la-pencil-alt"></i> Edit</a></li>
                        <li class="dropdown-item close-card"><a href="#!" style="color:red !important;"><i class="las la-trash"></i> Remove</a></li>
                    </ul>
                </div>
            </div>
        </li>
        @endforeach
        
    </ul>
    {{ $comments->links() }}
</x-adminLayout>