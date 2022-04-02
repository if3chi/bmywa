<div>
    <x-slot name='title'>
        {{ __('Users') }}
    </x-slot>

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Users') }}
        </h2>

        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <button wire:click.prevent="getForm('{{ \App\Utilities\Constant::ADD }}')" type="button"
                class="flex items-center cursor-pointer justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                <x-icon.user-add />
                <span>Add User</span>
            </button>
        </div>

        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Country</th>
                            <th class="px-4 py-3">Roles</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($users as $user)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 w-56">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $user->name }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $user->email }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ entryCountry()[$user->country] }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="items-center text-sm">
                                        @foreach ($user->roles as $role)
                                            <p class="font-semibold">{{ $role->name }}</p>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm w-12">
                                    <div class="inline-flex">
                                        <button
                                            wire:click="getForm('{{ \App\Utilities\Constant::EDIT }}', {{ $user->id }})"
                                            class="flex items-center justify-between mr-4 px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-full active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow"
                                            aria-label="Edit">
                                            <x-icon.pen />
                                        </button>
                                        <button wire:click="confirmDelete({{ $user->id }})"
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
                                            This place is lonely... </br> Add a user
                                        </h2>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $users->links('components.pagination') }}
        </div>
    </div>

    <x-modal.form wire:model="showEditModal">
        <x-slot name="title">{{ $formTitle }}</x-slot>
        <x-slot name="content">
            <div class="mb-4 bg-white rounded-lg dark:bg-gray-800 space-y-1">
                <x-form.input wire:model="editing.name" :error="$errors->first('editing.name')" type="text"
                    label="Name">
                    <x-icon.user />
                </x-form.input>

                <x-form.input wire:model="editing.email" :error="$errors->first('editing.email')" type="email"
                    label="Email">
                    <x-icon.email />
                </x-form.input>

                <x-form.select wire:model.lazy="editing.country" :error="$errors->first('editing.country')" type="text"
                    name="country" label="Country">
                    <option class="text-base" value="" disabled>Select Country</option>
                    @foreach (entryCountry() as $id => $name)
                        <option class="text-base" value="{{ $id }}">
                            {{ $name }}
                        </option>
                    @endforeach
                </x-form.select>

                <x-form.select wire:model.lazy="userRole" :error="$errors->first('userRole')" type="text"
                    name="user-role" label="User Role(s)">
                    <option class="text-base" value="" disabled>Select Role(s)</option>
                    @foreach ($roles as $id => $name)
                        <option class="text-base" value="{{ $id }}">
                            {{ $name }}
                        </option>
                    @endforeach
                </x-form.select>

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
