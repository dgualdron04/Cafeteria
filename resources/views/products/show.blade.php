<x-app-layout>
    <div class="w-full h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50 flex flex-no-wrap overflow-auto">
        <x-sidebar />
        <div class=" ml-16 sm:ml-80 pr-16 pt-14 pb-12 w-full h-full flex flex-wrap items-center justify-center">
            <div class="w-full flex justify-between">
                <a href="{{route('products.index')}}" class="text-yellow-600 hover:text-yellow-700"><< Volver</a>
                <a href="{{route('products.edit', $product)}}" class="text-yellow-600 hover:text-yellow-700">Editar {{$product->name}} >></a>
            </div>
            <img class="absolute h-48 w-48 opacity-5" src="{{ asset('images/coffe2.svg') }}">
            <div class="w-full mb-80 relative">
                <div class="w-full h-full flex flex-wrap justify-center">
                    <div class="container pt-24 pb-10">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <div class="flexslider">
                                    <ul class="slides">
                                        @foreach ($product->images as $image)
                                            <li data-thumb="{{ Storage::url($image->url) }}">
                                                <img src="{{ Storage::url($image->url) }}">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                
                            <div>
                                <h1 class="text-xl font-bold text-trueGray-700">{{$product->name}}</h1>
                
                                <div class="lg:flex mt-4">
                                    <p class="text-trueGray-700">Category: <a class="underline capitalize hover:text-orange-500" href="">{{ $product->subcategory->category->name }}</a></p>
                                    <p class="text-trueGray-700 lg:mx-4">Subcategory: <a class="underline capitalize hover:text-orange-500" href="">{{ $product->subcategory->name }}</a></p>
                                    <p class="text-trueGray-700 lg:mx-4">Brand: <a class="underline capitalize hover:text-orange-500" href="">{{ $product->brand->name }}</a></p>
                                    <p class="text-trueGray-700">Flavor: <a class="underline capitalize hover:text-orange-500" href="">{{ $product->flavor->name }}</a></p>
                                </div>
        
                                <div class="mt-4">
                                    <p class="text-trueGray-700">Ingredients:</p>
                                    <ul class="list-disc">
                                        @foreach ($product->ingredients as $ingredient)
                                            <li class="mx-4 my-2">{{$ingredient->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                
                                <p class="my-4 text-2xl font-semibold text-trueGray-700">USD {{ $product->price }}</p>
                
                                <div class="bg-white rounded-lg shadow-lg mb-6">
                                    <div class="p-4 flex items-center">
                                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-yellow-600">
                                            <i class="fas fa-truck text-sm text-white"></i>
                                        </span>
                                        
                                        <div class="ml-4">
                                            <p class="text-lg font-semibold text-yellow-600">Shipments are made to all of Bucaramanga</p>
                                            <p>You will receive it in the shortest time possible</p>
                                        </div>
                                    </div>
                                </div>
        
                                <div>
                                    <p class="text-gray-700 mb-4">
                                        <span class="font-semibold text-lg">Available stock: </span>{{ $product->quantity }}
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    @push('script')
        <script>
            $(document).ready(function(){
                $('.flexslider').flexslider(
                    {
                        animation: "slide",
                        controlNav: "thumbnails"
                    }
                );
            });
        </script>
    @endpush

</x-app-layout>