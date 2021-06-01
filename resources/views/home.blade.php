<x-app-layout>
    <div class="w-full max-h-screen h-screen bg-gradient-to-br from-gray-200 via-yellow-50 to-gray-50">
        <x-navigation />
        
        <div class="w-full h-screen flex items-center content-end">
            <figure class="figura-principal figura-principal-clip hidden md:block">
                <img class="w-full h-screen object-cover object-center" src="{{ asset('images/cafeteria-principal.jpg') }}">
            </figure>

            <div class="md:flex-1 text-center p-10 md:p-0">
              <main class="md:ml-10 lg:px-9 xl:mt-18">
                <div class="text-center">
                  <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 md:text-5xl">
                    <span class="block xl:inline">Rustik Coffe Shop<br></span>
                  </h1>
                  <p class="mt-3 text-base text-gray-500 md:mt-5 md:text-lg md:max-w-xl md:mx-auto lg:mx-0">
                    Our coffee shop has always been with you, now we are in a more friendly and digital format.
                  </p>
                  <div class="mt-5 md:mt-8 md:flex md:justify-center lg:justify-center">
                    <div class="rounded-md shadow">
                      <a href="{{route('dashboard')}}" class="button-principal">
                        Show Products
                      </a>        
                    </div>
                  </div>
                </div>
              </main>
            </div>

        </div>
        
    </div>

</x-app-layout>