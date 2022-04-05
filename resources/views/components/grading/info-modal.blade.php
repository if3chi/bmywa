@props(['id', 'maxWidth'])

@php
$id = $id ?? md5($attributes->wire('model'));
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth ?? '2xl'];
@endphp
<div x-data="{
    show: false,
    text: false,
    focusables() {
        // All focusable element types...
        let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

        return [...$el.querySelectorAll(selector)]
            // All non-disabled elements...
            .filter(el => !el.hasAttribute('disabled'))
    },
    firstFocusable() { return this.focusables()[0] },
    lastFocusable() { return this.focusables().slice(-1)[0] },
    nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
    prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
    nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
    prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1 },
    autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() },
}" x-init="$watch('show', value => value && setTimeout(autofocus, 50))" x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()" id="{{ $id }}">

    <div class="flex space-x-2">
        <p x-show="text" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90" class="text-sm font-semibold">Click to show Grading Criteria!</p>
        <button @mouseenter="text = true" @mouseleave="text = false" @click="show = true" {{-- title="info: Grading Criteria" --}}
            class="text-gray-700 dark:text-gray-200">
            <x-icon.info class="w-6 h-6" />
        </button>
    </div>

    <div x-show="show" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        style="display: none;">


        <div x-show="show"
            class="w-full px-6 py-2 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl shadow-xl transform transition-all"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

            <div class="flex mb-2 text-md font-semibold text-gray-700 dark:text-gray-300">
                <p class="mx-auto font-extrabold text-lg">Grading Critera</p>
            </div>

            <div class="my-2">
                <div class="p-2 text-base text-justify">
                    <div class="rounded-lg bg-white dark:bg-gray-800 overflow-hidden sm:grid sm:grid-cols-2 sm:gap-px">
                        <div class="text-gray-700 dark:text-gray-300 relative group p-2">
                            <h3 class="mt-1 text-md font-medium">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                ORIGINALITY
                            </h3>
                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">Focuses on the story origin and
                                content. The
                                characters and events that make up the story should
                                relate to Africa and be original, organic, new, creative
                                and refreshing. It should not be a plagiarised concept.</p>
                        </div>
                        <div class="relative group bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2">
                            <h3 class="mt-1 text-md font-medium">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                CHARACTERS
                            </h3>
                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">Focuses on the people (protagonist,
                                antagonist and
                                supporting characters) that play various roles in the
                                story. Main characters should be African
                            </p>
                        </div>
                        <div class="text-gray-700 dark:text-gray-300 relative group p-2">
                            <h3 class="mt-1 text-md font-medium">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                LANGUAGE & GRAMMER
                            </h3>
                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                Focuses on the vocabulary, grammar, and voice used
                                to tell the story. The language should be 'childrenfriendly' and correctly used in
                                context. Distinctive
                                stringing of words and semantics should be rewarded
                            </p>
                        </div>
                        <div class="relative group bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2">
                            <h3 class="mt-1 text-md font-medium">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                THEME/PLOT:
                            </h3>
                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">Focuses on the series of events and
                                sequence of
                                these events in the story. The plot should reflect a
                                smooth transition of one event to another. And the
                                flow of ideas should be consistent and suspense
                                enriched.
                            </p>
                        </div>
                        <div class="text-gray-700 dark:text-gray-300 relative group p-2">
                            <h3 class="mt-1 text-md font-medium">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                ENJOYMENT
                            </h3>
                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                Focuses on the emotional response the story content
                                elicits. Does the story inspire emotional change?
                                Does the story carry a message or lessons that
                                resonate? These should inform your rewarding of
                                marks

                            </p>
                        </div>
                        <div class="relative group bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2">
                            <h3 class="mt-1 text-md font-medium">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                TOTAL: 50 Marks
                            </h3>
                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                EACH CRITERIA = 10 POINTS
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-1 w-full flex">
                <button
                    class="w-full px-5 py-3 text-sm mx-auto font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-white dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                    @click="show = false">Close</button>
            </div>
        </div>
    </div>
</div>
