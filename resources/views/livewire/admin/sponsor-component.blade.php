<div>
    <x-slot name="title">
        {{ __('Sponsors') }}
    </x-slot>

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Sponsors') }}
        </h2>

        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <button wire:click.prevent="getForm('Add')" type="button"
                class="flex items-center cursor-pointer justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                <x-icon.user-add />
                <span>Add Sponsor</span>
            </button>
        </div>

        <div>
            <dl class="mt-5 grid grid-cols-2 gap-6 sm:grid-cols-3">
                @forelse ($sponsors as $sponsor)
                    <div class="shadow rounded-lg overflow-hidden bg-white dark:bg-gray-700">
                        <div class="text-center">
                            <div class="relative flex-shrink-1 group h-full flex items-center justify-center">
                                <img class="object-cover w-full h-full" alt="{{ $sponsor->alt_text }}"
                                    src="{{ $sponsor->logo_url }}">
                                <div
                                    class="absolute inset-0 flex items-center justify-center transition duration-200 opacity-0 hover:opacity-100">
                                    <div class="rounded-2xl shadow-sm w-24 mr-2">
                                        <a class="inline-flex w-full justify-center items-center px-2 py-1 space-x-1 rounded-2xl shadow-sm border border-transparent text-sm font-medium text-yellow-500 bg-white transition duration-150 hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500"
                                            wire:click.prevent="getForm('edit', {{ $sponsor->id }})" href="">
                                            <x-icon.pen /> <span>Edit</span>
                                        </a>
                                    </div>
                                    <div class="rounded-2xl shadow-sm w-24">
                                        <a class="w-full justify-center inline-flex items-center px-2 py-1 space-x-1 border border-transparent text-sm font-medium rounded-2xl shadow-sm text-white transition duration-150 bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                        wire:click.prevent="confirmDelete({{ $sponsor->id }})" href="">
                                            <x-icon.trash /> <span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <p
                                class="block text-sm font-medium text-gray-900 dark:text-gray-100 m-1 truncate pointer-events-none">
                                {{ $sponsor->name }}</p>
                        </div>
                    </div>
                @empty
                    <div class="shadow rounded-lg overflow-hidden bg-white dark:bg-gray-700">
                        <div class="text-center">
                            <p
                                class="block text-sm font-medium text-gray-900 dark:text-gray-100 m-1 truncate pointer-events-none">
                                No Sponsors Yet....</p>
                        </div>
                    </div>
                @endforelse
            </dl>
        </div>
    </div>

    <x-modal.form wire:model="showEditModal">
        <x-slot name="title">{{ $formTitle }}</x-slot>
        <x-slot name="content">
            <div class="mb-8 bg-white rounded-lg dark:bg-gray-800">
                <x-form.input wire:model.lazy="editSponsor.name" :error="$errors->first('editSponsor.name')" type="text"
                    label="Name">
                    <x-icon.user />
                </x-form.input>

                <x-form.file wire:model="sponsorLogo" target="sponsorLogo" :error="$errors->first('sponsorLogo')"
                    label="Select Photo" type="file">
                    @if ($this->sponsorLogo)
                        <img class="object-cover w-full h-full rounded-md"
                            src="{{ $this->sponsorLogo->temporaryUrl() }}" alt="" />
                    @else
                        @if (\str_contains($formTitle, 'Edit'))
                            <img class="object-cover w-full h-full rounded-md" src="{{ $this->editSponsorLogo }}"
                                alt="" />
                        @else
                            <div class="bg-gray-100 dark:bg-gray-700 rounded-md">
                                <div>
                                    <x-icon.avatar />
                                </div>
                            </div>
                        @endif
                    @endif
                </x-form.file>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button wire:click="$set('showEditModal', false)"
                class="w-full px-5 py-3 text-sm font-medium leading-5 dark:text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                Cancel
            </button>
            <button wire:click="save"
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                Save
            </button>
        </x-slot>
    </x-modal.form>
    <x-modal wire:model="showDelModal">
        <div>
            <div class="sm:flex sm:items-start">
                <div
                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-500 sm:mx-0 sm:h-10 sm:w-10">
                    <x-icon.exclamation />
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modal-title">
                        {{ $formTitle }}
                    </h3>
                    <div class="mt-2 text-justify">
                        <p class="text-sm text-gray-500">
                            Are you sure you want to delete <span
                                class="text-md font-bold text-red-600 bg-red-100 dark:bg-red-500 rounded-md p-1">{{ $this->selectedRecord->name }}?</span>
                            </br>This data will be permanently
                            removed from our servers forever.</br> <span class="text-md font-bold text-red-600">This
                                action cannot be undone.</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                <button @click="show = false"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 dark:text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
                <button wire:click="destroy" type="button"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:col-start-2 sm:text-sm">
                    (Yes) Delete
                </button>
            </div>
        </div>
    </x-modal>
</div>
