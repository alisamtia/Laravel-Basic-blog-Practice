<x-adminLayout name="New Post" padding="5" path="Post / Create">
<form action="{{ route('posts.store') }}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        <x-form.text name="title" type="text" />
        <x-form.textarea rows="10" name="body" />
        <x-form.text type="file" name="thumbnail" />
        <x-form.select name="category_id" frontname="Category">
            <option selected disabled>Select a Category!</option>
            @foreach($categories as $category)
                <option {{ $category->id==old('category_id') ? 'selected' : '' }} value="{{$category->id}}">{{ucwords($category->name)}}</option>
            @endforeach
        </x-form.select>

        <x-form.text name="meta_title" type="text" />
        <x-form.textarea rows="5" name="meta_description" />

        <x-form.small-btn>Publish Post</x-form.small-btn>
    </form>
</x-adminLayout>
