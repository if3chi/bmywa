<div>
    <x-slot name="title">
        {{ __('ShortLists') }}
    </x-slot>
    <div class="container grid p-2 mx-auto">
        <div class="flex flex-row flex-auto bg-white border-l shadow-xl dark:bg-gray-800 rounded-t-xl dark:border-gray-600"
            style="max-height: 87vh;">
            <div class="flex flex-col w-2/6">
                <div
                    class="flex-none h-24 p-2 -mt-4 space-y-3 border-b-2 border-gray-200 bg-grey-200 dark:border-gray-700">
                    <h2 class="mt-2 ml-1 text-xl font-semibold tracking-wide text-gray-700 dark:text-gray-200">
                        {{ __('Short Listed') }}
                    </h2>
                    <div class="flex justify-between text-gray-700 dark:text-gray-200">
                        <div>
                            <h2 class="px-1 text-gray-800 dark:text-gray-200">
                                {{ $country }} List
                            </h2>
                        </div>
                        @can(\App\Utilities\Constant::MANAGE_SITE)
                            <x-dropdown-btn label="Filter" class="h-8">
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

                <div class="flex-auto overflow-y-auto">
                    <div>
                        @forelse ($entries as $entry)
                            @php
                                if ($entry->score && $activeEntry == $entry->id) {
                                    $cardClasses = 'border-green-400 bg-green-200 hover:bg-green-300';
                                } elseif ($entry->score) {
                                    $cardClasses = 'bg-green-100 hover:bg-green-300';
                                } else {
                                    $cardClasses = $activeEntry == $entry->id ? 'border-yellow-400 bg-yellow-100 hover:bg-yellow-200' : 'bg-yellow-50 hover:bg-yellow-200';
                                }
                            @endphp

                            <a href="#" class="block border-b" wire:click="composeMsg({{ $entry }})">
                                <div class="border-l-2 {{ $cardClasses }} p-3 space-y-1">
                                    <div class="flex flex-row items-center space-x-2 text-gray-700">
                                        <strong
                                            class="flex-grow text-sm truncate">{{ $entry->contestant_name }}</strong>
                                        <div class="flex space-x-1">
                                            <div class="text-sm font-medium text-gray-700">{{ $entry->age }}yrs
                                            </div>
                                            <div
                                                class="text-sm {{ $entry->country == 'ng' ? 'text-green-800 bg-green-200' : 'text-yellow-800 bg-yellow-300' }}  p-1 -m-1 rounded-full">
                                                {{ strtoupper($entry->country) }}
                                            </div>
                                            <div class="mx-1">
                                                | <span class="bg-green-700 text-white px-0.5 rounded-sm">
                                                    {{ $entry->grade->score }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-row items-center space-x-1 text-gray-600">
                                        <div class="flex-grow text-xs font-medium tracking-wide truncate">
                                            {{ $entry->title }} </div>
                                        <div class="text-xs font-medium tracking-wide truncate">
                                            {{ $entry->category }} </div>
                                    </div>
                                    <div class="flex flex-row items-center space-x-1 text-gray-600">
                                        <div class="flex-grow text-xs truncate">{{ $entry->truncated }}</div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <h2
                                class="my-10 text-xl font-semibold tracking-wide text-center text-gray-700 dark:text-gray-200">
                                Nothing Here...
                            </h2>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-4/6 border-l-2 border-gray-200 dark:border-gray-700">
                <div
                    class="flex flex-row items-center justify-between flex-none h-20 p-5 text-gray-600 border-b-2 border-gray-200 dark:border-gray-700 dark:text-gray-100">
                    <div class="flex flex-col space-y-1">
                        @if ($readingView)
                            <h1 class="font-semibold tracking-tighter text-md">Compose Message</h1>
                            <strong class="text-xs font-medium tracking-tighter">{{ $readingView['title'] }} - <span
                                    class="text-sm font-semibold">{{ $readingView['school'] }}</span></strong>
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
                        {{-- <x-grading.info-modal /> --}}
                    </div>
                </div>

                <div class="flex-auto p-4 overflow-y-auto dark:text-gray-100"
                    style="background-image: url(https://static.intercomassets.com/ember/assets/images/messenger-backgrounds/background-1-99a36524645be823aabcd0e673cb47f8.png)">
                    <div class="p-2 text-base text-justify" wire:key="{{ $activeEntry }}">
                        @if ($readingView)
                            <div class="mb-4">
                                <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                                    <form wire:submit.prevent="sendMsg">
                                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                                            <div class="px-4 py-6 space-y-6 bg-white dark:bg-gray-700 sm:p-6">
                                                <div>
                                                    <h3
                                                        class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-200">
                                                        Compose</h3>
                                                </div>

                                                <div class="grid grid-cols-6 gap-6">
                                                    <x-mail.input type="text" autocomplete="given-name"
                                                        label="First name" name="first-name" id="first-name"
                                                        wire:model.lazy="contestant.firstname" :error="$errors->first('contestant.firstname')"
                                                        disabled />

                                                    <x-mail.input type="text" autocomplete="given-name"
                                                        label="Last name" name="last-name" id="last-name"
                                                        wire:model.lazy="contestant.lastname" :error="$errors->first('contestant.lastname')"
                                                        disabled />

                                                    <div class="col-span-6 sm:col-span-6">
                                                        <x-mail.input type="email" autocomplete="given-name"
                                                            label="Email address" name="email-address"
                                                            id="email-address" wire:model.lazy="contestant.email"
                                                            :error="$errors->first('contestant.email')" disabled />
                                                    </div>

                                                    <x-mail.input type="email" autocomplete="given-name"
                                                        label="From Address" name="from-address" id="from-address"
                                                        wire:model.lazy="contestant.fromAddress" :error="$errors->first('contestant.fromAddress')" />

                                                    <x-mail.input type="text" autocomplete="given-name"
                                                        label="From Name" name="from-name" id="from-name"
                                                        wire:model.lazy="contestant.fromName" :error="$errors->first('contestant.fromName')" />

                                                    <div class="col-span-6 sm:col-span-6">
                                                        <x-mail.input type="text" autocomplete="given-name"
                                                            label="Subject" name="mail-subject" id="mail-subject"
                                                            placeholder="BMYWA - First runner up"
                                                            wire:model.lazy="contestant.subject" :error="$errors->first('contestant.subject')" />
                                                    </div>

                                                    <div class="col-span-6">
                                                        <x-mail.message-box wire:model.lazy="contestant.message"
                                                            :error="$errors->first('contestant.message')"
                                                            placeholder="Enter your message here... (No Salutaions eg: Dear name)" />
                                                    </div>
                                                </div>
                                            </div>
                                            @can(\App\Utilities\Constant::MANAGE_SITE)
                                                <div class="px-4 py-3 text-right bg-gray-50 dark:bg-gray-800 sm:px-6">
                                                    <button type="submit"
                                                        class="flex items-center justify-between px-4 py-2 mx-auto space-x-1.5 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg cursor-pointer active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                                                        <span>Send</span>
                                                        <x-icon.send class="w-4 h-4 mx-auto text-white" />
                                                    </button>
                                                </div>
                                            @endcan
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="py-24 mx-auto text-center">
                                <x-icon.send class="w-12 h-12 mx-auto text-gray-400" />
                                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-200">No entry selected
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">Get started by selecting an Entry.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
