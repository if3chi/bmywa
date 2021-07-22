<div x-data="{ show: false, msg: '' }"
    x-on:notify.window="show = true; msg = $event.detail;  setTimeout(() => show = false, 3000)" aria-live="assertive"
    class="fixed inset-0 flex items-end mt-14 px-4 py-6 pointer-events-none sm:p-6 sm:items-start z-50" x-cloak="">
    <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
        <!-- Notification panel, dynamically insert this into the live region when it needs to be displayed -->

        <div x-show="show" x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="max-w-sm w-full bg-white dark:bg-gray-700 shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <x-icon.check-circle />
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p x-text="msg.title" class="text-sm font-medium text-gray-900 dark:text-white">
                            Successfull!
                        </p>
                        <p x-text="msg.body" class="mt-1 text-sm text-gray-500 dark:text-gray-100">
                            Anyone with a link can now view this file.
                        </p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button @click="show = false"
                            class="bg-white dark:bg-gray-700 rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Close</span>
                            <x-icon.x />
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
