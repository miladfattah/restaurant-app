<x-guest_layout>

    <section class="container mx-auto my-5">
        <div class="grid lg:grid-cols-4 gap-6 w-full">
            @foreach ($categories as $category)
                <div class="rounded shadow-lg pb-2">
                    <img class="w-full h-48" src="{{Storage::url($category->image)}}" alt="">
                    <a href="{{route('categories.show' , $category->id )}}" class="mb-3 p-2 text-xl font-semibold tracking-tight text-green-600 uppercase">
                        {{$category->name}}
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</x-guest_layout>