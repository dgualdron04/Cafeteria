<x-app-layout>
    <div class="w-full h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50 flex flex-no-wrap overflow-auto">
        <x-sidebar />
        <div class=" ml-16 sm:ml-80 pr-16 pt-14 pb-12 w-full h-full flex flex-wrap items-center justify-center">
            <img class="absolute h-48 w-48 opacity-5" src="{{ asset('images/coffe2.svg') }}">
            <div class="w-full mb-80 relative">
                <form action="{{route('subcategories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <x-crear>

                        <x-slot name="title">
                            Create new Subcategory
                        </x-slot>

                        <x-slot name="content">
                            <div class="mb-4 relative">
                                <x-jet-label value="Subcategory Name" />
                                <x-jet-input class="w-full" type="text" name="name"/>
                
                                <x-jet-input-error for="name" />
                
                            </div>
                  
                            <div class="mb-4 relative">
                                <x-jet-label value="Category Name" />
                                <select class="form-control w-full" name="categories">
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-jet-label value="Select an image for the Subcategory" />

                                <input type="file" name="imagen">
                
                                <x-jet-input-error for="imagen" />
                            </div>

                            <x-slot name="footer">
                                <x-button color="gray" href="{{route('categories.index')}}">
                                    Cancel
                                </x-button>
                    
                                <x-jet-danger-button type="submit">
                                    Create Subcategory
                                </x-jet-danger-button>
                            </x-slot>

                        </x-slot>

                    </x-crear>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>