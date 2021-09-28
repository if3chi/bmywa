<x-front-layout>
    <x-slot name="title">
        Preview Submission - BMYWA
    </x-slot>
    <x-slot name="hero">
        <x-front.banner class="bg-gray-50 fade-in">
            <div class="px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
                <div class="w-11/12 lg:w-4/6 mx-auto">
                    <div class="bg-white px-4 py-6 sm:rounded-lg sm:px-6">
                        <div class="sm:flex sm:justify-between sm:items-baseline">
                            <h3 class="text-base font-medium">
                                <span class="text-gray-900">{{ $entry->title }}</span>
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 whitespace-nowrap sm:mt-0 sm:ml-3">
                                <time datetime="2021-01-27T16:35">{{ $entry->date_submitted }}</time>
                            </p>
                        </div>
                        <div class="mt-4 space-y-6 text-sm text-gray-800">
                            <p>{!!  html_entity_decode($entry->award_entry) !!}</p>
                            <p><strong style="font-weight: 600;">{{ $entry->contestant_name }}</strong><br>{{ $entry->submission_country }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-front.banner>
    </x-slot>
</x-front-layout>
