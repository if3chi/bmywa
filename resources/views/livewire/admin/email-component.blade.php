<div>
    <x-slot name="title">
        {{ __('Compose Email') }}
    </x-slot>

    <div class="m-2 lg:grid lg:grid-cols-12 lg:gap-x-5">

        {{-- #TODO: Implement Mail --}}
        <aside class="px-2 py-6 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
            <nav class="space-y-1">
                <!-- Current: "bg-gray-50 text-indigo-700 hover:text-indigo-700 hover:bg-white", Default: "text-gray-900 hover:text-gray-900 hover:bg-gray-50" -->
                <a href="#"
                    class="flex items-center px-3 py-2 text-sm font-medium text-indigo-700 rounded-md bg-gray-50 hover:text-indigo-700 hover:bg-white group"
                    aria-current="page">
                    <!--
            Heroicon name: outline/user-circle

            Current: "text-indigo-500 group-hover:text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500"
          -->
                    <svg class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="truncate"> Inbox </span>
                </a>

                <a href="#"
                    class="flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md hover:text-gray-900 hover:bg-gray-50 group">
                    <!-- Heroicon name: outline/key -->
                    <svg class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-gray-400 group-hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                    <span class="truncate"> Outbox </span>
                </a>
            </nav>
        </aside>

        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
            <form wire:submit.prevent="sendMsg">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Compose</h3>
                        </div>

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">First
                                    name</label>
                                <input wire:model.lazy="recipient.firstname" type="text" name="first-name"
                                    id="first-name" autocomplete="given-name"
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                @error('recipient.firstname')
                                    <p class="m-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <input wire:model.lazy="recipient.lastname" type="text" name="last-name" id="last-name"
                                    autocomplete="family-name"
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('recipient.lastname')
                                    <p class="m-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">Email
                                    address</label>
                                <input wire:model.lazy="recipient.email" type="text" name="email-address"
                                    id="email-address" autocomplete="email"
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('recipient.email')
                                    <p class="m-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
