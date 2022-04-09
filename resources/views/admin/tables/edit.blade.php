<x-admin-layout>

    <div class="flex justify-end">
        <a href="{{route('admin.tables.index')}}" 
            class="py-2 px-3 bg-indigo-500 text-white">Index table</a>
    </div>
    <div class="py-12">
        <form action="{{route('admin.tables.update' , $table->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="max-w-2xl bg-white py-10 px-5 m-auto w-full mt-10">
                <div class="grid grid-cols-2 gap-4 max-w-xl m-auto">
            
                <div class="col-span-2 lg:col-span-1">
                    <input type="text" name="name" value="{{$table->name}}" class="border-solid border-gray-400 border-2 p-2 rounded md:text-xl w-full" placeholder="Name"/>
                    <div>
                        @error('name')
                            <span class="text-red-400 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            
                <div class="col-span-2 lg:col-span-1">
                    <input type="text" name="guest_number" value="{{$table->guest_number}}" class="border-solid border-gray-400 border-2 p-2 rounded md:text-xl w-full" placeholder="Guset Number"/>
                    <div>
                        @error('guest_number')
                            <span class="text-red-400 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>
               
                <div class="col-span-2">
                    <select name="status" class="border-solid border-gray-400 border-2 rounded md:text-xl w-full" >
                        <option value="" >Choise</option>
                        @foreach (\App\Enums\TableStatus::cases() as $status)
                          <option value="{{$status->value}}" @selected($table->status == $status->value)>{{$status->name}}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('status')
                            <span class="text-red-400 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-span-2">
                    <select name="location"  class="border-solid border-gray-400 border-2 rounded md:text-xl w-full" >
                        <option value="" >Choise</option>
                        @foreach (\App\Enums\TableLocation::cases() as $location)
                          <option value="{{$location->value}}"  @selected($table->location== $location->value) >{{$location->name}}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('location')
                            <span class="text-red-400 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            
                <div class="col-span-2 text-right">
                    <button class="py-2 px-4 bg-green-500 text-white font-bold w-full sm:w-32 rounded">
                    Update
                    </button>
                </div>
            
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
