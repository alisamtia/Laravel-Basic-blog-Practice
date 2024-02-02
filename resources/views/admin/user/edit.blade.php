<x-adminLayout padding="6" name="Edit User" path="User / {{$user->username}}">
    <form action="{{ route('users.update',$user->username) }}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        @method("put")
        <x-form.text value="{{ old('username') ?? $user->username }}" name="username" type="text" />
        <x-form.text name="email" type="email" value="{{old('email') ?? $user->email}}" />
        <x-form.text name="password" type="password" required="false" />

        <div style="display:flex;gap:20px;">
            <div style="width:80%; margin-top:auto;margin-bottom:auto;">
                <x-form.text required="false" type="file" name="avatar" />
            </div>
            <img style="width:20%" src="{{$user->avatar}}" width="100" alt="">
        </div>

        <x-form.select name="role" frontname="Role">
            <option selected disabled>Select User Role!</option>
            <option value="normal" {{ old('role')=="normal" ? 'selected' : '' }} {{ $user->role=="normal" ? 'selected' : '' }}</option>Normal</option>
            <option value="author" {{ old('role')=="author" ? 'selected' : '' }} {{ $user->role =="author" ? 'selected' : '' }}>Author</option>
            <option value="admin" {{ old('role')=="admin" ? 'selected' : '' }} {{ $user->role =="admin" ? 'selected' : '' }}>Admin</option>
        </x-form.select>
        <x-form.small-btn>Update User</x-form.small-btn>
    </form>
</x-adminLayout>
