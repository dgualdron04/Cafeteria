<div>

    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-4 flex justify-between items-center">
            <h1 class="font-bold text-xl text-gray-700 uppercase">{{$category->name}}</h1>
        </div>
    </div>

    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <li class="bg-white rounded-lg shadow-2xl">
                <article>
                    <a class="hover:bg-black" href="{{ route('products.showUser', $product) }}">
                        <figure>
                            <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                        </figure>

                        <div class="py-4 px-6">
                            <h1 class="text-lg font-semibold">
                                {{ Str::limit($product->name, 20) }}
                            </h1>
                            <p class="font-bold text-trueGray-700">US$ {{$product->price}}</p>
                        </div>
                    </a>
                </article>
            </li>
        @endforeach
    </ul>
    <div class="my-4">
        {{$products->links()}}
    </div>
</div>