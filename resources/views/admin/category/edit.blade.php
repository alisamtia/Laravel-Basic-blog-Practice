<x-adminLayout name="Edit Category">
<form action="{{ route('categories.update',$category->slug) }}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        @method('put')
        <x-form.text value="{{old('category') ?? $category->name}}" name="name" type="text" />
        <x-form.btn text="Update Category" />
    </form>
</x-adminLayout>
