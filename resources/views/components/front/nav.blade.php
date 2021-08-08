<!-- Desktop menu -->
<div class="flex items-center w-full h-20">
    <nav class="hidden w-full md:block" x-show="!showMenu" x-cloak="">
        <ul class="relative z-10 flex items-center px-6 text-sm text-white lg:text-base">
            <li class="mx-2 lg:mx-3">
                <x-front.nav-link :url="route('about')" name="About" />
            </li>
            <li class="mx-2 lg:mx-3">
                <x-front.nav-link url="#" name="News" />
            </li>
            <li class="mx-2 lg:mx-3">
                <x-front.nav-link :url="route('welcome').'#judges'" name="Judges" />
            </li>
            <div class="mx-6"></div>
            <li class="mx-auto">
                <a href="/" class="w-1/4 py-4 pl-6 pr-4 md:pl-4 md:py-0">
                    <img class="rounded-md shadow-sm w-24 logo " src="{{ asset('images/logo.jpg') }}" alt="bmywa logo"
                        srcset="">
                </a>
            </li>
            <li class="mx-2 lg:mx-3">
                <x-front.nav-link :url="route('welcome').'#faq'" name="FAQs" />
            </li>
            <li class="mx-2 lg:mx-3">
                <x-front.nav-link url="#contact" name="Contact Us" />
            </li>
            <li class="mx-2 lg:mx-3">
                <div x-data="{ isOpen: false }" @mouseenter="isOpen = true" @mouseleave="isOpen = false"
                    class="relative inline-block p-1.5 border-2 hover:transparent border-gray-600 hover:border-yellow-500 shadow-md rounded">
                    <div
                        class="relative z-10 flex items-center cursor-pointer text-sm font-medium text-gray-600 hover:text-yellow-500 focus:outline-none">
                        <span>Apply Online</span>
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>

                    <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute left-0 z-20 w-full p-3 mt-3 -ml-0 space-y-2 overflow-hidden transform bg-white shadow-lg lg:-ml-24 lg:left-1/2 md:w-32 ring-1 ring-black ring-opacity-5 rounded"
                        style="display: none;">

                        <a href="#entry-form"
                            class="block  rounded-md py-3 px-6  text-sm text-gray-700 hover:text-yellow-500 capitalize cursor-pointer hover:bg-yellow-50 hover:font-black">
                            Ghana
                        </a>
                        <a href="#entry-form"
                            class="block  rounded-md py-3 px-6  text-sm text-gray-700 hover:text-yellow-500 capitalize hover:bg-yellow-50 hover:font-black">
                            Nigeria
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <!-- End Desktop menu -->

    <!-- Mobile Nav  -->
    <nav class="top-0 z-30 flex flex-col flex-wrap items-center justify-between w-full h-auto px-6 md:hidden">
        <div class="relative z-30 flex items-center justify-between w-full h-20">
            <a href="/" class="flex items-center flex-shrink-0 mr-6 text-white">
                <img class="rounded-sm shadow-sm w-16 logo " src="{{ asset('images/logo.jpg') }}" alt="bmywa logo"
                    srcset="">
            </a>
            <div class="block lg:hidden">
                <button @click="showMenu = !showMenu"
                    class="flex items-center justify-center w-10 h-10 text-yellow-400 rounded-full hover:text-white hover:bg-white hover:bg-opacity-25 focus:outline-none">
                    <template x-if="!showMenu">
                        <x-icon.menu strokeWidth="3" class="w-6 h-6 text-yellow-500" />
                    </template>
                    <template x-if="showMenu">
                        <x-icon.x strokeWidth="3" class="w-6 h-6 text-yellow-400" />
                    </template>
                </button>
            </div>
        </div>
    </nav>
    <!-- End Mobile Nav -->
</div>

<!-- Mobile Menu -->
<div x-show.transition="showMenu"
    class="absolute top-0 z-20 flex flex-col items-center justify-center w-full h-50 pt-24 pb-12  space-y-5 text-lg origin-center bg-gray-50 shadow-lg rounded-b-md"
    x-cloak>
    <a @click="showMenu = !showMenu" href="{{ route('about') }}"
        class="block text-gray-900 hover:text-yellow-500">About</a>
    <a @click="showMenu = !showMenu" href="#" class="block text-gray-900 hover:text-yellow-500">News</a>
    <a @click="showMenu = !showMenu" href="{{ route('welcome') . '#judges' }}"
        class="block text-gray-900 hover:text-yellow-500">Judges</a>
    <a @click="showMenu = !showMenu" href="{{ route('welcome') . '#faq' }}"
        class="block text-gray-900 hover:text-yellow-500">FAQs</a>
    <a @click="showMenu = !showMenu" href="#contact" class="block text-gray-900 hover:text-yellow-500">Contact Us</a>
    <a @click="showMenu = !showMenu" href="#entry-form"
        class="block border-2  p-1.5 border-yellow-400 rounded-md text-gray-900 hover:text-yellow-500">Apply
        Online</a>
</div>
<!-- End Mobile Menu -->
