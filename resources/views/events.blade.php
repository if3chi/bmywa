<x-front-layout>
    <x-slot name="title">
        Events - BMYWA
    </x-slot>

    <x-slot name="hero">
        <x-front.banner class="mb-2 bg-gray-50 fade-in">
            <div class="w-full h-48 my-4 md:h-56 drop-shadow-2xl">
                <div id="carouselExampleCrossfade" class="relative rounded-md carousel slide carousel-fade"
                    data-bs-ride="carousel">
                    <div class="relative w-full overflow-hidden carousel-inner">
                        <div class="relative float-left w-full h-48 bg-center bg-cover carousel-item md:h-64 active"
                            style="background-position: 50%; background-image: url({{ asset('images/flyer.jpeg') }});">
                            <div
                                class="absolute top-0 bottom-0 left-0 right-0 w-full h-full overflow-hidden bg-fixed bg-black opacity-75">
                            </div>
                            <div class="absolute text-center carousel-caption md:block">
                                <h5 class="mb-2 text-2xl font-bold text-yellow-100">BMYWA Awards</h5>
                                <p class="text-sm font-medium tracking-wide">Blooming Minds Kids Runway Fashion Show 2022
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-front.banner>
    </x-slot>

    <!-- Ticket Cards -->
    <div class="relative px-4 pt-16 pb-20 bg-gray-50 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3"></div>
        </div>
        <div class="relative mx-auto max-w-7xl">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Upcoming Events</h2>
                <p class="max-w-2xl mx-auto mt-3 text-xl text-gray-500 sm:mt-4">Select your ticket</p>
            </div>
            <div class="grid max-w-lg gap-5 mx-auto mt-12 lg:grid-cols-4 lg:max-w-none">
                <x-front.ticket-card link="https://flutterwave.com/pay/vf4defmntweb" country="Nigeria" day="24"
                    location="Oriental Hotel, Lagos">
                    Single ticket - Admits 1
                </x-front.ticket-card>
                <x-front.ticket-card link="https://flutterwave.com/pay/tdxroc6ga9jy" country="Nigeria" day="24"
                    location="Oriental Hotel, Lagos">
                    Family ticket - Admits 4
                </x-front.ticket-card>

                <x-front.ticket-card link="https://flutterwave.com/pay/drd8zjoxub1l">
                    Single ticket - Admits 1
                </x-front.ticket-card>
                <x-front.ticket-card link="https://flutterwave.com/pay/2stduldjibd3">
                    Family ticket - Admits 4
                </x-front.ticket-card>
            </div>
        </div>
    </div>

    <!-- Contact Us -->
    <section id="contact" class="w-full bg-white fade-in">
        <livewire:front.contact-us />
    </section>

</x-front-layout>
