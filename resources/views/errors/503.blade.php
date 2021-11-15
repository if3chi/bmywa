<x-front-layout>
    <x-slot name="title">
        Site Maintainance - BMYWA
    </x-slot>

    <x-slot name="hero"></x-slot>

    <div class="h-screen px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8 space-y-8 md:space-y-0 justify-center">
        <div class="mx-auto">
            <a href="/" class="pt-4">
                <x-logo class="rounded-md w-64 logo" />
            </a>
        </div>
        <div class="max-w-max mx-auto">
            <main class="sm:flex">
                <div class="sm:ml-6">
                    <div class="sm:bottom-2 sm:border-l sm:border-gray-500 sm:pl-6 space-y-2">
                        <h1 class="text-4xl font-extrabold text-gray-700 tracking-tight sm:text-5xl">We&rsquo;ll
                            be back momentarily!</h1>
                        <p class="mt-1 text-base text-gray-500">Sorry for the inconvenience but we&rsquo;re
                            performing some maintenance at the moment.</p>
                    </div>
                    <div class="mt-6 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
                        <p class="mt-1 text-base text-gray-500">&mdash; The Team</p>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-front-layout>
