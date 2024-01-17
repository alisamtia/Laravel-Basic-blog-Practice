<x-adminLayout name="New Post">
<form action="/dashboard/post/new" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        <x-form.text name="title" type="text" />
        <x-form.textarea rows="10" name="body" />
        <x-form.text type="file" name="thumbnail" />
        <x-form.select name="category_id" frontname="category">
            <option selected disabled>Select a Category!</option>
            @foreach($categories as $category)
                <option {{ $category->id==old('category_id') ? 'selected' : '' }} value="{{$category->id}}">{{ucwords($category->name)}}</option>
            @endforeach
        </x-form.select>
        <x-form.btn text="Publish Post" />
    </form>
</x-adminLayout>
