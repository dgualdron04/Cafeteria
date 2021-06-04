<header class="header-navigation" x-data="dropdown()">
  <div class="form-navigation" aria-label="Global">

    <div class="form-logo-navigation">
      <div class="logo-navigation">
        @if (Route::currentRouteName() == 'home')
          <a href="{{route('home')}}">
            <img class="h-8 w-auto sm:h-10" src="{{ asset('images/coffee.svg') }}">
          </a>
        @else
          <a href="{{route('home')}}">
            <div class="flex items-center">
              <img class="h-8 w-auto sm:h-10" src="{{ asset('images/coffee.svg') }}">
              <span class="text-2xl ml-4">Rustik Coffe Shop<br></span>
            </div>
          </a>
        @endif
      </div>
    </div>

    <div class="flex items-center md:hidden">
      <a x-on:click="show()" type="button" class="bars-button-navigation" aria-controls="mobile-menu" aria-expanded="false">
        <span class="sr-only">Open main menu</span>

        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>

        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </a>
    </div>

    <nav>
      <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">

        @if (Route::currentRouteName() == "dashboard")
          <a href="{{route('home')}}" class="font-medium text-gray-500 hover:text-gray-900">Home</a>
        @else
          <a href="{{ route('dashboard')}}" class="font-medium text-gray-500 hover:text-gray-900">Products</a>
        @endif

        <a href="#" class="font-medium text-gray-500 hover:text-gray-900">About us</a>
        
        @auth

            <a href="{{ route('gestion') }}" class="font-bold text-yellow-600 hover:text-yellow-500">
              Gestión
            </a>

            <a href="{{ route('profile.show') }}" class="font-bold text-yellow-600 hover:text-yellow-500">
                @php
                    $user = explode(' ', Auth::user()->name);
                    echo $user[0];
                @endphp
            </a>

            <a href="" 
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit()"
                class="font-bold text-yellow-600 hover:text-yellow-500">
                Log Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>

            @else

              <a href="{{ route('login') }}" class="font-bold text-yellow-600 hover:text-yellow-500">Log in</a>
              <a href="{{ route('register') }}" class="font-bold text-yellow-600 hover:text-yellow-500">Sign up</a>

        @endauth
     
      </div>
    </nav>
  </div>

  <nav>
    <div x-on:click.away="show()"  class="modal-nav-form-navigation hidden md:hidden z-10" id="navigation-menu" :class="{'block': open, 'hidden': !open}" x-show="open">
      <div class="modal-form-navigation">
        <div class="px-5 pt-4 flex items-center justify-between">
          <a href="{{route('home')}}">
            <div class="flex items-center">
              <img class="h-8 w-auto sm:h-10" src="{{ asset('images/coffee.svg') }}">
              <span class="text-2xl ml-4">Rustik Coffe Shop<br></span>
            </div>
          </a>
          <div class="-mr-2">
            <button type="button" x-on:click="show()" class="close-button-navigation">
              <span class="sr-only">Close main menu</span>
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
        <div class="px-2 pt-2 pb-3 space-y-1 divide-y divide-gray-100">

          @if (Route::currentRouteName() == "dashboard")
            <a href="{{route('home')}}" class="button-navigation">
              Home
            </a>
          @else
            <a href="{{ route('dashboard')}}" class="button-navigation">
              Products
            </a>
          @endif

          <a href="#" class="button-navigation">
            About us
          </a>
          
        </div>
        
        @auth
        
        <a href="{{ route('profile.show') }}" class="button-plus-navigation">
          Gestión
        </a>

        <a href="{{ route('profile.show') }}" class="button-plus-navigation">
          {{Auth::user()->name}}
        </a>

        <a  onclick="event.preventDefault();
            document.getElementById('logout-form').submit()"
            class="button-plus-navigation">
            Log Out
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>

        @else

          <a href="{{ route('login') }}" class="button-plus-navigation">
            Log in
          </a>
          <a href="{{ route('register') }}" class="button-plus-navigation">
            Sign Up
          </a>

        @endauth
      
      </div>
    </div>
  </nav>

</header>