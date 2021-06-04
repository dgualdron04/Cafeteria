<x-app-layout>
    @if ($message = Session::get('success'))
        <x-alert color="green" />
    @endif
    <div class="w-full h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50 flex flex-no-wrap overflow-auto">
        <x-sidebar />
        <div class=" ml-16 sm:ml-80 pr-16 pt-14 pb-12 w-full h-full flex flex-wrap items-center justify-center">
            <img class="absolute h-48 w-48 opacity-5" src="{{ asset('images/coffe2.svg') }}">
            <div class="pb-2 w-full">
                <x-button href="{{route('ingredients.create')}}">
                    Create Ingredient
                </x-button>
            </div>
            <x-table>
                @if ($ingredients->count() > 0)
                    
                    <table class="min-w-full divide-y divide-gray-200">
    
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" colspan="3" class="relative px-6 py-3 w-6">
                                    Actions
                                </th>
                            </tr>
                        </thead>
    
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($ingredients as $ingredient)   
                            
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{++$i}}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{$ingredient->name}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium w-6">
                                    <a href="{{route('ingredients.edit', $ingredient)}}" class="text-yellow-600 hover:text-yellow-800">Edit</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium w-6">
                                    <form action="{{route('ingredients.destroy', $ingredient)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-yellow-600 hover:text-yellow-800">Delete</button>
                                    </form>
                                </td>
                            </tr>
    
                            @endforeach
                            
                        </tbody>
                        
                    </table>

                        <div class="p-4 bg-white border-t border-gray-200">
                            {{$ingredients->links()}}
                        </div>
                    
    
                @else
                
                    <div class="px-6 py-4 min-w-full">
                        <p class="text-sm">Aún no hay registros.</p>
                    </div>
    
                @endif
                    
            </x-table>
        </div>
    </div>
</x-app-layout>