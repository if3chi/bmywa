<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blooming Minds Young Writers Award</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <style>
        html {
            /* padding: 0;
            margin: 0;
            overflow-x: hidden; */
            scroll-behavior: smooth;
            font-family: 'Poppins', sans-serif;
        }

        ::-webkit-scrollbar {
            width: .2em;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: rgb(252, 194, 5);
        }

        /* .scroll-page {
            width: 100%;
            height: 100%;
            scroll-behavior: smooth;
        } */


        @keyframes fadeIn {
          0% {
            opacity: 0;
          }

          100% {
            opacity: 1;
          }
        }

        .animate-fadeIn {
          animation: fadeIn 1s ease-in forwards;
        }

    </style>
</head>
<body>

    <section class="relative w-full h-full lg:h-screen bg-no-repeat bg-cover" x-data="{ showMenu: false }" style="background-image: url({{ asset('images/bg.jpg') }});">

        {{-- <div class="absolute inset-0 z-0 h-full bg-blue-900 opacity-10"></div> --}}      

        <!-- Desktop menu -->
            <div class="flex items-center w-full h-20">
                <nav class="hidden w-full md:block" x-show="!showMenu" x-cloak="">
                    <ul class="relative z-10 flex items-center px-6 text-sm text-white lg:text-base">
                        <li class="mx-2 lg:mx-3">
                            <a href="#about" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-medium text-gray-600 hover:text-yellow-500">
                                <span class="block">About</span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform border-t-2 border-yellow-500" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                </span>
                            </a>
                        </li>
                        <li class="mx-2 lg:mx-3">
                            <a href="#_" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-medium text-gray-600 hover:text-yellow-500">
                                <span class="block">News</span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform border-t-2 border-yellow-500" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                </span>
                            </a>
                        </li>
                        <li class="mx-2 lg:mx-3">
                            <a href="#judges" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-medium text-gray-600 hover:text-yellow-500">
                                <span class="block">Judges</span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform border-t-2 border-yellow-500" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                </span>
                            </a>
                        </li>
                        <div class="mx-6"></div>
                        <li class="mx-auto">
                            <a href="/" class="w-1/4 py-4 pl-6 pr-4 md:pl-4 md:py-0">
                                {{-- <span class="text-3xl font-black leading-none text-white select-none logo">tails<span class="text-yellow-500">.</span></span> --}}
                                <img class="rounded-md shadow-sm w-24 logo " src="{{ asset('images/logo-sm.jpg') }}" alt="bmywa logo" srcset="">
                            </a>
                        </li>
                        <li class="mx-2 lg:mx-3">
                            <a href="#faq" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-medium text-gray-600 hover:text-yellow-500">
                                <span class="block">FAQs</span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform border-t-2 border-yellow-500" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                </span>
                            </a>
                        </li>
                        <li class="mx-2 lg:mx-3">
                            <a href="#contact" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-medium text-gray-600 hover:text-yellow-500">
                                <span class="block">Contact</span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform border-t-2 border-yellow-500" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                </span>
                            </a>
                        </li>
                        <li class="mx-2 lg:mx-3">
                            <div x-data="{ isOpen: false }" @mouseenter="isOpen = true" @mouseleave="isOpen = false" class="relative inline-block p-1.5 border-2 hover:transparent border-gray-600 hover:border-yellow-500 shadow-md rounded">
                            <div class="relative z-10 flex items-center cursor-pointer text-sm font-medium text-gray-600 hover:text-yellow-500 focus:outline-none">
                                <span>Apply Online</span>
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
        
                            <div x-show="isOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 z-20 w-full p-3 mt-3 -ml-0 space-y-2 overflow-hidden transform bg-white shadow-lg lg:-ml-24 lg:left-1/2 md:w-32 ring-1 ring-black ring-opacity-5 rounded" style="display: none;">
        
                                <a href="#entry-form" class="block  rounded-md py-3 px-6  text-sm text-gray-700 hover:text-yellow-500 capitalize cursor-pointer hover:bg-yellow-50 hover:font-black">
                                    Ghana
                                </a>
                                <a href="#entry-form" class="block  rounded-md py-3 px-6  text-sm text-gray-700 hover:text-yellow-500 capitalize hover:bg-yellow-50 hover:font-black">
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
                        <a href="#_" class="flex items-center flex-shrink-0 mr-6 text-white">
                            {{-- <span class="text-3xl font-black leading-none text-white select-none logo">tails<span class="text-yellow-500">.</span></span> --}}
                            <img class="rounded-sm shadow-sm w-16 logo " src="{{ asset('images/logo-sm.jpg') }}" alt="bmywa logo" srcset="">
                        </a>
                        <div class="block lg:hidden">
                            <button @click="showMenu = !showMenu" class="flex items-center justify-center w-10 h-10 text-gray-200 rounded-full hover:text-white hover:bg-white hover:bg-opacity-25 focus:outline-none">
                                <svg class="w-5 h-5 text-gray-700" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Menu</title>
                                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </nav>
                <!-- End Mobile Nav -->
            </div>
        
            <!-- Mobile Menu -->
            <div x-show.transition="showMenu" class="absolute top-0 z-20 flex flex-col items-center justify-center w-full h-full space-y-5 text-lg origin-center bg-yellow-500" x-cloak="">
                <a href="#about" class="block text-white hover:text-white">About</a>
                <a href="#_" class="block text-white hover:text-white">News</a>
                <a href="#contact" class="block text-white hover:text-white">Contact</a>
            </div>
            <!-- End Mobile Menu -->
        
            <div class="container flex flex-wrap w-full mx-auto px-5 pb-16 sm:pb-16 lg:pb-24 xl:pb-32">
                <div class=" lg:ml-16 text-gray-800  mt-16 space-y-8 lg:mt-32 xl:mt-34">
                    <div class="space-y-4">
                        {{-- <h1 class="text-3xl font-black sm:w-2/3 sm:text-4xl md:max-w-xl md:text-5xl tracking-wide text-transparent bg-center bg-cover bg-gradient-to-br from-indigo-400 via-indigo-600 to-indigo-500 lg:text-6xl bg-clip-text" style="background-image:url({{ asset('images/scr.png') }})">Blooming Minds <br class="block lg:hidden">Young Writers Award</h1> --}}
                        <h1 class="text-3xl font-black sm:w-2/3 sm:text-4xl md:max-w-xl md:text-5xl tracking-wide">Blooming Minds <br class="block lg:hidden">Young Writers Award</h1>
                        <p class="max-w-sm text-lg text-gray-700 md:max-w-md md:text-xl">Recognising abilities, rewarding achievements..</p>
                    </div>
                    {{-- <button class="w-full px-8 py-3.5 transition duration-300 bg-blue-500 hover:bg-blue-600 shadow text-white font-semibold rounded-lg sm:w-auto">View our services</button> --}}
                    <div class="flex justify-right md:mt-10 transition duration-300">
                        <a href="#" class="rounded-full py-3 px-6 m-2 text-center text-white hover:text-yellow-500 bg-gray-900 border-2 border-gray-900 hover:border-yellow-500 hover:bg-transparent">Ghana</a>
                        <a href="#" class="rounded-full py-3 px-6 m-2 text-center text-white hover:text-yellow-500 bg-gray-900 border-2 border-gray-900 hover:border-yellow-500 hover:bg-transparent">Nigeria</a>
                    </div>
                </div>
                <div class="relative w-full my-auto px-3 md:mb-12 lg:-ml-20 lg:w-1/2 order-0 lg:order-1 lg:mb-10">
                    <img class="absolute top-0 right-0 z-1 hidden mx-auto -mt-32 rounded-lg shadow-2xl opacity-100 xl:-mr-12 sm:max-w-xs lg:max-w-sm lg:block" src="{{ asset('images/banner/banner2.jpg') }}">
                    <img class="relative md:z-20 w-full mx-auto mt-3 rounded-lg shadow-2xl sm:max-w-none lg:-ml-10 lg:max-w-sm" src="{{ asset('images/banner/banner1.jpg') }}" alt="feature image">
                    <img class="absolute bottom-0 right-0 z-1 hidden mx-auto -mb-36  rounded-lg shadow-2xl xl:-mr-12 sm:max-w-xs lg:max-w-sm lg:block" src="{{ asset('images/banner/banner3.jpg') }}">
                </div>
            </div>
        </div>
    </section>

    <!-- About Us -->    
    <section id="about" class="px-2 py-14 bg-white md:px-0 fade-in">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
          <div class="flex flex-wrap items-center sm:-mx-3">
            <div class="w-full md:w-1/2 md:px-3">
              <div class="w-full pb-6 space-y-6 lg:max-w-lg md:space-y-4 lg:space-y-6 xl:space-y-8 sm:pr-5 lg:pr-0 md:pb-0">
                <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl md:text-3xl lg:text-4xl xl:text-5xl">
                  <span class="block xl:inline">Blooming Minds Young Writers</span>
                  <span class="block text-yellow-500 xl:inline">Awards</span>
                </h1>
                <p class="mx-auto text-sm text-justify  text-gray-500  overflow-hidden lg:text-base md:max-w-3xl">is one of many projects run by the Blooming Minds Change Champion Network (BMCCN) founded in 2016. The initiative is aimed at raising young African leaders by recognizing and rewarding children with creative abilities in writing and arts. The awards are held in Ghana and Nigeria. Winners are awarded cash prizes and a possible publishing deal. Children whose stories were shortlisted but did not win, will get the opportunity to attend a creative writing workshop to hone their writing skills.</p>

                <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                  <a href="#entry-form" class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-yellow-600 rounded-md sm:mb-0 hover:bg-yellow-700 sm:w-auto">
                    Submit An Entry
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                  </a>
                  <a href="#_" class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600">
                    Read More
                  </a>
                  <div class="box-border right-0 space-y-2 flex justify-center w-full mt-4 space-x-4 border-solid md:w-auto md:justify-end md:absolute md:mt-0">
                    <a href="https://www.facebook.com/bmyoungwriters/" class="inline-flex items-center pt-1.5 leading-7 text-gray-500 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-yellow-700">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"></path><path d="M7 10v4h3v7h4v-7h3l1-4h-4V8a1 1 0 011-1h3V3h-3a5 5 0 00-5 5v2H7"></path></svg>
                    </a>
                    <a href="https://www.instagram.com/bmywa/" class="inline-flex items-center leading-7 text-gray-500 no-underline border-0 border-gray-200 cursor-pointer hover:text-purple-900 focus-within:text-yellow-700">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"></path><rect x="4" y="4" width="16" height="16" rx="4"></rect><circle cx="12" cy="12" r="3"></circle><path d="M16.5 7.5v.001"></path></svg>
                    </a>
                    <a href="https://twitter.com/bmywa" class="inline-flex items-center leading-7 font-black text-gray-500 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-yellow-700">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"></path><path d="M49,11.096c-1.768,0.784-3.664,1.311-5.658,1.552c2.035-1.22,3.597-3.151,4.332-5.448c-1.903,1.127-4.013,1.947-6.255,2.388c-1.795-1.916-4.354-3.11-7.186-3.11c-5.44,0-9.849,4.409-9.849,9.847c0,0.771,0.088,1.522,0.257,2.244c-8.184-0.412-15.441-4.332-20.299-10.29c-0.848,1.458-1.332,3.149-1.332,4.953c0,3.416,1.735,6.429,4.38,8.197c-1.616-0.051-3.132-0.495-4.46-1.233c0,0.042,0,0.082,0,0.125c0,4.773,3.394,8.748,7.896,9.657c-0.824,0.227-1.694,0.346-2.592,0.346c-0.636,0-1.253-0.062-1.856-0.178c1.257,3.909,4.892,6.761,9.201,6.84c-3.368,2.641-7.614,4.213-12.23,4.213c-0.797,0-1.579-0.044-2.348-0.137c4.356,2.795,9.534,4.425,15.095,4.425c18.114,0,28.022-15.007,28.022-28.016c0-0.429-0.011-0.856-0.029-1.275C46.012,14.807,47.681,13.071,49,11.096z"/></svg>
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
        <div class="flex flex-wrap items-center justify-center px-5 mx-auto md:px-12 md:flex-wrap lg:justify-between max-w-7xl">
            <span class="box-border block w-full mb-5 text-xs font-bold text-center text-gray-500 tracking-widest uppercase lg:w-auto lg:inline lg:mb-0">Our Sponsors</span>
            <div class="box-border inline-flex items-center px-5 py-0 my-2 text-center text-gray-800">
                <img src="{{ asset('images/sponsors/ait.jpeg') }}" alt="Ait logo" class="block object-contain h-12">
            </div>
            <div class="box-border inline-block px-5 py-0 my-2 text-center text-gray-800">
                <img src="{{ asset('images/sponsors/cocowater.jpg') }}" alt="coconut water" class="block object-contain h-9">
            </div>
            <div class="box-border inline-block px-5 py-0 my-2 text-center text-gray-800">
                <img src="{{ asset('images/sponsors/leadway.jpg') }}" alt="leadway" class="block object-contain h-9">
            </div>
            <div class="box-border inline-block px-5 py-0 my-2 text-center text-gray-800">
                <img src="{{ asset('images/sponsors/noname.jpeg') }}" alt="edc" class="block object-contain h-7 lg:h-8">
            </div>
            <div class="box-border inline-block px-5 py-0 my-2 text-center text-gray-800">
                <img src="{{ asset('images/sponsors/starlife.jpeg') }}" alt="starlife" class="block object-contain h-9">
             </div>            
            <div class="box-border inline-block px-5 py-0 my-2 text-center text-gray-800">
                <img src="{{ asset('images/sponsors/bmccn-logo.png') }}" alt="bmccn" class="block object-contain h-9">
             </div>            
        </div>
    </section>

    <div class="border-t border-gray-200"></div>

    <!-- Judges -->
    <section class="w-full py-12 bg-gray-50 lg:py-24">
        <div class="max-w-6xl px-12 mx-auto text-center">
            <div class="space-y-12 md:text-center">
                <div class="max-w-3xl mb-20 space-y-5 sm:mx-auto sm:space-y-4">
                    <h2 class="relative text-4xl font-extrabold tracking-tight sm:text-5xl">Our Judges</h2>
                    <p class="text-xl text-gray-500">We take pride in the people we work with. This is because we all collectively help each other become more awesome every day.</p>
                </div>
            </div>
    
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="w-full border bg-white border-gray-200 rounded-lg shadow-md">
    
                    <div class="flex flex-col items-center justify-center p-4">
                        <img class="w-48 h-48 mb-2 zoom rounded-full" src="{{ asset('images/gh/Nana Brew Hammond.jpg') }}">
                        <h2 class="text-lg text-yellow-500 font-bold">Nana Brew Hammond</h2>
                        <p class="font-medium text-gray-500">International author of ‘Powder Necklace’</p>
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
                        <img class="w-48 h-48 mb-2 zoom rounded-full" src="{{ asset('images/gh/Sylvanus Bedzrah.png') }}">
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
                        <img class="w-48 h-48 mb-2 zoom rounded-full" src="{{ asset('images/gh/ruby-goka-300x211.jpg') }}">
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
                        <img class="w-48 h-48 mb-2 zoom rounded-full" src="{{ asset('images/gh/Gamel Sankarl.jpg') }}">
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
                  <p class="font-bold text-yellow-800 text-xs text-center uppercase">Blooming Minds Young Writers Award Competition Entry</p>
                  <h2 class="text-2xl text-center font-extrabold leading-none text-gray-800 sm:text-3xl md:text-4xl">
                    BMYWA NIGERIA
                  </h2>
                  <p class="text-base text-gray-600 text-justify">The competition runs every year and is open to all kids between the ages of 6-15 years and is grouped as follows:</p>
                  <p class="text-base font-bold pt-2 text-gray-800">CREATIVE WRITING COMPETITION <br><span class="text-sm font-normal text-gray-600">Ages 9-15 – Fiction or Non-Fiction, not more than 500 words.</span> </p>
                  <p class="text-base font-bold pt-2 text-gray-800">SHORT STORIES & POETRY <br><span class="text-sm font-normal text-gray-600">Ages 6-9 – Not more than 300 words.</span> </p>
                  <p class="text-base font-bold pt-2 text-gray-800">BMYWA 2021: <br><span class="text-sm font-normal text-gray-600">Entry Submissions opens  15th Dec 2020 and closes 1st March 2021.</span> </p>
                  <p class="text-sm font-normal pt-2 text-gray-600">Shortlist and Winners will be announced 15th April. Award Ceremony will he held 25th April 2021</p>
                  <p class="text-sm font-normal pt-2 text-gray-600">To enter competition, complete the form <span class="md:hidden">below</span> and insert essay.</p>
                  <p class="text-base font-bold pt-2 text-gray-800">Winning Prizes</p>
                  <ul>
                    <li class="flex items-center py-1 space-x-4 ">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        <span class="font-medium text-gray-700">Category A Winner: N100,000.00</span>
                    </li>
                    <li class="flex items-center py-1 space-x-4 ">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        <span class="font-medium text-gray-700">Category A Runner Up: N80,000.00</span>
                    </li>
                    <li class="flex items-center py-1 space-x-4 ">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        <span class="font-medium text-gray-700">Category B Winner: N50,000.00</span>
                    </li>
                    <li class="flex items-center py-1 space-x-4 ">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        <span class="font-medium text-gray-700">Category B Runner Up: N25,000</span>
                    </li>
                  <p class="text-base font-normal pt-2 text-gray-900 text-justify">Additional giveaways: Tablets and School Supplies</p>
              </div>
    
              <div class="w-full  mt-16 md:mt-0 md:w-50">
                  <div class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-yellow-100 rounded-lg shadow-lg px-7">
                      <h3 class="mb-6 text-2xl font-medium text-center">Submit your entry</h3>
                      <div class="relative mb-6">
                        <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">First Name</label>
                        <input type="text" class="block w-full p-3 mt-2 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300" placeholder="Ama">
                      </div>
                      <div class="relative mb-6">
                        <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Last Name</label>
                        <input type="text" class="block w-full p-3 mt-2 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300" placeholder="Kwaku">
                      </div>
                      <div class="relative mb-6">
                        <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Email Address</label>
                        <input type="email" class="block w-full p-3 mt-2 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300" placeholder="AmaKwaku@gmail.com">
                      </div>
                      <div class="relative mb-6">
                        <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Phone</label>
                        <input type="phone" class="block w-full p-3 mt-2 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300" placeholder="0201234567">
                      </div>
                      <div class="flex flex-row mb-6 w-full">
                        <div class="relative">
                          <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Age</label>
                          <input type="number" class="block w-full p-3 mt-0 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300" placeholder="7">
                        </div>
                        <div class="relative">
                          <label class="absolute px-2 ml-4 -mt-3 font-medium text-gray-600 bg-white">Entry Fee Ref</label>
                          <input type="text" class="block w-full ml-2 p-3 mt-0 text-xs placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300" placeholder="02#4567">
                        </div>
                      </div>
                      <div class="mb-6">
                        <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Entry Type</label>
                        <select class="block w-full p-3 mt-2 mb-2 text-xs text-gray-400 bg-white border-2 border-yellow-100 tracking-wider font-light rounded-md focus:ring focus:outline-none focus:ring-yellow-300" placeholder="02#4567">
                          <option class="text-base" value="">Creative Writing</option>
                          <option class="text-base" value="">Short Story & Poerty</option>
                        </select>
                      </div>
                      <div class="relative mb-6">
                        <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Award Entry</label>
                        <textarea type="text" class="block w-full h-32  p-2 mt-6 text-sm placeholder-gray-300 tracking-wider font-light  bg-white border-2 border-yellow-100 rounded-md focus:ring focus:outline-none focus:ring-yellow-300" placeholder="Please paste your creative writing or short story/poetry entry here. (Creative Writing: 500 words max, Short Story & Poetry: 300 words max.)"></textarea>
                      </div>
                      <div class="block">
                          <button class="w-full px-3 py-4 mt-4 font-medium text-white bg-yellow-300 rounded-lg">Submit</button>
                      </div>
                      <p class="w-full mt-4 text-sm text-center text-gray-500">Wrong Country? <a href="#_" class="text-yellow-500 underline">Switch here</a></p>
                  </div>
              </div>
    
          </div>
      </div>
    </section>

     <!-- FAQs -->
     <section id="faq" class="py-24 bg-gray-50 fade-in">
        <div class="max-w-4xl px-8 mx-auto lg:px-16">
            <h2 class="mb-2 text-xl font-bold text-center md:text-3xl">Frequently Asked Questions</h2>
      
            <div class="relative mt-12 space-y-5">
                <!-- Question 1 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>How can I enter the competition?</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="">Pick up an entry forms from participating schools or enter online. Alternatively submit by email to info@bmywa.com or request a copy of the entry form.</p>
                </div>
      
                <!-- Question 2 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>How do I know if I won?</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="">Winners will be notified by phone, email and text with details provided on the entry forms</p>
                </div>
      
                <!-- Question 3 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>Should my essay be typed or handwritten?</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="">Preferably typed essays, however hand written essays MUST be readable to increase your chance to win.</p>
                </div>
      
                 <!-- Question 4 -->
                 <div x-data="{ show: false }" class="relative overflow-hidden border-2 border-gray-200 rounded-lg select-none hover:bg-white">
                    <h4 @click="show=!show" class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                        <span>How are the essays judged?</span>
                        <svg class="w-6 h-6 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-45' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </h4>
                    <p class="pt-0 -mt-2 text-gray-400 sm:text-lg py-7 px-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-out hidden duration-200" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="">We have 3 judges who are indigenous writers with  expertise to review each essays. Essays are marked based on character, plot, originality, grammar, setting.</p>
                </div>
            </div>
      
        </div>
      </section>
      
    <!-- Contact Us -->
    <section id="contact" class="w-full bg-white fade-in">

        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col lg:flex-row">
                <div class="relative w-full bg-cover lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-white via-white to-gray-100">
                    <div class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                        <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                            <div class="relative">
                                <p class="mb-2 font-medium text-gray-700 uppercase">Ghana</p>
                                <h2 class="text-5xl font-bold text-gray-900 xl:text-6xl">Contact Us</h2>
                            </div>
                            <p class="text-base text-gray-800 md:pr-16">Address: <br><span class="text-sm text-gray-600">Avery Scott Complex C470 26, Abotsi Street, East Legon. Accra Ghana.</span> </p>
                            <p class="text-base text-gray-800 md:pr-16">Tel: <br><span class="text-sm text-gray-600">+233-263-433368 <br> +233 – 543 – 807829</span> </p>
                            <a href="#entry-form" class="inline-block px-3 py-4 text-xl font-medium tracking-wide text-center text-white transition duration-200 bg-yellow-400 rounded-lg hover:bg-yellow-500 ease">Submit An Entry</a>
                        </div>
                    </div>
                </div>

                <div class="w-full bg-white lg:w-6/12 xl:w-5/12">
                    <div class="flex flex-col items-start justify-start w-full h-full p-10 lg:p-16 xl:p-24">
                        {{-- <h4 class="w-full text-3xl font-bold">Signup</h4>
                        <p class="text-lg text-gray-500">or, if you have an account you can <a href="#_" class="text-blue-600 underline">sign in</a></p> --}}
                        <div class="relative w-full mt-10 space-y-8">
                            <div class="relative">
                                <label class="font-medium text-gray-900">Name</label>
                                <input type="text" class="block w-full p-3 mt-2 text-xl placeholder-gray-400 border-2 border-yellow-100 rounded-lg focus:outline-none focus:ring-4 focus:ring-yellow-600 focus:ring-opacity-50" placeholder="Enter Your Name">
                            </div>
                            <div class="relative">
                                <label class="font-medium text-gray-900">Email</label>
                                <input type="text" class="block w-full p-3 mt-2 text-xl placeholder-gray-400 border-2 border-yellow-100 rounded-lg focus:outline-none focus:ring-4 focus:ring-yellow-600 focus:ring-opacity-50" placeholder="Enter Your Email Address">
                            </div>
                            <div class="relative">
                                <label class="font-medium text-gray-900">Message</label>
                                <textarea type="password" class="block w-full p-5 mt-2 text-xl placeholder-gray-400 border-2 border-yellow-100 rounded-lg focus:outline-none focus:ring-4 focus:ring-yellow-600 focus:ring-opacity-50" placeholder="message"></textarea>
                            </div>
                            <div class="relative">
                                <a href="#_" class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-yellow-400 rounded-lg hover:bg-yellow-500 ease">Send Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
   
    <!-- Footer -->
    <section class="box-border pt-5 leading-7 bg-gray-900 text-white border-0 border-gray-200 border-solid pb-7 fade-in">
        <div class="box-border px-4 mx-auto border-solid md:px-6 lg:px-8 max-w-7xl">
            <div class="relative flex flex-col items-start justify-between leading-7 text-gray-900 border-0 border-gray-200 md:flex-row md:items-center">
                <a href="#_" class="left-0 flex items-center justify-center order-first w-full mb-4 font-medium text-gray-900 md:justify-start md:absolute md:w-64 lg:order-none lg:w-auto title-font lg:items-center lg:justify-center md:mb-0">
                    {{-- <span class="text-xl font-black leading-none text-gray-900 select-none logo">tails<span class="text-indigo-600">.</span></span> --}}
                    <img class="rounded-sm shadow-sm w-14 logo " src="{{ asset('images/logo-sm.jpg') }}" alt="bmywa logo" srcset="">
                </a>
                <ul class="box-border flex mx-auto my-6  lg:space-x-6">
                    <li class="relative mt-2 leading-7 text-left text-white border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="/" class="box-border items-center block w-full px-2 md:pd-4 text-base font-normal leading-normal text-white no-underline border-solid cursor-pointer hover:text-yellow-600 focus-within:text-yellow-700 sm:px-0 sm:text-left">Home</a>
                    </li>
                    <li class="relative mt-2 leading-7 text-left text-white border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="#_" class="box-border items-center block w-full px-2 md:pd-4 text-base font-normal leading-normal text-white no-underline border-solid cursor-pointer hover:text-yellow-600 focus-within:text-yellow-700 sm:px-0 sm:text-left">About</a>
                    </li>
                    <li class="relative mt-2 leading-7 text-left text-white border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="#_" class="box-border items-center block w-full px-2 md:pd-4 text-base font-normal leading-normal text-white no-underline border-solid cursor-pointer hover:text-yellow-600 focus-within:text-yellow-700 sm:px-0 sm:text-left">News</a>
                    </li>
                    <li class="relative mt-2 leading-7 text-left text-white border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="#_" class="box-border items-center block w-full px-2 md:pd-4 text-base font-normal leading-normal text-white no-underline border-solid cursor-pointer hover:text-yellow-600 focus-within:text-yellow-700 sm:px-0 sm:text-left">Terms</a>
                    </li>
                </ul>
                <div class="box-border right-0 flex justify-center w-full mt-4 space-x-3 border-solid md:w-auto md:justify-end md:absolute md:mt-0">
                    <a href="#_" class="inline-flex items-center leading-7 text-white no-underline border-0 border-gray-200 cursor-pointer hover:text-yellow-700 focus-within:text-yellow-700">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"></path><path d="M7 10v4h3v7h4v-7h3l1-4h-4V8a1 1 0 011-1h3V3h-3a5 5 0 00-5 5v2H7"></path></svg>
                    </a>
                    <a href="#_" class="inline-flex items-center leading-7 text-white no-underline border-0 border-gray-200 cursor-pointer hover:text-yellow-700 focus-within:text-yellow-700">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"></path><rect x="4" y="4" width="16" height="16" rx="4"></rect><circle cx="12" cy="12" r="3"></circle><path d="M16.5 7.5v.001"></path></svg>
                    </a>
                    <a href="https://twitter.com/bmywa" class="inline-flex items-center leading-7 font-black text-white no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-yellow-700">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"></path><path d="M49,11.096c-1.768,0.784-3.664,1.311-5.658,1.552c2.035-1.22,3.597-3.151,4.332-5.448c-1.903,1.127-4.013,1.947-6.255,2.388c-1.795-1.916-4.354-3.11-7.186-3.11c-5.44,0-9.849,4.409-9.849,9.847c0,0.771,0.088,1.522,0.257,2.244c-8.184-0.412-15.441-4.332-20.299-10.29c-0.848,1.458-1.332,3.149-1.332,4.953c0,3.416,1.735,6.429,4.38,8.197c-1.616-0.051-3.132-0.495-4.46-1.233c0,0.042,0,0.082,0,0.125c0,4.773,3.394,8.748,7.896,9.657c-0.824,0.227-1.694,0.346-2.592,0.346c-0.636,0-1.253-0.062-1.856-0.178c1.257,3.909,4.892,6.761,9.201,6.84c-3.368,2.641-7.614,4.213-12.23,4.213c-0.797,0-1.579-0.044-2.348-0.137c4.356,2.795,9.534,4.425,15.095,4.425c18.114,0,28.022-15.007,28.022-28.016c0-0.429-0.011-0.856-0.029-1.275C46.012,14.807,47.681,13.071,49,11.096z"/></svg>
                    </a>
                </div>
            </div>
            <div class="pt-4 mt-4 leading-7 text-center text-gray-600 border-t border-gray-200 md:mt-5 md:pt-5">
                <p class="box-border mt-0 text-sm border-0 border-solid">
                    © 2021 Bmywa. All Rights Reserved.
                </p>
            </div>
        </div>
    </section>

<!-- AlpineJS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>

<script>
  const callback = function (entries) {
  entries.forEach((entry) => {
    console.log(entry);

    if (entry.isIntersecting) {
      entry.target.classList.add("animate-fadeIn");
    } else {
      entry.target.classList.remove("animate-fadeIn");
    }
  });
};

const observer = new IntersectionObserver(callback);

const targets = document.querySelectorAll(".fade-in");
targets.forEach(function (target) {
  target.classList.add("opacity-0");
  observer.observe(target);
});

</script>

</body>
</html>