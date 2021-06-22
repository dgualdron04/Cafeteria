<x-app-layout>
    @if ($message = Session::get('success'))
        <x-alert color="green" />
    @endif
    <div class="w-full h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50 flex flex-no-wrap overflow-auto">
        <x-sidebar />
        <div class=" ml-16 sm:ml-80 pr-16 pt-14 pb-12 w-full h-full flex flex-wrap items-center justify-center">
            <img class="absolute h-48 w-48 opacity-5" src="{{ asset('images/coffe2.svg') }}">
            <div class="pb-2 w-full">
                <x-button href="{{route('users.create')}}">
                    Create User
                </x-button>
            </div>
            <x-table>
                @if ($users->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200">
    
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="w-24 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
    
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" colspan="2" class="relative px-6 py-3 w-6">
                                    Actions
                                </th>
                            </tr>
                        </thead>
    
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)   
                            @if (!@Auth::user()->hasRole('SuperAdmin') && !$user->hasRole('SuperAdmin'))
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{++$i}}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{$user->name}}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{$user->email}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium w-6">
                                        <a href="{{route('users.edit', $user)}}" class="text-yellow-600 hover:text-yellow-800">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium w-6">
                                        <form action="{{route('users.destroy', $user)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-yellow-600 hover:text-yellow-800">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @elseif (@Auth::user()->hasRole('SuperAdmin'))
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{++$i}}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{$user->name}}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{$user->email}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium w-6">
                                        <a href="{{route('users.edit', $user)}}" class="text-yellow-600 hover:text-yellow-800">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium w-6">
                                        <form action="{{route('users.destroy', $user)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-yellow-600 hover:text-yellow-800">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                
                        <div class="p-4 bg-white border-t border-gray-200">
                            {{$users->links()}}
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