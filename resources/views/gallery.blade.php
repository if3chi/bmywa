<x-front-layout>
    <x-slot name="title">
        Our Gallery - BMYWA
    </x-slot>

    <x-slot name="hero">
        <x-front.banner class="bg-gray-50 fade-in mb-2">
            <div class="w-full h-48 md:h-56 my-4 drop-shadow-2xl">
                <div id="carouselExampleCrossfade" class="carousel slide carousel-fade relative rounded-md"
                    data-bs-ride="carousel">
                    <div class="carousel-inner relative w-full overflow-hidden">
                        @foreach ($photos as $photo)
                            <div class="carousel-item h-48 md:h-64 active relative float-left w-full bg-center bg-cover"
                                style="background-position: 50%; background-image: url({{ $photo->url }});">
                                <div
                                    class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed bg-black opacity-75">
                                </div>
                                <div class="carousel-caption md:block absolute text-center">
                                    <h5 class="text-2xl font-bold text-yellow-100 mb-2">Welcome to our Gallery</h5>
                                    <p class="text-sm tracking-wide font-medium">Enjoy the Scenery</p>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="carousel-item h-48 md:h-64 active relative float-left w-full bg-center bg-cover"
                            style="background-position: 50%; background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');">
                            <div
                                class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed bg-black opacity-75">
                            </div>
                            <div class="carousel-caption md:block absolute text-center">
                                <h5 class="text-2xl font-bold text-yellow-100 mb-2">First slide label</h5>
                                <p class="text-sm tracking-wide font-medium">Some representative placeholder content for
                                    the first slide.</p>
                            </div>
                        </div>


                        <div class="carousel-item rounded-lg h-48 md:h-64 relative float-left w-full bg-center bg-cover"
                            style="background-position: 50%; background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/042.webp');">
                            <div
                                class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed bg-black opacity-75">
                            </div>
                            <div class="carousel-caption md:block absolute text-center">
                                <h5 class="text-2xl font-bold text-yellow-100 mb-2">Second slide label</h5>
                                <p class="text-sm tracking-wide font-medium">Some representative placeholder content for
                                    the second slide.</p>
                            </div>
                        </div>


                        <div class="carousel-item rounded-lg h-48 md:h-64 relative float-left w-full bg-center bg-cover"
                            style="background-position: 50%; background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/043.webp');">
                            <div
                                class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed bg-black opacity-75">
                            </div>
                            <div class="carousel-caption md:block absolute text-center">
                                <h5 class="text-2xl font-bold text-yellow-100 mb-2">Third slide label</h5>
                                <p class="text-sm tracking-wide font-medium">Some representative placeholder content for
                                    the Third slide.</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </x-front.banner>
    </x-slot>

    <section class="overflow-hidden text-gray-700 md:pt-8">
        <livewire:front.gallery-component />
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
