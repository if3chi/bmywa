<div>
    <x-slot name='title'>
        {{ __('Judges') }}
    </x-slot>

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Judges') }}
        </h2>

        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <button wire:click.prevent="getForm('Add')" type="button"
                class="flex items-center cursor-pointer justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                <x-icon.user-add />
                <span>Add Judge</span>
            </button>
        </div>

        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Photo</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($judges as $judge)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 w-8">
                                    <div class=" items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="w-12 h-12 mr-4 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{ $judge->avatar_url }}" alt="" loading="lazy" />
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 py-3 w-56">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $judge->name }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $judge->description }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm w-12">
                                    <div class="inline-flex">
                                        <button wire:click="getForm('edit', {{ $judge->id }})"
                                            class="flex items-center justify-between mr-4 px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-full active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow"
                                            aria-label="Edit">
                                            <x-icon.pen />
                                        </button>
                                        <button wire:click="getDelModal({{ $judge->id }})"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-full active:bg-yellow-400 hover:bg-red-700 focus:outline-none focus:shadow-outline-yellow"
                                            aria-label="Delete">
                                            <x-icon.trash />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td colspan="4" class="px-4 py-3">
                                    <div class="text-center text-md">
                                        <h2 class="font-bold">
                                            This place is lonely... </br> Add a Judge
                                        </h2>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $judges->links('components.pagination') }}
        </div>
    </div>

    <x-modal.form wire:model="showEditModal">
        <x-slot name="title">{{ $formTitle }}</x-slot>
        <x-slot name="content">
            <div class="mb-8 bg-white rounded-lg dark:bg-gray-800">
                <x-form.input wire:model="editing.name" :error="$errors->first('editing.name')" type="text"
                    label="Name">
                    <x-icon.user />
                </x-form.input>

                <x-form.input wire:model="editing.description" :error="$errors->first('editing.description')"
                    type="text" label="Description">
                    <x-icon.anotation />
                </x-form.input>
                <x-form.file wire:model="judgePhoto" target="judgePhoto" :error="$errors->first('judgePhoto')"
                    label="Select Photo" type="file">
                    @if ($this->judgePhoto)
                        <img class="object-cover w-full h-full rounded-md"
                            src="{{ $this->judgePhoto->temporaryUrl() }}" alt="" />
                    @else
                        @if (\str_contains($formTitle, 'Edit'))
                            <img class="object-cover w-full h-full rounded-md" src="{{ $this->editJudgePhoto }}"
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
