<x-front-layout>
    <x-slot name="hero">
        <x-front.banner class="relative w-full h-full lg:h-screen bg-no-repeat bg-cover"
            style="background-image: url({{ asset('images/bg.jpg') }});">
            <div class="pt-16 pb-20 sm:pt-24 sm:pb-32">
                <div class="items-center max-w-6xl px-12 mx-auto sm:px-20 md:px-5">
                    <div class="flex flex-wrap items-center -mx-3">
                        <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
                            <div class="w-full max-w-md xl:max-w-xl">
                                <div class="space-y-4">
                                    <h1
                                        class="text-2xl font-black md:max-w-xl md:text-3xl lg:text-4xl text-gray-900 tracking-wide">
                                        <span class="">Blooming Minds</span> Young Writers and
                                        Achievers Award
                                    </h1>
                                    <p class="max-w-sm text-lg text-gray-700 md:max-w-md md:text-xl">
                                        Recognising abilities, rewarding achievements...
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative w-full px-3 mb-12 lg:-ml-14 lg:w-1/2 order-0 lg:order-1 lg:mb-0 h-50 lg:mt-8">
                            <img class="absolute top-0 right-0 z-10 hidden mx-auto -mt-32 rounded-lg shadow-2xl opacity-100 xl:-mr-12 sm:max-w-xs lg:max-w-sm lg:block"
                                src="{{ asset('images/banner/banner2.jpg') }}">
                            <img class="relative z-20 w-full mx-auto mt-3 rounded-lg shadow-2xl sm:max-w-none lg:-ml-10 lg:max-w-sm"
                                src="{{ asset('images/banner/banner1.jpg') }}" alt="feature image">
                            <img class="absolute bottom-0 right-0 z-10 hidden mx-auto -mb-40 rounded-lg shadow-2xl xl:-mr-12 sm:max-w-xs lg:max-w-sm lg:block"
                                src="{{ asset('images/banner/banner3.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </x-front.banner>
    </x-slot>

    <!-- About Us -->
    <section id="about" class="px-2 py-14 bg-white md:px-0 fade-in">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full md:w-1/2 md:px-3">
                    <div
                        class="w-full pb-6 space-y-6 lg:max-w-lg md:space-y-4 lg:space-y-6 xl:space-y-8 sm:pr-5 lg:pr-0 md:pb-0 text-center sm:text-left">
                        <h1
                            class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl md:text-3xl lg:text-4xl xl:text-4xl">
                            <span class="text-justify">
                                <span class="">
                                    Blooming
                                    Minds
                                </span> Young Writers and Achievers</span>
                            <span class="text-yellow-500">Awards</span>
                        </h1>
                        <p
                            class="mx-auto text-sm text-justify  text-gray-500  overflow-hidden lg:text-base md:max-w-3xl">
                            is
                            one of many projects run by the Blooming Minds Change Champion Network (BMCCN) founded in
                            2016.
                            The initiative is aimed at raising young African leaders by recognizing and rewarding
                            children
                            with creative abilities in writing and arts. The awards are held in Ghana and Nigeria.
                            Winners
                            are awarded cash prizes and a possible publishing deal. Children whose stories were
                            shortlisted
                            but did not win, will get the opportunity to attend a creative writing workshop to hone
                            their
                            writing skills.</p>

                        <div class="flex flex-col sm:flex-row sm:space-x-4 md:justify-between">
                            <div class="flex flex-col sm:flex-row sm:space-x-2">
                                <a href="{{ route('gallery') }}"
                                    class="flex items-center w-full px-2 py-3 justify-center mb-3 text-lg text-white bg-yellow-600 rounded-md sm:mb-0 hover:bg-yellow-700 sm:w-auto">
                                    View our Gallery
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                                <a href="{{ route('about') }}#readmore"
                                    class="flex items-center px-2 py-3 justify-center text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600">
                                    Read More
                                </a>
                            </div>
                            <div class="space-y-2 flex justify-center w-full mt-4 space-x-2 px-2 md:w-auto md:mt-0">
                                <a href="https://www.facebook.com/bmyoungwriters/"
                                    class="inline-flex items-center pt-1.5 leading-7 text-gray-500 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-yellow-700">
                                    <x-icon.facebook />
                                </a>
                                <a href="https://www.instagram.com/bmywa/"
                                    class="inline-flex items-center leading-7 text-gray-500 no-underline border-0 border-gray-200 cursor-pointer hover:text-yellow-900 focus-within:text-yellow-700">
                                    <x-icon.instagram />
                                </a>
                                <a href="https://twitter.com/bmywa"
                                    class="inline-flex items-center leading-7 font-black text-gray-500 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-yellow-700">
                                    <x-icon.twitter />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
                        <img src="{{ asset('images/about.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="border-t border-gray-200"></div>

    <!-- Sponsors -->
    <x-front.sponsor :sponsors="$sponsors" />

    <div class="border-t border-gray-200"></div>

    <!-- Judges -->
    <x-front.judge :judges="$judges" />


    <!-- Entry Form -->
    <section id="entry-form" class="w-full p-6 bg-yellow-100 xl:px-4 fade-in">
        <livewire:front.entry-form />
    </section>

    <!-- FAQs -->
    <section id="faq" class="py-24 bg-gray-50 fade-in">
        <x-faq-group />
    </section>

    <!-- Contact Us -->
    <section id="contact" class="w-full bg-white fade-in">
        <livewire:front.contact-us />
    </section>

</x-front-layout>
