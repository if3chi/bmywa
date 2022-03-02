<div>
    <x-slot name="title">
        {{ __('Submissions') }}
    </x-slot>
    <div class="container p-2 mx-auto grid">
        <div class="flex flex-row flex-auto bg-white dark:bg-gray-800 rounded-t-xl border-l dark:border-gray-600 shadow-xl"
            style="max-height: 87vh;">
            <div class="flex flex-col w-2/6">
                <div class="flex-none h-24 bg-grey-200 border-b-2 -mt-4 p-4 border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl ml-1 mt-2 font-semibold tracking-wide text-gray-700 dark:text-gray-200">
                        {{ __('Submissions List') }}
                    </h2>
                </div>

                <div class="flex-auto overflow-y-auto">
                    <div>
                        @forelse ($entries as $entry)
                            <a href="#" class="block border-b" wire:click="openEntry({{ $entry->id }})">
                                <div
                                    class="border-l-2 {{ $activeEntry == $entry->id ? 'border-yellow-400 bg-yellow-100' : 'bg-yellow-50' }}  hover:bg-yellow-200 p-3 space-y-1">
                                    <div class="flex flex-row items-center space-x-2 text-yellow-800">
                                        <strong class="flex-grow text-sm">{{ $entry->contestant_name }}</strong>
                                        <div class="flex space-x-1">
                                            <div class="text-sm font-medium text-yellow-800">{{ $entry->age }}yrs
                                            </div>
                                            <div
                                                class="text-sm {{ $entry->country == 'ng' ? 'text-green-800 bg-green-100' : 'text-yellow-800 bg-yellow-300' }}  p-1 -m-1 rounded-full">
                                                {{ strtoupper($entry->country) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-row items-center space-x-1 text-yellow-600">
                                        <div class="flex-grow truncate text-xs font-medium tracking-wide">
                                            {{ $entry->title }} </div>
                                        <div class="truncate text-xs font-medium tracking-wide">{{ $entry->category }}
                                        </div>
                                    </div>

                                    <div class="flex flex-row items-center space-x-1 text-yellow-600">
                                        <div class="flex-grow truncate text-xs">{{ $entry->truncated }}</div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <h2
                                class="text-center text-xl my-10 font-semibold tracking-wide text-gray-700 dark:text-gray-200">
                                Nothing Here...
                            </h2>
                        @endforelse
                    </div>

                </div>
            </div>

            <div class="w-4/6 border-l-2 border-gray-200 dark:border-gray-700 flex flex-col">
                <div
                    class="flex-none h-20 flex flex-row justify-between items-center p-5 border-b-2 border-gray-200 text-gray-600 dark:border-gray-700 dark:text-gray-100">
                    <div class="flex flex-col space-y-1">
                        @if ($readingView)
                            <strong>{{ $readingView->title }}</strong>
                            <p class="text-xs tracking-tighter">{{ $readingView->reading_time }}</p>
                        @endif
                    </div>
                    <div class="flex flex-row items-center space-x-1">
                        <a href="#">
                            <x-icon.printer class="w-5 h-5" />
                        </a>
                        <a href="#">
                            <x-icon.send class="w-5 h-5" />
                        </a>
                        <a href="#">
                            <x-icon.share class="w-5 h-5" />
                        </a>
                    </div>
                </div>

                <div class="flex-auto overflow-y-auto p-4 dark:text-gray-100"
                    style="background-image: url(https://static.intercomassets.com/ember/assets/images/messenger-backgrounds/background-1-99a36524645be823aabcd0e673cb47f8.png)">
                    <div class="text-justify text-base p-2" wire:key="{{ $activeEntry }}">
                        @if ($readingView)
                            <div class="mb-4">
                                {!! html_entity_decode($readingView->award_entry) !!}
                            </div>
                            @can(\App\Utilities\Constant::SCORE_ENTRY)
                                <div class="p-4 mt-1 item-center">
                                    <button wire:click.prevent="scoreEntry" type="button"
                                        class="flex items-center cursor-pointer space-x-2 mx-auto justify-between px-4 py-2 text-md font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                                        <x-icon.check-circle class="text-white w-6 h-6" />
                                        <span>Score Entry</span>
                                    </button>
                                </div>
                            @endcan
                        @else
                            <h2
                                class="text-center text-base my-24 font-semibold tracking-wide text-gray-700 dark:text-gray-200">
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
            <div class="mb-4 bg-white rounded-lg dark:bg-gray-800 space-y-1">
                <x-form.input wire:model="entryScore" :error="$errors->first('entryScore')" type="text"
                    placeholder="Enter a Score" label="Score">
                    <x-icon.check-square class="w-4 h-4 mr-3" />
                </x-form.input>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button wire:click="$set('showScoreModal', false)"
                class="w-full px-5 py-3 text-sm font-medium leading-5 dark:text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                Cancel
            </button>
            <button wire:click="setScore"
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                Save
            </button>
        </x-slot>
    </x-modal.form>
</div>
