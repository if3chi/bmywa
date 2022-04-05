<div>
    <x-slot name="title">
        {{ __('Submissions') }}
    </x-slot>
    <div class="container grid p-2 mx-auto">
        <div class="flex flex-row flex-auto bg-white border-l shadow-xl dark:bg-gray-800 rounded-t-xl dark:border-gray-600"
            style="max-height: 87vh;">
            <div class="flex flex-col w-2/6">
                <div
                    class="flex-none h-24 p-2 -mt-4 space-y-3 border-b-2 border-gray-200 bg-grey-200 dark:border-gray-700">
                    <h2 class="mt-2 ml-1 text-xl font-semibold tracking-wide text-gray-700 dark:text-gray-200">
                        {{ __('Submissions List') }}
                    </h2>
                    <div class="flex justify-between text-gray-700 dark:text-gray-200">
                        @canany([\App\Utilities\Constant::SCORE_ENTRY, \App\Utilities\Constant::JUDGE_ENTRY])
                            <button wire:click.prevent="getScoredList" type="button"
                                class="flex items-center cursor-pointer space-x-2 justify-between px-1 py-0.5 text-md font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-green-400 hover:bg-green-500 focus:outline-none focus:shadow-outline-green">
                                <x-icon.menu class="w-6 h-6 text-white" />
                                <span>Scored List</span>
                            </button>
                        @endcanany
                        @can(\App\Utilities\Constant::MANAGE_SITE)
                            <x-dropdown-btn label="Filter" class="h-8">
                                {{-- #TODO: Fix Filter --}}
                                {{-- <a @click.prevent="open = !open; $wire.filterList('\App\Utilities\Constant::ALL')" href=""
                                    class="block text-white-900 hover:text-yellow-500">
                                    All
                                </a> --}}
                                @foreach (entryCountry() as $key => $country)
                                    <a @click.prevent="open = !open; $wire.filterList('{{ $key }}')" href=""
                                        class="block text-white-900 hover:text-yellow-500">
                                        {{ $country }}
                                    </a>
                                @endforeach


                            </x-dropdown-btn>
                        @endcan
                    </div>
                </div>

                <x-entry.list :entries="$entries" :activeEntry="$activeEntry" />
            </div>

            <div class="flex flex-col w-4/6 border-l-2 border-gray-200 dark:border-gray-700">
                <div
                    class="flex flex-row items-center justify-between flex-none h-20 p-5 text-gray-600 border-b-2 border-gray-200 dark:border-gray-700 dark:text-gray-100">
                    <div class="flex flex-col space-y-1">
                        @if ($readingView)
                            <strong>{{ $readingView->title }}</strong>
                            <p class="text-xs tracking-tighter">{{ $readingView->reading_time }}</p>
                        @endif
                    </div>
                    <div class="flex flex-row items-center space-x-1">
                        {{-- <a href="#">
                            <x-icon.printer class="w-5 h-5" />
                        </a>
                        <a href="#">
                            <x-icon.send class="w-5 h-5" />
                        </a>
                        <a href="#">
                            <x-icon.share class="w-5 h-5" />
                        </a> --}}
                        <x-grading.info-modal />
                    </div>
                </div>

                <div class="flex-auto p-4 overflow-y-auto dark:text-gray-100"
                    style="background-image: url(https://static.intercomassets.com/ember/assets/images/messenger-backgrounds/background-1-99a36524645be823aabcd0e673cb47f8.png)">
                    <div class="p-2 text-base text-justify" wire:key="{{ $activeEntry }}">
                        @if ($readingView)
                            <div class="mb-4">
                                {!! html_entity_decode($readingView->award_entry) !!}
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                @canany(\App\Utilities\Constant::SCORE_ENTRY)
                                    <div class="p-4 mt-1 item-center">
                                        <x-admin.score-btn wire:click.prevent="scoreEntry">Score Entry</x-admin.score-btn>
                                    </div>
                                @endcanany
                                @canany(\App\Utilities\Constant::JUDGE_ENTRY)
                                    <div class="p-4 mt-1 item-center">
                                        <x-admin.score-btn wire:click.prevent="judgeEntry">Judge Entry</x-admin.score-btn>
                                    </div>
                                @endcanany
                            </div>
                        @else
                            <h2
                                class="my-24 text-base font-semibold tracking-wide text-center text-gray-700 dark:text-gray-200">
                                No Entry or No Entry Selected...
                            </h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal.form wire:model="showScoreModal">
        <x-slot name="title">{{ $formTitle }}</x-slot>

        <x-slot name="content">
            <div class="mb-4 space-y-1 bg-white rounded-lg dark:bg-gray-800">
                <x-form.input wire:model="entryScore" :error="$errors->first('entryScore')" type="text" placeholder="Enter a Score"
                    label="Score">
                    <x-icon.check-square class="w-4 h-4 mr-3" />
                </x-form.input>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button wire:click="$set('showScoreModal', false)"
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-white dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                Cancel
            </button>
            <button wire:click="{{ $methodName }}"
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                Save
            </button>
        </x-slot>
    </x-modal.form>

    @canany([\App\Utilities\Constant::SCORE_ENTRY, \App\Utilities\Constant::JUDGE_ENTRY])
        <x-modal.form wire:model="showScoredList">
            <x-slot name="title">{{ $formTitle }}</x-slot>

            <x-slot name="content">
                <div class="overflow-y-auto rounded-md h-72">
                    <x-entry.list :entries="$scoredList" :activeEntry="$activeEntry" />
            </x-slot>

            <x-slot name="footer">
                <button wire:click="$set('showScoredList', false)"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-white dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Close
                </button>
            </x-slot>
        </x-modal.form>
    @endcanany
</div>
