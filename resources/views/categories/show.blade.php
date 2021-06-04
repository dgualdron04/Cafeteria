<x-app-layout>
    <div class="w-full h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50 flex flex-no-wrap overflow-auto">
        <x-sidebar />
        <div class=" ml-16 sm:ml-80 pr-16 pt-14 pb-12 w-full h-full flex flex-wrap items-center justify-center">
            <div class="w-full flex justify-between">
                <a href="{{route('categories.index')}}" class="text-yellow-600 hover:text-yellow-700"><< Volver</a>
                <a href="{{route('categories.edit', $category)}}" class="text-yellow-600 hover:text-yellow-700">Editar {{$category->name}} >></a>
            </div>
            <img class="absolute h-48 w-48 opacity-5" src="{{ asset('images/coffe2.svg') }}">
            <div class="w-full mb-80 relative">
                <div class="w-full h-full flex flex-wrap justify-center">
                    <div class="container pt-24 pb-12">
                        <figure class="">
                            <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($category->image) }}" alt="">
                        </figure>
                    </div>
        
        
                    <div class="container">
                        <div class="bg-white rounded-lg shadow-lg mb-6">
                            <div class="px-6 py-4 flex justify-between items-center">
                                <h1 class="font-bold text-xl text-gray-700 uppercase">{!!$category->icon!!} {{$category->name}}</h1>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>