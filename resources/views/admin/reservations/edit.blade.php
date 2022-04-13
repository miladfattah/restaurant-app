<x-admin-layout>

    <div class="flex justify-end">
        <a href="{{route('admin.reservations.index')}}" 
            class="py-2 px-3 bg-indigo-500 text-white">Index Reserve</a>
    </div>
    <div class="py-12">
        <form action="{{route('admin.reservations.update' , $reservation->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="max-w-2xl bg-white py-10 px-5 m-auto w-full mt-10">
                <div class="grid grid-cols-2 gap-4 max-w-xl m-auto">
            
                <div class="col-span-2 lg:col-span-1">
                <input type="text" name="first_name" value="{{$reservation->first_name}}" class="border-solid border-gray-400 border-2 p-2 rounded md:text-xl w-full" placeholder="First Name"/>
                    <div>
                        @error('first_name')
                            <span class="text-red-400 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            
                <div class="col-span-2 lg:col-span-1">
                    <input type="text" name="last_name" value="{{$reservation->last_name}}" class="border-solid border-gray-400 border-2 p-2 rounded md:text-xl w-full" placeholder="Last Name"/>
                    <div>
                        @error('last_name')
                            <span class="text-red-400 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>
               
                <div class="col-span-2 lg:col-span-1">
                    <input type="email" name="email" value="{{$reservation->email}}" class="border-solid border-gray-400 border-2 p-2 rounded md:text-xl w-full" placeholder="Email"/>
                    <div>
                        @error('email')
                            <span class="text-red-400 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-span-2 lg:col-span-1">
                    <input type="text" name="tel_number" value="{{$reservation->tel_number}}" class="border-solid border-gray-400 border-2 p-2 rounded md:text-xl w-full" placeholder="Phone"/>
                    <div>
                        @error('tel_number')
                            <span class="text-red-400 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>
               
                <div class="col-span-2 lg:col-span-1">
                    <input type="text" name="guest_number" value="{{$reservation->guest_number}}" class="border-solid border-gray-400 border-2 p-2 rounded md:text-xl w-full" placeholder="Guest"/>
                    <div>
                        @error('guest_number')
                            <span class="text-red-400 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>
               
                <div class="col-span-2 lg:col-span-1">
                    <input type="date" name="res_date" value="{{$reservation->res_date}}" class="border-solid border-gray-400 border-2 p-2 rounded md:text-xl w-full" placeholder="Date"/>
                    <div>
                        @error('res_date')
                            <span class="text-red-400 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-span-2">
                    <select name="table_id" class="border-solid border-gray-400 border-2 rounded md:text-xl w-full" >
                        <option value="" >Choise</option>
                        @foreach ($tables as $table)
                          <option value="{{$table->id}}" @selected($table->id == $reservation->table_id)  >{{$table->name}}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('table_id')
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
