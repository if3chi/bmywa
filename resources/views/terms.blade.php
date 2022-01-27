<x-front-layout>
    <x-slot name="title">
        Terms & Conditions - BMYWA
    </x-slot>

    <x-slot name="hero">
        <x-front.banner class="bg-gray-50 fade-in" />
    </x-slot>

    <!-- Terms & Conditions -->
    <div class="relative py-16 bg-white overflow-hidden font-serif z-neg-99">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none"
                    viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20"
                            patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404"
                    height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20"
                            patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
                <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none"
                    viewBox="0 0 404 384">
                    <defs>
                        <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20"
                            patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                </svg>
            </div>
        </div>
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <h1>
                    <span
                        class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Terms
                        & Conditions</span>
                </h1>
            </div>
            <div class="mt-6 prose prose-yellow prose-lg text-gray-500 mx-auto">
                <ul role="list">
                    <li> Entrants cannot win more than one prize in any one year. The award of all or any of the prizes
                        lies solely within the discretion of the judges. The judges’ decision will be final</li>
                    <li>Essays should be submitted via the online form provided on the website.</li>
                    <li>The essay must be the sole creation and original work of the entrant. The essay must not have
                        been submitted to this or any other essay competition in previous years.</li>
                    <li> Entrants grant the organisers of the Blooming Minds Young Writers and Achievers awards the
                        right to publish or reproduce at any time all or part of the award-winning entries.</li>
                </ul>
                <p class="italic">BMYWA</p>
            </div>
        </div>
    </div>

    <!-- FAQs -->
    <section id="faq" class="py-24 bg-gray-50 fade-in">
        <x-faq-group />
    </section>

    <!-- Contact Us -->
    <section id="contact" class="w-full bg-white fade-in">
        <livewire:front.contact-us />
    </section>

</x-front-layout>
