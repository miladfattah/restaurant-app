<x-admin-layout>
 
    <div class="py-12">
        <div class="flex justify-end mx-auto sm:px-6 lg:px-8 mb-5">
            <a href="{{route('admin.tables.create')}}" 
                class="py-2 px-3 bg-indigo-500 text-white rounded ">New Table</a>
        </div>
        <div class="max-full  mx-auto sm:px-6 lg:px-8">
            <div class="max-full  mx-auto">

                <div class="flex flex-col w-full">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg w-full">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Name
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Guest
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Location
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Status
                                            </th>
                                            <th scope="col" class="p-4">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                       @forelse ($tables as $table)
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$table->name}}</td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$table->guest_number}}</td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$table->location}}</td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$table->status}}</td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    <div class="flex space-x-4">
                                                        <a href="{{route('admin.tables.edit' , $table->id)}}"  class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                        <form action="{{route('admin.tables.destroy' , $table->id)}}" method="POST">
                                                            @csrf 
                                                            @method('DELETE')
                                                            <button class="text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                       @empty
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 w-full">
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white w-full">Not Result</td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white w-full"></td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white w-full"></td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white w-full"></td>
                                            </tr>
                                       @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
