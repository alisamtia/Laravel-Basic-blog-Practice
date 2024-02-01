<x-adminLayout name="All Categories">
    <div class="flex flex-col gap-1">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created By
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created
                    </th>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                </tr>
            </thead>
            <tbody>

        @foreach($categories as $category)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{ ucwords($category->name) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $category->user->username }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $category->created_at->diffForHumans() }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('categories.edit',$category->slug)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="{{route('categories.destroy',$category->slug)}}">
                            @csrf
                            @method("DELETE")
                            <button action="submit" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
        <tr>
            <td colspan="3" class="p-4">
                {{ $categories->links() }}
            </td>
        </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-adminLayout>