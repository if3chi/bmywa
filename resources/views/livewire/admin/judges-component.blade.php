<div>
    <x-slot name='title'>
        {{ __('Judges') }}
    </x-slot>

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Judges') }}
        </h2>

        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <button wire:click.prevent="getForm('Add')" type="button"
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg cursor-pointer active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                <x-icon.user-add />
                <span>Add Judge</span>
            </button>
        </div>

        <!-- New Table -->
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Photo</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Profession</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($judges as $judge)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="w-8 px-4 py-3">
                                    <div class="items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="w-12 h-12 mr-4 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{ $judge->avatar_url }}" alt="" loading="lazy" />
                                        </div>
                                    </div>
                                </td>
                                <td class="w-56 px-2 py-3">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $judge->name }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $judge->profession }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $judge->description }}</p>
                                    </div>
                                </td>
                                <td class="w-12 px-4 py-3 text-sm">
                                    <div class="inline-flex">
                                        <button wire:click="getForm('edit', {{ $judge->id }})"
                                            class="flex items-center justify-between px-2 py-2 mr-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-full active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow"
                                            aria-label="Edit">
                                            <x-icon.pen />
                                        </button>
                                        <button wire:click="confirmDelete({{ $judge->id }})"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-full active:bg-yellow-400 hover:bg-red-700 focus:outline-none focus:shadow-outline-yellow"
                                            aria-label="Delete">
                                            <x-icon.trash />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td colspan="5" class="px-4 py-3">
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
            <div class="mb-4 space-y-1 bg-white rounded-lg dark:bg-gray-800">
                <x-form.input wire:model="editing.name" :error="$errors->first('editing.name')" type="text"
                    label="Name">
                    <x-icon.user />
                </x-form.input>

                <x-form.input wire:model="editing.profession" :error="$errors->first('editing.profession')" type="text"
                    label="Profession">
                    <x-icon.anotation />
                </x-form.input>

                <x-form.input wire:model="editing.description" :error="$errors->first('editing.description')"
                    type="text" label="Description">
                    <x-icon.anotation />
                </x-form.input>

                {{-- Socials --}}
                <div>
                    <span class="text-sm text-gray-700 dark:text-gray-400">Social Media Handles</span>
                    <div class="flex w-full space-x-2">
                        <x-form.input-link wire:model="editing.socials.twitter" name="username" id="twitter"
                            :error="$errors->first('editing.socials.twitter')" type="text" label="twitter.com/" />

                        <x-form.input-link wire:model="editing.socials.linkedin" name="username" id="linkedin"
                            :error="$errors->first('editing.socials.linkedin')" type="text" label="linkedin.com/" />
                    </div>
                    <div class="flex space-x-2">
                        <x-form.input-link wire:model="editing.socials.instagram" name="username" id="instagram"
                            :error="$errors->first('editing.socials.instagram')" type="text" label="instagram.com/" />

                        <x-form.input-link wire:model="editing.socials.facebook" name="username" id="facebook"
                            :error="$errors->first('editing.socials.facebook')" type="text" label="facebook.com/" />
                    </div>
                </div>

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
                            <div class="bg-gray-100 rounded-md dark:bg-gray-700">
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
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-white dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
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
