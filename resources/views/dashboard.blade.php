<x-app-layout>
    <div class="w-full h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50 ">
        <x-navigation />

        <div class="w-full h-full flex flex-wrap items-center">
            <div class="pt-28 md:pt-32 lg:pt-20 px-24 pb-10">
                <p class="text-3xl font-bold">Nuestras Categorias</p>
    
                <div class="mt-4">
                    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        @foreach ($categories as $category)
                            @php

                                if ($category->products->count() > 0) {
                                    $producto = $category->products->random();
                                    $producto = Storage::url($producto->images->random()->url);
                                } else {
                                    $producto = Storage::url("/categories/defecto.png");
                                }

                                if (str_word_count($category->name, 0) > 2) {
                                    $texto = 'text-sm sm:text-3xl lg:text-3xl';
                                } else {
                                    if (strlen($category->name) > 9) {
                                        $texto = 'text-2xl sm:text-5xl lg:text-5xl';
                                    } else {
                                        $texto = 'text-4xl sm:text-5xl lg:text-6xl';
                                    }
                                    
                                }

                            @endphp
                            <li>
                                <a href="{{route('categories.showUser', $category)}}">
                                    <figure class="w-full relative">
                                        <img src="{{$producto}}">
                                        <div class="absolute inset-0 bg-gray-700 opacity-75 hover:opacity-5 text-white font-extrabold {{$texto}} flex items-center justify-center">
                                            <p class="absolute font-black transform rotate-45">{{$category->name}}</p>
                                        </div>
                                    </figure>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        
    </div>

</x-app-layout>
