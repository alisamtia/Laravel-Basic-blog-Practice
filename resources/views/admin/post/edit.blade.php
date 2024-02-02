<x-adminLayout name="Edit Post" padding="5" path="Post / {{$post->title}}">
<form action="{{ route('posts.update',$post->slug) }}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        @method("put")
        <x-form.text value="{{ old('title') ?? $post->title }}" name="title" type="text" />
        <x-form.textarea rows="10" name="body" default="{{old('body') ?? $post->body}}"></x-form.textarea>

        <div style="display:flex;gap:20px;">
            <div style="width:80%; margin-top:auto;margin-bottom:auto;">
                <x-form.text required="false" type="file" name="thumbnail" />
            </div>
            <img style="width:20%" src="{{$post->thumbnail}}" width="100" alt="">
        </div>

        <x-form.select name="category_id" frontname="Category">
            <option selected disabled>Select a Category!</option>
            @foreach($categories as $category)
                <option {{ $category->id==$post->category_id ? 'selected' : '' }} {{ $category->id==old('category_id') ? 'selected' : '' }} value="{{$category->id}}">{{ucwords($category->name)}}</option>
            @endforeach
        </x-form.select>
        <x-form.small-btn>Publish Post</x-form.small-btn>
    </form>
</x-adminLayout>
