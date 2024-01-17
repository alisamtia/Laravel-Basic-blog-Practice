<x-adminLayout name="New Category">
<form action="/dashboard/category/{{$category->id}}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        @method('put')
        <x-form.text value="{{old('category') ?? $category->name}}" name="name" type="text" />
        <x-form.btn text="Update Category" />
    </form>
</x-adminLayout>
