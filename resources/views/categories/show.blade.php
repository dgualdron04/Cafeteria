<x-app-layout>
    <div class="w-full h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50 ">
        <x-navigation />

        <div class="w-full h-full flex flex-wrap justify-center">
            <div class="container pt-24 pb-12">
                <figure class="">
                    <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($category->image) }}" alt="">
                </figure>
            </div>


            <div class="container">
                <x-Category-Products :category="$category" />
            </div>

        </div>
    </div>

</x-app-layout>