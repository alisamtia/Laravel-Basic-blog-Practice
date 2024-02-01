<x-adminLayout name="All Users">
    <div class="flex flex-col gap-1">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>

        @foreach($users as $user)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ ucwords($user->role) }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->username }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('users.edit',$user->username)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                    <td class="px-6 py-4">
                        @if($user->id==request()->user()->id)
                        @else
                            <form method="POST" action="{{route('users.destroy',$user->username)}}">
                                @csrf
                                @method("DELETE")
                                <button action="submit" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
        @endforeach

        <td colspan="5" class="p-4">
                {{ $users->links() }}
        </td>

                </tbody>
            </table>
        </div>
    </div>
</x-adminLayout>