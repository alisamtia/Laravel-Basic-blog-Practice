<x-adminLayout name="Edit Post">
<form action="{{ route('posts.update',$post->slug) }}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        @method("put")
        <x-form.text value="{{ old('title') ?? $post->title }}" name="title" type="text" />
        <x-form.textarea rows="10" name="body" default="{{old('body') ?? $post->body}}"></x-form.textarea>
        <div class="flex gap-3">
            <x-form.text required="false" type="file" name="thumbnail" />
            <img src="{{$post->thumbnail}}" width="100" alt="">
        </div>
        <x-form.select name="category_id" frontname="category">
            <option selected disabled>Select a Category!</option>
            @foreach($categories as $category)
                <option {{ $category->id==$post->category_id ? 'selected' : '' }} {{ $category->id==old('category_id') ? 'selected' : '' }} value="{{$category->id}}">{{ucwords($category->name)}}</option>
            @endforeach
        </x-form.select>
        <x-form.btn text="Update Post" />
    </form>
</x-adminLayout>
