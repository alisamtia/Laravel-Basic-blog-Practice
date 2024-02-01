<x-adminLayout name="Edit User">
    <form action="{{ route('users.update',$user->username) }}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        @method("put")
        <x-form.text value="{{ old('username') ?? $user->username }}" name="username" type="text" />
        <x-form.text name="email" type="email" value="{{old('email') ?? $user->email}}" />
        <x-form.text name="password" type="password" required="false" />
        <div class="flex gap-3">
            <x-form.text required="false" type="file" name="avatar" />
            <img src="{{$user->avatar}}" width="100" alt="">
        </div>

        <x-form.select name="role" frontname="Role">
            <option selected disabled>Select User Role!</option>
            <option value="normal" {{ old('role')=="normal" ? 'selected' : '' }} {{ $user->role=="normal" ? 'selected' : '' }}</option>Normal</option>
            <option value="author" {{ old('role')=="author" ? 'selected' : '' }} {{ $user->role =="author" ? 'selected' : '' }}>Author</option>
            <option value="admin" {{ old('role')=="admin" ? 'selected' : '' }} {{ $user->role =="admin" ? 'selected' : '' }}>Admin</option>
        </x-form.select>
        <x-form.btn text="Update User" />
    </form>
</x-adminLayout>
