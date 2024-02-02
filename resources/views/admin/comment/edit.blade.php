<x-adminLayout name="Edit Comment" path="Comment / {{ Str::limit($comment->body, 40); }}">
    <h4 class="card-title mb-3">Edit {{ Str::limit($comment->body, 40); }}</h4>
    <form action="{{ route('comments.update',$comment) }}" class="flex flex-col gap-5" method="POST" enctype='multipart/form-data'>
        @csrf
        @method('put')
        <x-form.textarea default="{!! old('body') ? old('body') : $comment->body !!}" name="body" rows="6" type="text" />
        <x-form.small-btn>Update Comment</x-form.small-btn>
    </form>
</x-adminLayout>
