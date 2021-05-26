<x-app-layout>
    <div class="w-full max-h-screen h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50">

        <x-jet-authentication-card>
            <x-slot name="logo">
                    <a class="flex items-center" href="{{route('home')}}">
                        <img class="h-8 w-auto sm:h-10" src="{{ asset('images/coffee.svg') }}">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-4xl ml-4">
                            <span class="block xl:inline">Rustik Coffe Shop<br></span>
                        </h1>
                    </a>
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4 bg-yellow-600 hover:bg-yellow-500">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </div>
</x-app-layout>
