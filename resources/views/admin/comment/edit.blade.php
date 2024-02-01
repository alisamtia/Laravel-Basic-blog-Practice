<x-adminLayout name="Edit Comment">
<form action="{{ route('comments.update',$comment) }}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        @method('put')
        <x-form.textarea default="{!! old('body') ? old('body') : $comment->body !!}" name="body" rows="6" type="text" />
        <x-form.btn text="Update Comment" />
    </form>
</x-adminLayout>
