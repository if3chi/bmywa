@props(['entries', 'activeEntry'])

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

            <a href="#" class="block border-b" wire:click="openEntry({{ $entry->id }})">
                <div class="border-l-2 {{ $cardClasses }} p-3 space-y-1">
                    <div class="flex flex-row items-center space-x-2 text-gray-700">
                        <strong class="flex-grow text-sm truncate">{{ $entry->contestant_name }}</strong>
                        <div class="flex space-x-1">
                            <div class="text-sm font-medium text-gray-700">{{ $entry->age }}yrs
                            </div>
                            <div
                                class="text-sm {{ $entry->country == 'ng' ? 'text-green-800 bg-green-200' : 'text-yellow-800 bg-yellow-300' }}  p-1 -m-1 rounded-full">
                                {{ strtoupper($entry->country) }}
                            </div>
                            @can(\App\Utilities\Constant::SCORE_ENTRY)
                                @if ($entry->score)
                                    <div class="mx-1">
                                        | <span class="bg-green-700 text-white px-0.5 rounded-sm">
                                            {{ $entry->score }}
                                        </span>
                                    </div>
                                @endif
                            @endcan
                            @if ($entry->judge_score)
                                <div class="mx-1">
                                    | <span class="bg-green-700 text-white px-0.5 rounded-sm">
                                        {{ $entry->judge_score }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex flex-row items-center space-x-1 text-gray-600">
                        <div class="flex-grow text-xs font-medium tracking-wide truncate">
                            {{ $entry->title }} </div>
                        <div class="text-xs font-medium tracking-wide truncate">{{ $entry->category }} </div>
                    </div>

                    <div class="flex flex-row items-center space-x-1 text-gray-600">
                        <div class="flex-grow text-xs truncate">{{ $entry->truncated }}</div>
                    </div>
                </div>
            </a>
        @empty
            <h2 class="my-10 text-xl font-semibold tracking-wide text-center text-gray-700 dark:text-gray-200">
                Nothing Here...
            </h2>
        @endforelse
    </div>
</div>
