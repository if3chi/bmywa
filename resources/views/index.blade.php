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
                            <a href="{{ route('about') }}#readmore"
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
        <x-judge-group>
            @forelse ($judges as $judge)
                <x-card.judge :imagelink="$judge->avatar_url" :name="$judge->name" :work="$judge->profession"
                    :desc="$judge->description" />
            @empty
                <div class="w-full border bg-white border-gray-200 rounded-lg shadow-md p-4  justify-center">
                    <h2 class="text-lg text-yellow-500 font-bold">Nothing Here Yet...</h2>
                </div>
            @endforelse
        </x-judge-group>
    </section>

    <!-- Entry Form -->
    <section id="entry-form" class="w-full px-4 py-16 bg-yellow-100 xl:px-4 fade-in">
        <livewire:front.entry-form />
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
