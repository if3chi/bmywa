<x-front-layout>
    <x-slot name="title">
        Link Expired - BMYWA
    </x-slot>
    
    <x-slot name="hero">
        <x-front.banner class="bg-gray-50 fade-in">
            <div class="error-h px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
                <div class="max-w-max mx-auto">
                    <main class="sm:flex">
                        <p class="text-4xl font-extrabold text-yellow-400 sm:text-5xl">403</p>
                        <div class="sm:ml-6">
                            <div class="sm:border-l sm:border-gray-200 sm:pl-6">
                                <h1 class="text-4xl font-extrabold text-gray-700 tracking-tight sm:text-5xl">Link Expired
                                </h1>
                                <p class="mt-1 text-base text-gray-500">The link you are looking for has expired.
                                </p>
                            </div>
                            <div class="mt-10 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
                                <a href="/"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                    Go back home
                                </a>
                                {{-- <a href="#"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-yellow-700 bg-yellow-100 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                    Contact support
                                </a> --}}
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </x-front.banner>
    </x-slot>
</x-front-layout>
