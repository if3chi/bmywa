@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div>
        <div class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
            {{ $title }}
        </div>

        <div class="mt-4 mb-6">
            {{ $content }}
        </div>
    </div>

    <div
        class="flex flex-col items-center justify-center px-2 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
        {{ $footer }}
    </div>
</x-modal>
