<x-guest_layout>

    <section class="container mx-auto my-5">
        <div class="grid lg:grid-cols-4 gap-6 w-full">
            @foreach ($menus as $menu)
                <div class="rounded shadow-lg">
                    <img class="w-full h-48 rounded" src="{{Storage::url($menu->image)}}" alt="">
                    <div>
                        <h3  class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                            {{$menu->name}}
                        </h3>
                        <p class="text-sm text-gray-300 opacity-80">{{$menu->description}}</p>
                    </div>
                    <div class="flex items-center justify-between p-4">
                            <span class="text-xl text-green-600">${{ $menu->price }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</x-guest_layout>