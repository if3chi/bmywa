@props(['country' => false])

<div class="w-full space-y-2 md:w-3/5  md:pr-16 md:mt-16 text-justify">
    <p class="font-bold text-yellow-800 text-xs text-center uppercase">Blooming Minds Young Writers
        Award
        Competition Entry</p>
    <h2 class="text-2xl text-center font-extrabold uppercase leading-none text-gray-800 sm:text-3xl">
        BMYWA {{ $country }}
    </h2>
    <p class="text-base text-gray-600 text-justify">The competition runs every year and is open to all
        kids
        between the ages of 6-15 years and is grouped as follows:</p>

    <p class="text-base font-bold pt-2 text-gray-800">ESSAY WRITING COMPETITION <br><span
            class="text-sm font-normal text-gray-600">Ages 14-15 – Fiction or Non-Fiction, not more than
            600
            words.</span> </p>

    <p class="text-base font-bold pt-2 text-gray-800">CREATIVE WRITING COMPETITION <br><span
            class="text-sm font-normal text-gray-600">Ages 10-13 – Fiction or Non-Fiction, not more than
            500
            words.</span> </p>

    <p class="text-base font-bold pt-2 text-gray-800">SHORT STORIES & POETRY <br><span
            class="text-sm font-normal text-gray-600">Ages 6-9 – Not more than 300 words.</span> </p>

    <p class="text-base font-bold pt-2 text-gray-800">BMYWA {{ entrySchedule('entryYear') }}: <br><span
            class="text-sm font-normal text-gray-600">Entry Submissions opens {{ entrySchedule('openDate') }} and
            closes {{ entrySchedule('closeDate') }}.</span> </p>

    {{-- <p class="text-sm font-normal pt-2 text-gray-600">Shortlist and Winners will be announced
        {{ entrySchedule('shortlistDate') }}.
        Award Ceremony will he held {{ entrySchedule('awardDate') }}</p> --}}

    <p class="text-sm font-normal pt-2 text-gray-600">To enter competition, complete the form <span
            class="md:hidden">below</span> and insert essay.</p>

    {{ $slot }}
</div>
