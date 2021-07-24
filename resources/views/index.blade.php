<x-front-layout>
    <x-slot name="hero">
        <x-front.banner class="relative w-full h-full lg:h-screen bg-no-repeat bg-cover"
            style="background-image: url({{ asset('images/bg.jpg') }});">
            <div class="container flex flex-wrap w-full mx-auto px-5 pb-16 sm:pb-16 lg:pb-24 xl:pb-32">
                <div class=" lg:ml-16 text-gray-800  mt-16 space-y-8 lg:mt-32 xl:mt-34">
                    <div class="space-y-4">
                        {{-- <h1 class="text-3xl font-black sm:w-2/3 sm:text-4xl md:max-w-xl md:text-5xl tracking-wide text-transparent bg-center bg-cover bg-gradient-to-br from-indigo-400 via-indigo-600 to-indigo-500 lg:text-6xl bg-clip-text" style="background-image:url({{ asset('images/scr.png') }})">Blooming Minds <br class="block lg:hidden">Young Writers Award</h1> --}}
                        <h1 class="text-3xl font-black sm:w-2/3 sm:text-4xl md:max-w-xl md:text-5xl tracking-wide">
                            Blooming
                            Minds <br class="block lg:hidden">Young Writers Award</h1>
                        <p class="max-w-sm text-lg text-gray-700 md:max-w-md md:text-xl">Recognising abilities,
                            rewarding
                            achievements..</p>
                    </div>
                    {{-- <button class="w-full px-8 py-3.5 transition duration-300 bg-blue-500 hover:bg-blue-600 shadow text-white font-semibold rounded-lg sm:w-auto">View our services</button> --}}
                    <div class="flex justify-right md:mt-10 transition duration-300">
                        <a href="#"
                            class="rounded-full py-3 px-6 m-2 text-center text-white hover:text-yellow-500 bg-gray-900 border-2 border-gray-900 hover:border-yellow-500 hover:bg-transparent">Ghana</a>
                        <a href="#"
                            class="rounded-full py-3 px-6 m-2 text-center text-white hover:text-yellow-500 bg-gray-900 border-2 border-gray-900 hover:border-yellow-500 hover:bg-transparent">Nigeria</a>
                    </div>
                </div>
                <div class="relative w-full my-auto px-3 md:mb-12 lg:-ml-20 lg:w-1/2 order-0 lg:order-1 lg:mb-10">
                    <img class="absolute top-0 right-0 z-1 hidden mx-auto -mt-32 rounded-lg shadow-2xl opacity-100 xl:-mr-12 sm:max-w-xs lg:max-w-sm lg:block"
                        src="{{ asset('images/banner/banner2.jpg') }}">
                    <img class="relative md:z-20 w-full mx-auto mt-3 rounded-lg shadow-2xl sm:max-w-none lg:-ml-10 lg:max-w-sm"
                        src="{{ asset('images/banner/banner1.jpg') }}" alt="feature image">
                    <img class="absolute bottom-0 right-0 z-1 hidden mx-auto -mb-36  rounded-lg shadow-2xl xl:-mr-12 sm:max-w-xs lg:max-w-sm lg:block"
                        src="{{ asset('images/banner/banner3.jpg') }}">
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
                        class="w-full pb-6 space-y-6 lg:max-w-lg md:space-y-4 lg:space-y-6 xl:space-y-8 sm:pr-5 lg:pr-0 md:pb-0">
                        <h1
                            class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl md:text-3xl lg:text-4xl xl:text-5xl">
                            <span class="block xl:inline">Blooming Minds Young Writers</span>
                            <span class="block text-yellow-500 xl:inline">Awards</span>
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

                        <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                            <a href="#entry-form"
                                class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-yellow-600 rounded-md sm:mb-0 hover:bg-yellow-700 sm:w-auto">
                                Submit An Entry
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                            <a href="#_"
                                class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600">
                                Read More
                            </a>
                            <div
                                class="box-border right-0 space-y-2 flex justify-center w-full mt-4 space-x-4 border-solid md:w-auto md:justify-end md:absolute md:mt-0">
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
    <section class="box-border px-5 py-12 text-gray-800 bg-white xl:my-0 fade-in">
        <div
            class="flex flex-wrap items-center justify-center px-5 mx-auto md:px-12 md:flex-wrap lg:justify-between max-w-7xl">
            <span
                class="box-border block w-full mb-5 text-xs font-bold text-center text-gray-500 tracking-widest uppercase lg:w-auto lg:inline lg:mb-0">Our
                Sponsors</span>
            <div class="box-border inline-flex items-center px-5 py-0 my-2 text-center text-gray-800">
                <img src="{{ asset('images/sponsors/ait.jpeg') }}" alt="Ait logo" class="block object-contain h-12">
            </div>
            <div class="box-border inline-block px-5 py-0 my-2 text-center text-gray-800">
                <img src="{{ asset('images/sponsors/cocowater.jpg') }}" alt="coconut water"
                    class="block object-contain h-9">
            </div>
            <div class="box-border inline-block px-5 py-0 my-2 text-center text-gray-800">
                <img src="{{ asset('images/sponsors/leadway.jpg') }}" alt="leadway" class="block object-contain h-9">
            </div>
            <x-card.sponsor />
            <div class="box-border inline-block px-5 py-0 my-2 text-center text-gray-800">
                <img src="{{ asset('images/sponsors/starlife.jpeg') }}" alt="starlife"
                    class="block object-contain h-9">
            </div>
            <div class="box-border inline-block px-5 py-0 my-2 text-center text-gray-800">
                <img src="{{ asset('images/sponsors/bmccn-logo.png') }}" alt="bmccn"
                    class="block object-contain h-9">
            </div>
        </div>
    </section>

    <div class="border-t border-gray-200"></div>

    <!-- Judges -->
    <section id="judges" class="w-full py-12 bg-gray-50 lg:py-24">
        <div class="max-w-6xl px-12 mx-auto text-center">
            <div class="space-y-12 md:text-center">
                <div class="max-w-3xl mb-20 space-y-5 sm:mx-auto sm:space-y-4">
                    <h2 class="relative text-4xl font-extrabold tracking-tight sm:text-5xl">Our Judges</h2>
                    <p class="text-xl text-gray-500">We take pride in the people we work with. This is because we all
                        collectively help each other become more awesome every day.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <x-card.judge name="Nana Brew Hammond" image_url='images/gh/Nana Brew Hammond.jpg'
                    desc="International author of ‘Powder Necklace’" />
                <div class="w-full border bg-white border-gray-200 rounded-lg shadow-md">

                    <div class="flex flex-col items-center justify-center p-4">
                        <img class="w-48 h-48 mb-2 zoom rounded-full"
                            src="{{ asset('images/gh/Sylvanus Bedzrah.png') }}">
                        <h2 class="text-lg text-yellow-500 font-bold">Sylvanus Bedzrah</h2>
                        <p class="font-medium text-gray-500">Award winning Author of ‘Bloody Ingrate’</p>
                        {{-- <p class="text-gray-400">Team member as of 2015</p> --}}
                    </div>

                    {{-- <div class="flex border-t border-gray-200 divide-x divide-gray-200">
                        <a href="#_" class="flex-1 block p-5 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto fill-current" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
                        </a>
                        <a href="#_" class="flex-1 block p-5 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"></path></svg>
                        </a>
                        <a href="#_" class="flex-1 block p-5 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path></svg>
                        </a>
                    </div> --}}
                </div>
                <div class="w-full border bg-white border-gray-200 rounded-lg shadow-md">

                    <div class="flex flex-col items-center justify-center p-4">
                        <img class="w-48 h-48 mb-2 zoom rounded-full"
                            src="{{ asset('images/gh/ruby-goka-300x211.jpg') }}">
                        <h2 class="text-lg text-yellow-500 font-bold">Ruby Goka</h2>
                        <p class="font-medium text-gray-500">Author of Mama’s Amazing Cover cloth, Those who wait</p>
                        {{-- <p class="text-gray-400">Team member as of 2015</p> --}}
                    </div>

                    {{-- <div class="flex border-t border-gray-200 divide-x divide-gray-200">
                        <a href="#_" class="flex-1 block p-5 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto fill-current" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
                        </a>
                        <a href="#_" class="flex-1 block p-5 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"></path></svg>
                        </a>
                        <a href="#_" class="flex-1 block p-5 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path></svg>
                        </a>
                    </div> --}}
                </div>
                <div class="w-full border bg-white border-gray-200 rounded-lg shadow-md">

                    <div class="flex flex-col items-center justify-center p-4">
                        <img class="w-48 h-48 mb-2 zoom rounded-full"
                            src="{{ asset('images/gh/Gamel Sankarl.jpg') }}">
                        <h2 class="text-lg text-yellow-500 font-bold">Gamel Sankarl</h2>
                        <p class="font-medium text-gray-500">Award winning Author and Speaker</p>
                        {{-- <p class="text-gray-400">Team member as of 2015</p> --}}
                    </div>

                    {{-- <div class="flex border-t border-gray-200 divide-x divide-gray-200">
                        <a href="#_" class="flex-1 block p-5 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto fill-current" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
                        </a>
                        <a href="#_" class="flex-1 block p-5 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"></path></svg>
                        </a>
                        <a href="#_" class="flex-1 block p-5 text-center text-gray-300 transition duration-200 ease-out hover:bg-gray-100 hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path></svg>
                        </a>
                    </div> --}}
                </div>
            </div>

        </div>
    </section>
    <!-- Entry Form -->
    <section id="entry-form" class="w-full px-8 py-16 bg-yellow-100 xl:px-8 fade-in">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <div class="w-full space-y-2 md:w-3/5 md:pr-16 text-justify">
                    <p class="font-bold text-yellow-800 text-xs text-center uppercase">Blooming Minds Young Writers
                        Award
                        Competition Entry</p>
                    <h2 class="text-2xl text-center font-extrabold leading-none text-gray-800 sm:text-3xl md:text-4xl">
                        BMYWA NIGERIA
                    </h2>
                    <p class="text-base text-gray-600 text-justify">The competition runs every year and is open to all
                        kids
                        between the ages of 6-15 years and is grouped as follows:</p>
                    <p class="text-base font-bold pt-2 text-gray-800">CREATIVE WRITING COMPETITION <br><span
                            class="text-sm font-normal text-gray-600">Ages 9-15 – Fiction or Non-Fiction, not more than
                            500
                            words.</span> </p>
                    <p class="text-base font-bold pt-2 text-gray-800">SHORT STORIES & POETRY <br><span
                            class="text-sm font-normal text-gray-600">Ages 6-9 – Not more than 300 words.</span> </p>
                    <p class="text-base font-bold pt-2 text-gray-800">BMYWA 2021: <br><span
                            class="text-sm font-normal text-gray-600">Entry Submissions opens 15th Dec 2020 and closes
                            1st
                            March 2021.</span> </p>
                    <p class="text-sm font-normal pt-2 text-gray-600">Shortlist and Winners will be announced 15th
                        April.
                        Award Ceremony will he held 25th April 2021</p>
                    <p class="text-sm font-normal pt-2 text-gray-600">To enter competition, complete the form <span
                            class="md:hidden">below</span> and insert essay.</p>
                    <p class="text-base font-bold pt-2 text-gray-800">Winning Prizes</p>
                    <ul>
                        <li class="flex items-center py-1 space-x-4 ">
                            <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span class="font-medium text-gray-700">Category A Winner: N100,000.00</span>
                        </li>
                        <li class="flex items-center py-1 space-x-4 ">
                            <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span class="font-medium text-gray-700">Category A Runner Up: N80,000.00</span>
                        </li>
                        <li class="flex items-center py-1 space-x-4 ">
                            <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span class="font-medium text-gray-700">Category B Winner: N50,000.00</span>
                        </li>
                        <li class="flex items-center py-1 space-x-4 ">
                            <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span class="font-medium text-gray-700">Category B Runner Up: N25,000</span>
                        </li>
                        <p class="text-base font-normal pt-2 text-gray-900 text-justify">Additional giveaways: Tablets
                            and
                            School Supplies</p>
                </div>

                <div class="w-full  mt-16 md:mt-0 md:w-50">
                    <div
                        class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-yellow-100 rounded-lg shadow-lg px-7">
                        <h3 class="mb-6 text-2xl font-medium text-center">Submit your entry</h3>
                        <div class="relative mb-6">
                            <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">First
                                Name</label>
                            <input type="text"
                                class="block w-full p-3 mt-2 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300"
                                placeholder="Ama">
                        </div>
                        <div class="relative mb-6">
                            <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Last Name</label>
                            <input type="text"
                                class="block w-full p-3 mt-2 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300"
                                placeholder="Kwaku">
                        </div>
                        <div class="relative mb-6">
                            <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Email
                                Address</label>
                            <input type="email"
                                class="block w-full p-3 mt-2 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300"
                                placeholder="AmaKwaku@gmail.com">
                        </div>
                        <div class="relative mb-6">
                            <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Phone</label>
                            <input type="phone"
                                class="block w-full p-3 mt-2 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300"
                                placeholder="0201234567">
                        </div>
                        <div class="flex flex-row mb-6 w-full">
                            <div class="relative">
                                <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Age</label>
                                <input type="number"
                                    class="block w-full p-3 mt-0 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300"
                                    placeholder="7">
                            </div>
                            <div class="relative">
                                <label class="absolute px-2 ml-4 -mt-3 font-medium text-gray-600 bg-white">Entry Fee
                                    Ref</label>
                                <input type="text"
                                    class="block w-full ml-2 p-3 mt-0 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300"
                                    placeholder="02#4567">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Entry
                                Type</label>
                            <select
                                class="block w-full p-3 mt-2 mb-2 text-xs text-gray-400 bg-white border-2 border-yellow-100 tracking-wider font-light rounded-md focus:ring focus:outline-none focus:ring-yellow-300"
                                placeholder="02#4567">
                                <option class="text-base" value="">Creative Writing</option>
                                <option class="text-base" value="">Short Story & Poerty</option>
                            </select>
                        </div>
                        <div class="relative mb-6">
                            <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Award
                                Entry</label>
                            <textarea type="text"
                                class="block w-full h-32  p-2 mt-6 text-sm placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300"
                                placeholder="Please paste your creative writing or short story/poetry entry here. (Creative Writing: 500 words max, Short Story & Poetry: 300 words max.)"></textarea>
                        </div>
                        <div class="block">
                            <button
                                class="w-full px-3 py-4 mt-4 font-medium text-white bg-yellow-300 rounded-lg">Submit</button>
                        </div>
                        <p class="w-full mt-4 text-sm text-center text-gray-500">Wrong Country? <a href="#_"
                                class="text-yellow-500 underline">Switch here</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FAQs -->
    <section id="faq" class="py-24 bg-gray-50 fade-in">
        <x-faq-group />
    </section>

    <!-- Contact Us -->
    <section id="contact" class="w-full bg-white fade-in">
        <x-contact />
    </section>

</x-front-layout>
