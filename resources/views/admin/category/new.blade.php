<x-adminLayout name="New Category">
<form action="/dashboard/category/new" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        <x-form.text name="name" type="text" />
        <x-form.btn text="Create Category" />
    </form>
</x-adminLayout>