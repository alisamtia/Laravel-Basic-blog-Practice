<x-adminLayout name="All Users" path="Users" padding="5">
<div style="display:flex;">
        <h3>All Users</h3>
        <a href="{{route('users.create')}}" style="margin-left:auto;color:#319795;">New User</a>
    </div>
    <p>See what the people are Talking about you, {{ucwords(request()->user()->username)}}</p>

    <ul class="p-0 mt-4">

    @foreach($users as $user)
        <li class="d-flex justify-content-between align-items-center rounded p-3 border mb-3">
            <div class="d-flex flex-grow-1 align-items-start">
                <div class="mr-3"><img src="{{ asset($user->avatar) }}" alt="" class="img-sm rounded"></div>
                <div class="">
                <h6 class="d-flex align-items-center mb-2"><span>{{ucwords($user->username)}}</span> <span class="badge badge-soft-success ml-2">{{ucwords($user->role)}}</span></h6>
                    <div class="text-small"><span class="mr-3"><span class="text-muted">Email: </span> <span>{{ ucwords($user->email) }}</span></span><span class="release"><span class="text-muted">Creation Date: </span> <span>{{$user->created_at->diffForHumans()}}</span></span>
                    </div>
                </div>
            </div>
            <div>
                <div class="btn-group card-option">

                    <button type="button" class="btn shadow-none px-0 dropdown-toggle no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="las la-ellipsis-h h4 mb-0"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item reload-card"><a href="{{ route('users.edit',$user) }}"><i class="las la-pencil-alt"></i> Edit</a></li>
                        @if($user->id===request()->user()->id)
                        @else
                        <li class="dropdown-item close-card"><form method="POST" action="{{route('users.destroy',$user)}}">@csrf @method("DELETE")<button type="submit" style="color:red !important;background:none;border:none;padding:0px;margin:0px;font-weight:700;color:red;"><i class="las la-trash"></i> Remove</button></form></li>
                        @endif
                    </ul>
                </div>
            </div>
        </li>
        @endforeach
        
    </ul>
    {{ $users->links() }}
</x-adminLayout>