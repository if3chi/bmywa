<x-front-layout>
    <x-slot name="title">
        About - BMYWA
    </x-slot>
    <x-slot name="hero">
        <x-front.banner class="bg-gray-50 fade-in">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="pt-12 sm:pt-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-4xl mx-auto text-center">
                        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                            Blooming Minds Young Writers Awards
                        </h2>
                        <p class="mt-3 text-xl text-gray-500 sm:mt-4">
                            Recognising abilities, rewarding achievements..
                        </p>
                    </div>
                </div>
                <div class="mt-10 pb-4 bg-white sm:pb-10">
                    <div class="relative">
                        <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="max-w-4xl mx-auto">
                                <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                                    <div
                                        class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                            Founded
                                        </dt>
                                        <dd class="order-1 text-xl font-extrabold text-yellow-400">
                                            2016
                                        </dd>
                                    </div>
                                    <div
                                        class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                            Delivery
                                        </dt>
                                        <dd class="order-1 text-xl font-extrabold text-yellow-400">
                                            24/7
                                        </dd>
                                    </div>
                                    <div
                                        class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                            Calories
                                        </dt>
                                        <dd class="order-1 text-xl font-extrabold text-yellow-400">
                                            100k
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </x-front.banner>
    </x-slot>

    <div class="bg-white overflow-hidden fade-in">
        <div class="relative max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="hidden lg:block bg-gray-50 absolute top-0 bottom-0 left-3/4 w-screen"></div>
            <div class="mt-8 lg:grid lg:grid-cols-2 lg:gap-8">
                <div class="relative lg:row-start-1 lg:col-start-2">
                    <svg class="hidden lg:block absolute top-0 right-0 -mt-20 -mr-20" width="404" height="384"
                        fill="none" viewBox="0 0 404 384" aria-hidden="true">
                        <defs>
                            <pattern id="de316486-4a29-4312-bdfc-fbce2132a2c1" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#de316486-4a29-4312-bdfc-fbce2132a2c1)" />
                    </svg>
                    <div class="relative text-base mx-auto max-w-prose lg:max-w-none">
                        <figure>
                            <div class="aspect-w-12 aspect-h-7 lg:aspect-none">
                                <img class="rounded-lg shadow-lg object-cover object-center"
                                    src="https://images.unsplash.com/photo-1546913199-55e06682967e?ixlib=rb-1.2.1&auto=format&fit=crop&crop=focalpoint&fp-x=.735&fp-y=.55&w=1184&h=1376&q=80"
                                    alt="Whitney leaning against a railing on a downtown street" width="1184"
                                    height="1376">
                            </div>
                            <figcaption class="mt-3 flex text-sm text-gray-500">
                                <x-icon.camera />
                                <span class="ml-2">Photograph by BMYWA</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="mt-8 lg:mt-0">
                    <div class="text-lg max-w-prose mx-auto pb-4">
                        <h1>
                            <span
                                class="mt-2 pb-6 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">About
                                Us</span>
                        </h1>
                        <p class="mt-0 text-xl text-gray-500 leading-8 text-justify"> <span
                                class="font-extrabold text-xl">Blooming Minds Young Writers Awards</span> is one of many
                            projects run by the Blooming Minds Change Champion Network (BMCCN) founded in 2016. The initiative
                            is aimed at raising young African leaders by recognizing and rewarding children with creative
                            abilities in writing and arts. The awards are held in Ghana and Nigeria. Winners are awarded cash
                            prizes and a possible publishing deal. <span id="readmore"> Children whose stories were shortlisted 
                            but did not win, will get the opportunity to attend a creative writing workshop to hone their writing skills.</span> </p>
                    </div>
                    <div class="text-lg max-w-prose mx-auto">
                        <p class="mt-2 text-xl text-gray-500 leading-8 text-justify">Our mission is to equip and strengthen our
                            youth community by nurturing a writing culture, promoting literacy development and providing a
                            platform for children to be imaginative and expressive. Inspiring young children to recognise that
                            it is possible to control their own narratives by appreciating the rich African culture whilst
                            laying the foundation for their future.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQs -->
    <section id="faq" class="py-24 bg-gray-50 fade-in">
        <x-faq-group />
    </section>

     <!-- Contact Us -->
     <section id="contact" class="w-full bg-white fade-in">
        <x-contact />
    </section>

</x-front-layout>
