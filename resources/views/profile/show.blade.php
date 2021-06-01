{{-- <x-app2>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app2> --}}

<x-app-layout>
    <div class="w-full h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50 flex flex-no-wrap overflow-auto">
        <x-sidebar />
        <div class=" ml-16 sm:ml-80 pr-16 pt-16 pb-10 w-full h-full flex flex-wrap items-center justify-center">
            <img class="absolute h-48 w-48 opacity-5" src="{{ asset('images/coffe2.svg') }}">
            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 relative">
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')
        
                        <x-jet-section-border />
                    @endif
        
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-10 sm:mt-0 relative">
                            @livewire('profile.update-password-form')
                        </div>
        
                        <x-jet-section-border />
                    @endif
        
                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mt-10 sm:mt-0 relative">
                            @livewire('profile.two-factor-authentication-form')
                        </div>
        
                        <x-jet-section-border />
                    @endif
        
                    <div class="mt-10 sm:mt-0 relative">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>
        
                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <x-jet-section-border />
        
                        <div class="mt-10 sm:mt-0 relative">
                            @livewire('profile.delete-user-form')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>