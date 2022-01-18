<!-- Footer -->
<section class="box-border pt-5 leading-7 bg-gray-900 text-white border-0 border-gray-200 border-solid pb-7 fade-in">
    <div class="box-border px-4 mx-auto border-solid md:px-6 lg:px-8 max-w-7xl">
        <div
            class="relative flex flex-col items-start justify-between leading-7 text-gray-900 border-0 border-gray-200 md:flex-row md:items-center">
            <a href="/"
                class="left-0 flex items-center justify-center order-first w-full mb-4 font-medium text-gray-900 md:justify-start md:absolute md:w-64 lg:order-none lg:w-auto title-font lg:items-center lg:justify-center md:mb-0">
                <img class="rounded-sm shadow-sm w-14 logo " src="{{ asset('images/logo.jpg') }}" alt="bmywa logo"
                    srcset="">
            </a>
            <ul class="box-border flex mx-auto my-6 md:space-x-4 lg:space-x-6">
                <li class="relative mt-2 leading-7 text-left text-white border-0 border-gray-200 md:border-b-0 md:mt-0">
                    <a href="{{ route('about') }}"
                        class="box-border items-center block w-full px-2 md:pd-4 text-base font-normal leading-normal text-white no-underline border-solid cursor-pointer hover:text-yellow-600 focus-within:text-yellow-700 sm:px-0 sm:text-left">About</a>
                </li>
                <li class="relative mt-2 leading-7 text-left text-white border-0 border-gray-200 md:border-b-0 md:mt-0">
                    <a href="#_"
                        class="box-border items-center block w-full px-2 md:pd-4 text-base font-normal leading-normal text-white no-underline border-solid cursor-pointer hover:text-yellow-600 focus-within:text-yellow-700 sm:px-0 sm:text-left">News</a>
                </li>
                <li class="relative mt-2 leading-7 text-left text-white border-0 border-gray-200 md:border-b-0 md:mt-0">
                    <a href="{{ route('creative-writing') }}"
                        class="box-border items-center block w-full px-2 md:pd-4 text-base font-normal leading-normal text-white no-underline border-solid cursor-pointer hover:text-yellow-600 focus-within:text-yellow-700 sm:px-0 sm:text-left">Creative Writing 101</a>
                </li>
                <li class="relative mt-2 leading-7 text-left text-white border-0 border-gray-200 md:border-b-0 md:mt-0">
                    <a href="#_"
                        class="box-border items-center block w-full px-2 md:pd-4 text-base font-normal leading-normal text-white no-underline border-solid cursor-pointer hover:text-yellow-600 focus-within:text-yellow-700 sm:px-0 sm:text-left">Terms</a>
                </li>
            </ul>
            <div
                class="box-border right-0 flex justify-center w-full mt-4 space-x-3 border-solid md:w-auto md:justify-end md:absolute md:mt-0">
                <a href="https://www.facebook.com/bmyoungwriters/"
                    class="inline-flex items-center leading-7 text-white no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-yellow-700">
                    <x-icon.facebook />
                </a>
                <a href="https://www.instagram.com/bmywa/"
                    class="inline-flex items-center leading-7 text-white no-underline border-0 border-gray-200 cursor-pointer hover:text-yellow-700 focus-within:text-yellow-700">
                    <x-icon.instagram />
                </a>
                <a href="https://twitter.com/bmywa"
                    class="inline-flex items-center leading-7 font-black text-white no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-yellow-700">
                    <x-icon.twitter />
                </a>
            </div>
        </div>
        <div class="pt-4 mt-4 leading-7 text-center text-gray-600 border-t border-gray-200 md:mt-5 md:pt-5">
            <p class="box-border mt-0 text-sm border-0 border-solid content-between">
                Crafted with
                <x-icon.heart class="h-4 w-4 text-red-500 inline mb-0.5" />
                © {{ date('Y') }} Bmywa. All Rights Reserved.
            </p>
        </div>
    </div>
</section>
