<div>
    <x-slot name="title">
        {{ __('Sponsors') }}
    </x-slot>

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Sponsors') }}
        </h2>

        <x-alert class="absolute z-40 top-2 mx-16 md:mx-64" />

        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <button wire:click.prevent="getForm('add')" type="button"
                class="flex items-center cursor-pointer justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                <x-icon.user-add />
                <span>Add Sponsor</span>
            </button>
        </div>

        <div class="bg-gray-100 dark:bg-gray-700 shadow-md rounded-lg mb-4">
            <dl class="my-6 mx-6 grid gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-4 lg:gap-x-8">
                @forelse ($sponsors as $sponsor)
                    <div class="group relative transform ease-out duration-300 transition">
                        <div class="relative flex-shrink-1 group justify-center items-center">
                            <div class="h-32 bg-gray-200 rounded-t-md overflow-hidden group-hover:opacity-25">
                                <img src="{{ $sponsor->logo_url }}" alt="{{ $sponsor->name }} logo"
                                    class="w-full h-full object-center object-cover">

                                <span
                                    class="absolute top-0.5 right-0.5 block h-3.5 w-3.5 transform -translate-y-1/2 translate-x-1/2 rounded-full {{ $sponsor->status ? 'bg-green-400' : 'bg-yellow-400' }} ring-2 ring-white"></span>
                            </div>
                            <div
                                class="absolute inset-0 flex flex-col space-y-1 items-center justify-center transition duration-200 opacity-0 hover:opacity-100">
                                <div class="inline-block rounded-2xl shadow-sm ">
                                    <a class="w-full justify-center inline-flex items-center px-2 py-1 space-x-1 border border-transparent text-sm font-medium rounded-2xl shadow-sm transition duration-150 {{ !$sponsor->status ? 'text-green-800 bg-green-200 hover:bg-green-300 focus:ring-green-400' : 'text-yellow-800 bg-yellow-100 hover:bg-yellow-200 focus:ring-yellow-300' }} focus:outline-none focus:ring-2 focus:ring-offset-2 "
                                        wire:click.prevent="updateStatus({{ $sponsor->id }})" href="">
                                        <span>{{ !$sponsor->status ? 'Enable' : 'Disable' }}</span>
                                    </a>
                                </div>
                                <div class="flex">
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
                        </div>
                        <h3
                            class="text-sm font-bold p-2 text-center rounded-b-md truncate 
                            {{ $sponsor->status ? 'text-green-900 bg-green-300' : 'text-yellow-900 bg-yellow-300' }}">
                            {{ $sponsor->name }}
                        </h3>
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
            {{ $sponsors->links('components.pagination') }}
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

    <x-modal.delete wire:model="showDelModal" :title="$formTitle" :record="$this->selectedRecord->name" />
</div>
