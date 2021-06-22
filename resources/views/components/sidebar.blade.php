<div>
    <div class="w-64 absolute sm:fixed bg-gray-800 shadow h-full flex-col justify-between hidden sm:flex">
    
        <div class="px-8">
            <div class="h-16 mt-4 w-full flex items-center">
                <img class="h-8 w-auto sm:h-10" src="{{ asset('images/coffee.svg') }}">
                <span class="text-lg font-bold text-white ml-4">Rustik Coffe Shop<br></span>
            </div>
            <ul class="mt-12">
                @php
                    $cont = 0;
                @endphp
                @can('users.index')
                    <li class="flex w-full justify-between {{ Route::currentRouteName() == 'users.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                        <a href="{{route('users.index')}}" class="flex items-center">
                            <i class="fas fa-users"></i>
                            <span class="text-sm ml-2">Users</span>
                        </a>
                    </li>
                @php
                    $cont++;
                @endphp
                @endcan
                @can('categories.index')
                <li class="flex w-full justify-between {{ Route::currentRouteName() == 'categories.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('categories.index')}}" class="flex items-center">
                        <i class="far fa-folder"></i>
                        <span class="text-sm ml-2">Category</span>
                    </a>
                </li>
                @php
                    $cont++;
                @endphp
                @endcan
                @can('subcategories.index')    
                <li
                    class="flex w-full justify-between {{ Route::currentRouteName() == 'subcategories.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('subcategories.index')}}" class="flex items-center">
                        <i class="far fa-folder-open"></i>
                        <span class="text-sm ml-2">Subcategory</span>
                    </a>
                </li>
                @php
                    $cont++;
                @endphp
                @endcan
                @can('products.index')
                <li
                    class="flex w-full justify-between {{ Route::currentRouteName() == 'products.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('products.index')}}" class="flex items-center">
                        <i class="fas fa-mug-hot"></i>
                        <span class="text-sm ml-2">Products</span>
                    </a>
                </li>
                @php
                    $cont++;
                @endphp
                @endcan
                @can('ingredients.index')    
                <li
                    class="flex w-full justify-between {{ Route::currentRouteName() == 'ingredients.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('ingredients.index')}}" class="flex items-center">
                        <i class="fas fa-pepper-hot"></i>
                        <span class="text-sm ml-2">Ingredients</span>
                    </a>
                </li>
                @php
                    $cont++;
                @endphp
                @endcan
                @can('flavors.index')    
                <li
                    class="flex w-full justify-between {{ Route::currentRouteName() == 'flavors.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('flavors.index')}}" class="flex items-center">
                        <i class="fas fa-pizza-slice"></i>
                        <span class="text-sm ml-2">Flavor</span>
                    </a>
                </li>
                @php
                    $cont++;
                @endphp
                @endcan
                @can('brands.index')
                <li
                    class="flex w-full justify-between {{ Route::currentRouteName() == 'brands.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('brands.index')}}" class="flex items-center">
                        <i class="far fa-copyright"></i>
                        <span class="text-sm ml-2">Brand</span>
                    </a>
                </li>
                @php
                    $cont++;
                @endphp
                @endcan
                @if ($cont == 0)
                    <li class="flex w-full justify-between cursor-pointer items-center mb-6 text-gray-300 hover:text-gray-500">
                        <a class="flex items-center" href="{{route('home')}}">Parece que no tenes permisos para realizar ninguna acción, da click aquí para regresar al Inicio.</a>
                    </li>
                @else
                    <li class="flex w-full justify-between text-gray-500 hover:text-gray-400 cursor-pointer items-center mb-6">
                        <a href="{{route('dashboard')}}" class="flex items-center">
                            <i class="fa fa-chevron-left"></i>
                            <span class="text-sm ml-2">Regresar</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="px-8 border-t border-gray-700">
            <ul class="w-full flex items-center justify-around bg-gray-800">
                <li class="cursor-pointer text-white pt-5 pb-3">
                    <a class="flex hover:text-gray-400 rounded" href="{{ route('profile.show') }}">
                        <i class="fas fa-cog"></i>
                        <p class="text-sm text-center px-2">Profile</p>
                    </a>
                    
                </li>
                <li class="cursor-pointer text-white pt-5 pb-3">
                    <a href="" class="flex hover:text-gray-400 rounded"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form-sidebar').submit()">
                        <i class="fas fa-sign-out-alt"></i>
                        <p class="text-sm text-center px-2">Log Out</p>
                    </a>
                    <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    
    </div>
    <div class="w-64 z-40 absolute bg-gray-800 shadow h-full flex flex-col justify-between sm:hidden transition duration-150 ease-in-out"
        id="mobile-nav">
        <div id="openSideBar"
            class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer"
            onclick="sidebarHandler(true)">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20"
                height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <circle cx="6" cy="10" r="2" />
                <line x1="6" y1="4" x2="6" y2="8" />
                <line x1="6" y1="12" x2="6" y2="20" />
                <circle cx="12" cy="16" r="2" />
                <line x1="12" y1="4" x2="12" y2="14" />
                <line x1="12" y1="18" x2="12" y2="20" />
                <circle cx="18" cy="7" r="2" />
                <line x1="18" y1="4" x2="18" y2="5" />
                <line x1="18" y1="9" x2="18" y2="20" />
            </svg>
        </div>
        <div id="closeSideBar"
            class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
            onclick="sidebarHandler(false)">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </div>
        <div class="px-8">
            <div class="h-16 w-full flex items-center mt-4">
                <img class="h-8 w-auto sm:h-10" src="{{ asset('images/coffee.svg') }}">
                <span class="text-lg font-bold text-white ml-4">Rustik Coffe Shop<br></span>
            </div>
            <ul class="mt-12">
                <li class="flex w-full justify-between {{ Route::currentRouteName() == 'users.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('users.index')}}" class="flex items-center">
                        <i class="far fa-folder"></i>
                        <span class="text-sm ml-2">Users</span>
                    </a>
                </li>
                <li class="flex w-full justify-between {{ Route::currentRouteName() == 'categories.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('categories.index')}}" class="flex items-center">
                        <i class="far fa-folder"></i>
                        <span class="text-sm ml-2">Category</span>
                    </a>
                </li>
                <li
                    class="flex w-full justify-between {{ Route::currentRouteName() == 'subcategories.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('subcategories.index')}}" class="flex items-center">
                        <i class="far fa-folder-open"></i>
                        <span class="text-sm ml-2">Subcategory</span>
                    </a>
                </li>
                <li
                    class="flex w-full justify-between {{ Route::currentRouteName() == 'products.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('products.index')}}" class="flex items-center">
                        <i class="fas fa-mug-hot"></i>
                        <span class="text-sm ml-2">Products</span>
                    </a>
                </li>
                <li
                    class="flex w-full justify-between {{ Route::currentRouteName() == 'ingredients.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('ingredients.index')}}" class="flex items-center">
                        <i class="fas fa-pepper-hot"></i>
                        <span class="text-sm ml-2">Ingredients</span>
                    </a>
                </li>
                <li
                    class="flex w-full justify-between {{ Route::currentRouteName() == 'flavors.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('flavors.index')}}" class="flex items-center">
                        <i class="fas fa-pizza-slice"></i>
                        <span class="text-sm ml-2">Flavor</span>
                    </a>
                </li>
                <li
                    class="flex w-full justify-between {{ Route::currentRouteName() == 'brands.index' ? 'text-gray-300 hover:text-gray-500' : 'text-gray-500 hover:text-gray-400' }} cursor-pointer items-center mb-6">
                    <a href="{{route('brands.index')}}" class="flex items-center">
                        <i class="far fa-copyright"></i>
                        <span class="text-sm ml-2">Brand</span>
                    </a>
                </li>
            </ul>
            
        </div>
        <div class="px-8 border-t border-gray-700">
            <ul class="w-full flex items-center justify-around bg-gray-800">
                <li class="cursor-pointer text-white pt-5 pb-3">
                    <i class="fas fa-cog"></i>
                </li>
                <li class="cursor-pointer text-white pt-5 pb-3">
                    <i class="fas fa-sign-out-alt"></i>
                </li>
            </ul>
        </div>
    </div>
    @push('script')
        <script>
            var sideBar = document.getElementById("mobile-nav");
            var toggler = document.getElementById("mobile-toggler");
            sideBar.style.transform = "translateX(-260px)";
            let moved = true;

            function sidebarHandler() {
                if (moved) {
                    sideBar.style.transform = "translateX(0px)";
                    moved = false;
                } else {
                    sideBar.style.transform = "translateX(-260px)";
                    moved = true;
                }
            }

        </script>
    @endpush
</div>