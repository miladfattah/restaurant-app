<x-admin-layout>
 
    <div class="py-12">
        <div class="flex justify-end mx-auto sm:px-6 lg:px-8 mb-5">
            <a href="{{route('admin.categoreis.create')}}" 
                class="py-2 px-3 bg-indigo-500 text-white rounded ">New Category</a>
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
                                                Image
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Description
                                            </th>
                                            <th scope="col" class="p-4">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                       @forelse ($categories as $category)
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$category->name}}</td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <img src="{{ Storage::url($category->image) }}"
                                                    class="w-16 h-16 rounded">
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$category->description}}</td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                       @empty
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">Not Result</td>
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
