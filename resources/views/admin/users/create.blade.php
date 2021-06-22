<x-app-layout>
    @if (session('info'))
        <x-alert color="green" message="{{session('info')}}" />
    @endif
    <div class="w-full h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50 flex flex-no-wrap overflow-auto">
        <x-sidebar />
        <div class=" ml-16 sm:ml-80 pr-16 pt-14 pb-12 w-full h-full flex flex-wrap items-center justify-center">
            <img class="absolute h-48 w-48 opacity-5" src="{{ asset('images/coffe2.svg') }}">
            <div class="w-full mb-80 relative">
                {!! Form::open(['route' => 'users.store', 'method' => 'post']) !!}
                <x-crear>

                    <x-slot name="title">
                        Create User
                    </x-slot>

                    <x-slot name="content">
                        <div class="mb-4">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-jet-input-error for="name" />
                        </div>
            
                        <div class="mb-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            <x-jet-input-error for="email" />
                        </div>
            
                        <div class="mb-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            <x-jet-input-error for="password" />
                        </div>
            
                        <div class="mb-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-jet-input-error for="password_confirmation" />
                        </div>
            
                        <div class="mb-4 relative">
                            <x-jet-label value="List of Role User" />
                            <div class="flex">
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
            
                        </div>

                        <div class="mb-4 relative">
                            <x-jet-label value="Status of User" />
                            <div class="flex">
                                @foreach ($status as $state)
                                    <div>
                                        <label class="mr-4">
                                            {!! Form::radio('status', $state, null, ['class' => 'mr-1']) !!}
                                            @if ($state == 1)
                                                {{'Active'}}
                                            @else
                                                {{'Inactive'}}
                                            @endif
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <x-jet-input-error for="status" />
                        </div>

                        <x-slot name="footer">
                            <x-button color="gray" href="{{route('users.index')}}">
                                Cancel
                            </x-button>
            
                            {!! Form::submit('Create user', ['class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition']) !!}
                        </x-slot>

                    </x-slot>

                </x-crear>
                

                {!! Form::close() !!}
            </div>
        </div>
        @php
            
        @endphp
    </div>
</x-app-layout>