<x-admin-layout>

    <div class="flex justify-end">
        <a href="{{route('admin.menus.index')}}" 
            class="py-2 px-3 bg-indigo-500 text-white">Index Menu</a>
    </div>
    <div class="py-12">
        <div class="max-w-2xl bg-white py-10 px-5 m-auto w-full mt-10">
            <div class="grid grid-cols-2 gap-4 max-w-xl m-auto">
        
            <div class="col-span-2 lg:col-span-1">
                <input type="text" class="border-solid border-gray-400 border-2 p-2 rounded md:text-xl w-full" placeholder="Name"/>
            </div>
        
            <div class="col-span-2 lg:col-span-1">
                <input type="text" class="border-solid border-gray-400 border-2 p-2 rounded md:text-xl w-full" placeholder="Email Address"/>
            </div>
        
            <div class="col-span-2">
                <textarea cols="30" rows="3" class="border-solid border-gray-400 border-2 rounded md:text-xl w-full" placeholder="Message"></textarea>
            </div>
        
            <div class="col-span-2 text-right">
                <button class="py-2 px-4 bg-green-500 text-white font-bold w-full sm:w-32 rounded">
                Submit
                </button>
            </div>
        
            </div>
        </div>
    </div>
</x-admin-layout>
