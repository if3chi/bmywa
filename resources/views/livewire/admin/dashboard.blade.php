<div>
    <x-slot name='title'>
        {{ __('Dashboard') }}
    </x-slot>

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->

            <x-card.info iconClass="text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
                <x-slot name="header">
                    Total Entries
                </x-slot>
                <x-slot name="count">
                    {{ $entries_count }}
                </x-slot>
            </x-card.info>

            {{-- <x-card.info header="Account balance" count="200"
                iconClass="text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"></path>
                </svg>
            </x-card.info> --}}

        </div>

        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Top 5 Latest Entries') }}
        </h2>

        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-4">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Contestant</th>
                            <th class="px-4 py-3">Contact</th>
                            <th class="px-4 py-3">Country</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Date Submitted</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($entries as $entry)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{ $entry->contestant_name }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ "$entry->age Years" }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $entry->phone }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $entry->email }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="{{ $entry->country_color }} px-2 py-1 font-semibold leading-tight uppercase rounded-full">
                                        {{ $entry->submission_country }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-gray-600 dark:text-gray-400">
                                        {{ $entry->category }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $entry->date_submitted }}
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center text-gray-700 dark:text-gray-400">
                                <td colspan="5" class="px-4 py-3 col-span-4">
                                    <div>
                                        <p class="font-semibold">No Entry Submitted yet....</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
