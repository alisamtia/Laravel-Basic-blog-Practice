<x-adminLayout name="New Category" path="Comment / New">
<h4 class="card-title mb-3">New Category</h4>
<form action="{{ route('categories.store') }}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        <x-form.text name="name" type="text" />
        <x-form.small-btn>Create Category</x-form.small-btn>
    </form>
</x-adminLayout>