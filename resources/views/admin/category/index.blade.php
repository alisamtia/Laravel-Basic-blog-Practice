<x-adminLayout name="All Categories" path="Categories" padding="5">
    <div style="display:flex;">
        <h3>All categories</h3>
        <a href="{{route('categories.create')}}" style="margin-left:auto;color:#319795;">New Category</a>
    </div>
    <p>Here are all the Categories You can Edit and Delete These, {{ucwords(request()->user()->username)}}</p>

    <ul class="p-0 mt-4">

    @foreach($categories as $category)
        <li class="d-flex justify-content-between align-items-center rounded p-3 border mb-3">
            <div class="d-flex flex-grow-1 align-items-start">
                <div>
                    <h6 class="d-flex align-items-center mb-2"><span>{{ucwords($category->name)}}</span></h6>
                    <div class="text-small"><span class="mr-3"><span class="text-muted">Created By: </span> <span>{{ ucwords($category->user->username) }}</span></span><span class="release"><span class="text-muted">Release Date: </span> <span>{{$category->created_at->diffForHumans()}}</span></span>
                    </div>
                </div>
            </div>
            <div>
                <div class="btn-group card-option">

                    <button type="button" class="btn shadow-none px-0 dropdown-toggle no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="las la-ellipsis-h h4 mb-0"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item reload-card"><a href="{{ route('categories.edit',$category) }}"><i class="las la-pencil-alt"></i> Edit</a></li>
                        <li class="dropdown-item close-card"><form method="POST" action="{{route('categories.destroy',$category)}}">@csrf @method("DELETE")<button type="submit" style="color:red !important;background:none;border:none;padding:0px;margin:0px;font-weight:700;color:red;"><i class="las la-trash"></i> Remove</button></form></li>
                    </ul>
                </div>
            </div>
        </li>
        @endforeach
        
    </ul>
    {{ $categories->links() }}
</x-adminLayout>