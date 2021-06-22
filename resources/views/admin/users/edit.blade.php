<x-app-layout>
    @if (session('info'))
        <x-alert color="green" message="{{session('info')}}" />
    @endif
    <div class="w-full h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50 flex flex-no-wrap overflow-auto">
        <x-sidebar />
        <div class=" ml-16 sm:ml-80 pr-16 pt-14 pb-12 w-full h-full flex flex-wrap items-center justify-center">
            <img class="absolute h-48 w-48 opacity-5" src="{{ asset('images/coffe2.svg') }}">
            <div class="w-full mb-80 relative">
                {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
                <x-crear>

                    <x-slot name="title">
                        Edit User
                    </x-slot>

                    <x-slot name="content">
                        <div class="mb-4 relative">
                            <x-jet-label value="User name" />
                            <x-jet-input class="w-full" type="text" name="name" value="{{$user->name}}" />
            
                            <x-jet-input-error for="name" />
            
                        </div>
            
                        <div class="mb-4 relative">
                            <x-jet-label value="List of Role User" />
                            @foreach ($roles as $role)
                                @if (!@Auth::user()->hasRole('SuperAdmin') && $role->name !== 'SuperAdmin')
                                    <div>
                                        <label class="mr-4">
                                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                              {{$role->name}}
                                        </label>
                                    </div>
                                    @elseif (@Auth::user()->hasRole('SuperAdmin'))
                                    <div>
                                        <label class="mr-4">
                                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                              {{$role->name}}
                                        </label>
                                    </div>
                                    @endif
                            @endforeach
            
                        </div>

                        <x-slot name="footer">
                            <x-button color="gray" href="{{route('users.index')}}">
                                Cancel
                            </x-button>
            
                            {!! Form::submit('Edit user', ['class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition']) !!}
                        </x-slot>

                    </x-slot>

                </x-crear>
                

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>