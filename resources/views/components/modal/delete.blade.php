@props(['id' => null, 'maxWidth' => null, 'title' => false, 'record' => false])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div>
        <div class="sm:flex sm:items-start">
            <div
                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-500 sm:mx-0 sm:h-10 sm:w-10">
                <x-icon.exclamation />
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modal-title">
                    {{ $title }}
                </h3>
                <div class="mt-2 text-center md:text-justify">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to delete
                        </br>
                        <span
                            class="text-md font-bold text-red-600 bg-red-100 dark:bg-red-500 rounded-md p-0.5">{{ $record }}?</span>
                        </br> This data will be permanently removed from our servers forever.
                        </br> <span class="text-md font-bold text-red-600">This action cannot be undone.</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
            <button @click="show = false"
                class="w-full px-5 py-3 mb-3 text-sm font-medium leading-5 dark:text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                Cancel
            </button>
            <button wire:click="destroy" type="button"
                class="w-full inline-flex md:mb-3 justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:col-start-2 sm:text-sm">
                (Yes) Delete
            </button>
        </div>
    </div>
</x-modal>
