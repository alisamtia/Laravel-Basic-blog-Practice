<x-adminLayout name="New Category" path="Category / {{ucwords($category->name)}}">
<h4 class="card-title mb-3">Edit "{{ ucwords($category->name) }}" Category</h4>
<form action="{{ route('categories.update',$category) }}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        @method("PATCH")
        <x-form.text value="{{ucwords($category->name)}}" name="name" type="text" />
        <x-form.small-btn>Update Category</x-form.small-btn>
    </form>
</x-adminLayout>