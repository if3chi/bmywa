<!-- Desktop menu -->
<div class="flex items-center w-full h-20">
    <nav class="hidden w-full md:block" x-show="!showMenu" x-cloak="">
        <ul class="relative z-10 flex items-center px-6 text-sm text-white lg:text-base">
            <li class="mx-2 lg:mx-3">
                <x-front.nav-link :url="route('about')" name="About" />
            </li>
            <li class="mx-2 lg:mx-3">
                <x-front.nav-link :url="route('news.index')" name="News" />
            </li>
            <li class="mx-2 ">
                <x-front.nav-link :url="route('creative-writing')" name="Creative Writing 101" />
                <li class="mx-auto">
                    <a href="/" class="pt-4">
                        <x-logo class="rounded-md w-32 logo" />
                    </a>
                </li>
            </li>
            <div class="mx-4"></div>
            <li class="mx-2 lg:mx-3">
                <x-front.nav-link :url="route('welcome').'#faq'" name="FAQs" />
            </li>
            <li class="mx-2 lg:mx-3">
                <x-front.nav-link url="#contact" name="Contact Us" />
            </li>
            <li class="mx-2 lg:mx-3">
                <div
                    class="relative inline-block p-1.5 border-2 hover:transparent border-gray-600 hover:border-yellow-500 shadow-md rounded">
                    <a href="{{ route('welcome') . '#entry-form' }}"
                        class="relative z-10 flex items-center cursor-pointer text-sm font-medium text-gray-600 hover:text-yellow-500 focus:outline-none">
                        <span>Apply Online</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- End Desktop menu -->

    <!-- Mobile Nav  -->
    <nav class=" top-0 z-40 flex flex-col flex-wrap items-center justify-between w-full h-auto px-6 md:hidden">
        <div class="relative z-30 flex items-center justify-between w-full h-20">
            <a href="/" class="flex items-center flex-shrink-0 pt-2 mr-6 text-white">
                <x-logo class="rounded-sm w-24 logo" />
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
    class="absolute bg-gray-50 flex flex-col h-50 items-center justify-center origin-center pb-12 pt-24 rounded-b-md shadow-lg space-y-5 text-lg top-0 w-full z-30"
    x-cloak>
    <a @click="showMenu = !showMenu" href="{{ route('about') }}"
        class="block text-gray-900 hover:text-yellow-500">About</a>
    <a @click="showMenu = !showMenu" href="{{ route('news.index') }}"
        class="block text-gray-900 hover:text-yellow-500">News</a>
    <a @click="showMenu = !showMenu" href="{{ route('creative-writing') }}"
        class="block text-gray-900 hover:text-yellow-500">Creative Writing 101</a>
    <a @click="showMenu = !showMenu" href="{{ route('welcome') . '#faq' }}"
        class="block text-gray-900 hover:text-yellow-500">FAQs</a>
    <a @click="showMenu = !showMenu" href="#contact" class="block text-gray-900 hover:text-yellow-500">Contact Us</a>
    <a @click="showMenu = !showMenu" href="{{ route('welcome') . '#entry-form' }}"
        class="block border-2  p-1.5 border-yellow-400 rounded-md text-gray-900 hover:text-yellow-500">Apply
        Online</a>
</div>
<!-- End Mobile Menu -->
