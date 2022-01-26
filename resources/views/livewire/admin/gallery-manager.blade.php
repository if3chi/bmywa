<div>
    <x-slot name="title">
        {{ __('Gallery') }}
    </x-slot>

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Gallery') }}
        </h2>

        <x-alert class="absolute z-40 top-2 mx-16 md:mx-64" />

        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">

            <x-dropdown-btn label="Add New">
                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="" wire:click.prevent="getForm('album', 'add')" @click="open = !open" x-cloak>Create New
                    Album</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="" wire:click.prevent="getForm('photos', 'add')" @click="open = !open" x-cloak>Add New
                    Photos</a>
            </x-dropdown-btn>
        </div>

        {{-- Albums Table --}}

        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="font-semibold tracking-wide text-center text-xl text-gray-500 uppercase  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th colspan="5" class=" p-2">Albums</th>
                        </tr>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            {{-- <th class="px-4 py-3">Photo</th> --}}
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Album Year</th>
                            <th class="px-4 py-3">Total Photos</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($albums as $album)
                            <tr class="text-gray-700 dark:text-gray-400">
                                {{-- <td class="px-4 py-3 w-8">
                                    <div class=" items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="w-12 h-12 mr-4 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{ $album->cover_image }}" alt="" loading="lazy" />
                                        </div>
                                    </div>
                                </td> --}}
                                <td class="px-2 py-3 w-56">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $album->name }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $album->year }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $album->photos_count }} Photo(s)</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $album->description }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm w-12">
                                    <div class="inline-flex">
                                        <button wire:click="getForm('album', 'edit', {{ $album->id }})"
                                            class="flex items-center justify-between mr-4 px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-full active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow"
                                            aria-label="Edit">
                                            <x-icon.pen />
                                        </button>
                                        <button wire:click="confirmDelete({{ $album->id }})"
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
                                            This place is lonely... </br> Add a Album
                                        </h2>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $albums->links('components.pagination') }}
        </div>

        {{-- Photos Table --}}

        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="font-semibold tracking-wide text-center text-xl text-gray-500 uppercase  bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th colspan="5" class=" p-2">Photos</th>
                        </tr>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Photo</th>
                            <th class="px-4 py-3">Country</th>
                            <th class="px-4 py-3">Year</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($photos as $photo)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 w-8">
                                    <div class=" items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="w-12 h-12 mr-4 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{ $photo->url }}" alt="" loading="lazy" />
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 py-3 w-56">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ entryCountry()[$photo->country] }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $photo->album->year }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="items-center text-sm">
                                        <p class="font-semibold">{{ $photo->description }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm w-12">
                                    <div class="inline-flex">
                                        <button wire:click="getForm('photos', 'edit', {{ $photo->id }})"
                                            class="flex items-center justify-between mr-4 px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-full active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow"
                                            aria-label="Edit">
                                            <x-icon.pen />
                                        </button>
                                        <button wire:click="confirmDelete({{ $photo->id }})"
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
                                            This place is lonely... </br> Add Photo(s)
                                        </h2>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $photos->links('components.pagination') }}
        </div>
    </div>

    <x-modal.form wire:model="showEditModal">
        <x-slot name="title">{{ $formTitle }}</x-slot>
        <x-slot name="content">
            <div class="my-8 bg-white rounded-lg dark:bg-gray-800 space-y-2">
                @if ($this->checkMode())
                    <x-form.input wire:model.lazy="editingAlbum.name" :error="$errors->first('editingAlbum.name')"
                        type="text" name="album" label="Name" placeholder="example: Blooming Minds Ceremony">
                        <x-icon.letter-case />
                    </x-form.input>

                    <x-form.textarea wire:model="editingAlbum.description"
                        :error="$errors->first('editingAlbum.description')" type="text" label="Description">
                        <x-icon.anotation />
                    </x-form.textarea>

                    <x-datepicker wire:model="editingAlbum.year" id="albumYear"
                        :error="$errors->first('editingAlbum.year')" name="year" label="Album Year" />
                @endif

                <div>
                    @if (!$this->checkMode())
                        {{-- ['album_id', 'image', 'country', 'featured'] --}}

                        <x-form.select wire:model.lazy="editingPhoto.album_id"
                            :error="$errors->first('editingPhoto.album_id')" type="text" name="album" label="Album">
                            <option class="text-base" value="" disabled>Select Photo(s) Album</option>
                            @foreach (getAlbums() as $album)
                                <option class="text-base" value="{{ $album->id }}">{{ "$album->name ($album->year)" }}
                                </option>
                            @endforeach
                        </x-form.select>

                        <x-form.select-country wire:model.lazy="editingPhoto.country" id="country" label="Photo Country"
                            :country="$editingPhoto->country" :error="$errors->first('editingPhoto.country')">
                            <option class="text-base" value="" disabled>Select Photo(s) Country</option>
                            @foreach (entryCountry() as $country => $name)
                                <option class="text-base" value="{{ $country }}">{{ $name }}
                                </option>
                            @endforeach
                        </x-form.select-country>

                        <x-form.filepond wire:model="images" :error="$errors->first('images.*')" multiple
                            {{-- allowImagePreview imagePreviewMaxHeight="200" allowFileTypeValidation
                            acceptedFileTypes="['image/png', 'image/jpg']" allowFileSizeValidation maxFileSize="1mb" --}} />

                    @endif
                </div>
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

    {{-- <x-modal.delete wire:model="showDelModal" :title="$formTitle" :record="$this->selectedRecord->name" /> --}}
</div>
