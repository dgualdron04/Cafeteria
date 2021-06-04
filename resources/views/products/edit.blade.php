<x-app-layout>
    <div class="w-full h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50 flex flex-no-wrap overflow-auto">
        <x-sidebar />
        <div class=" ml-16 sm:ml-80 pr-16 pt-14 pb-12 w-full h-full flex flex-wrap items-center justify-center">
            <img class="absolute h-48 w-48 opacity-5" src="{{ asset('images/coffe2.svg') }}">
            <div class="w-full mb-80 relative">
                <form action="{{route('products.update', $product)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <x-crear>

                        <x-slot name="title">
                            Edit Product
                        </x-slot>

                        <x-slot name="content">
                            <div class="mb-4 relative">
                                <x-jet-label value="Product Name" />
                                <x-jet-input class="w-full" type="text" name="name" value="{{$product->name}}"/>
                
                                <x-jet-input-error for="name" />
                
                            </div>

                            <div class="mb-4 relative">
                                <x-jet-label value="Product Price" />
                                <x-jet-input class="w-full" type="number" name="price" value="{{$product->price}}"/>
                
                                <x-jet-input-error for="price" />
                
                            </div>

                            <div class="mb-4 relative">
                                <x-jet-label value="Product Quantity" />
                                <x-jet-input class="w-full" type="number" name="quantity" value="{{$product->quantity}}"/>
                
                                <x-jet-input-error for="quantity" />
                
                            </div>

                            <div class="mb-4 relative">
                                <x-jet-label value="Product Description" />
                                <textarea class="form-control w-full" name="description" cols="10" rows="3">{{$product->description}}"</textarea>
                                <x-jet-input-error for="description" />
                
                            </div>
                  
                            <div class="mb-4 relative">
                                <x-jet-label value="Subcategory Name" />
                                <select class="form-control w-full" name="subcategories" >
                                    <option value="" disabled>Select Subcategory</option>
                                    @foreach ($other[0] as $subcategory)
                                        @php
                                            
                                        if ($product->subcategory->name == $subcategory->name) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }

                                        @endphp
                                        <option {{$selected}} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4 relative">
                                <x-jet-label value="Brand Name" />
                                <select class="form-control w-full" name="brands" >
                                    <option value="" disabled>Select Brand</option>
                                    @foreach ($other[1] as $brand)
                                        @php
                                            
                                        if ($product->brand->name == $brand->name) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }

                                        @endphp
                                        <option {{$selected}} value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4 relative">
                                <x-jet-label value="Flavor Name" />
                                <select class="form-control w-full" name="flavors" >
                                    <option value="" disabled>Select Flavor</option>
                                    @foreach ($other[2] as $flavor)
                                        @php
                                            
                                        if ($product->flavor->name == $flavor->name) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }

                                        @endphp
                                        <option {{$selected}} value="{{$flavor->id}}">{{$flavor->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4 relative">
                                <x-jet-label value="Ingredient Name" />
                                <select class="form-control w-full" name="ingredient" >
                                    <option value="" disabled>Select Flavor</option>
                                    @foreach ($other[3] as $ingredient)
                                        @php
                                            
                                        if ($product->ingredients[0]->name == $ingredient->name) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }

                                        @endphp
                                        <option {{$selected}} value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endforeach
                               </select>
                            </div> 

                            <div class="mb-4 relative">
                                <x-jet-label value="Product Status" />
                                <select class="form-control w-full" name="status">
                                    <option value="" selected disabled>Select Status</option>
                                    @php
                                        $selected = $product->status == 1  ? 'selected' : '';
                                    @endphp
                                        <option {{$selected}} value="1">Borrador</option>
                                    @php
                                        $selected = $product->status == 2  ? 'selected' : '';
                                    @endphp
                                        <option {{$selected}} value="2">Publicado</option>
                                </select>
                            </div>

                            <div>
                                <x-jet-label value="Select an image for the Product" />

                                <input type="file" name="imagen">
                
                                <x-jet-input-error for="imagen" />
                            </div>

                            <x-slot name="footer">
                                <x-button color="gray" href="{{route('products.index')}}">
                                    Cancel
                                </x-button>
                    
                                <x-jet-danger-button type="submit">
                                    Edit Product
                                </x-jet-danger-button>
                            </x-slot>

                        </x-slot>

                    </x-crear>
                </form>
            </div>
            
        </div>
    </div>
    
</x-app-layout>