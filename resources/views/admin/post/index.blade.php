<x-adminLayout name="All Posts">
    <div class="flex flex-col gap-1">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>

        @foreach($posts as $post)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img width="100" src="{{$post->thumbnail}}">
                    </th>
                    <td class="px-6 py-4">
                        {{ $post->title }}
                    </td>
                    <td class="px-6 py-4">
                        {{ ucwords($post->category->name) }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('posts.edit',$post->slug)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="{{route('posts.destroy',$post->slug)}}">
                            @csrf
                            @method("DELETE")
                            <button action="submit" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach

        <td colspan="5" class="p-4">
                {{ $posts->links() }}
        </td>

                </tbody>
            </table>
        </div>
    </div>
</x-adminLayout>