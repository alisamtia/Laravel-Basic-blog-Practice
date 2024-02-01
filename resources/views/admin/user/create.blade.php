<x-adminLayout name="Create User">
    <form action="{{ route('users.store') }}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        <x-form.text value="{{ old('username') }}" name="username" type="text" />
        <x-form.text name="email" type="email" value="{{old('email')}}" />
        <x-form.text name="password" type="password" />
        <x-form.text type="file" name="avatar" />

        <x-form.select name="role" frontname="Role">
            <option selected disabled>Select User Role!</option>
            <option value="normal" {{ old('role')=="normal" ? 'selected' : '' }}>Normal</option>
            <option value="author" {{ old('role')=="author" ? 'selected' : '' }}>Author</option>
            <option value="admin" {{ old('role')=="admin" ? 'selected' : '' }}>Admin</option>
        </x-form.select>
        <x-form.btn text="Create User" />
    </form>
</x-adminLayout>
