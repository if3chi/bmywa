<div>
    @if ($paginator->hasPages())
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                Showing {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }}
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        <li>
                            @if ($paginator->onFirstPage())
                                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                    <span
                                        class="px-3 py-1 m-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-yellow"
                                        aria-hidden="true">
                                        <x-icon.chevron-left />
                                    </span>
                                </span>
                            @else
                                <button wire:click="previousPage" dusk="previousPage.after" rel="prev"
                                    class="px-3 py-1 m-1 text-white transition-colors duration-150 bg-yellow-400 border border-r-0 border-yellow-400 rounded-md focus:outline-none focus:shadow-outline-yellow"
                                    aria-label="{{ __('pagination.next') }}">
                                    <x-icon.chevron-left />
                                </button>
                            @endif
                        </li>
                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li>
                                    <span aria-disabled="true">
                                        <span class="px-3 py-1 m-1">{{ $element }}</span>
                                    </span>
                                </li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <li>
                                                <button aria-current="page"
                                                    class="px-3 py-1 m-1 text-white transition-colors duration-150 bg-yellow-400 border border-r-0 border-yellow-400 rounded-md focus:outline-none focus:shadow-outline-yellow">
                                                    {{ $page }}
                                                </button>
                                            </li>
                                        @else
                                            <li>
                                                <button wire:click="gotoPage({{ $page }})"
                                                    class="px-3 py-1 m-1 rounded-md focus:outline-none focus:shadow-outline-yellow"
                                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                    {{ $page }}
                                                </button>
                                            </li>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach
                        <li>
                            @if ($paginator->hasMorePages())
                                <button wire:click="nextPage" dusk="nextPage.after" rel="next"
                                    class="px-3 py-1 m-1 text-white transition-colors duration-150 bg-yellow-400 border border-r-0 border-yellow-400 rounded-md focus:outline-none focus:shadow-outline-yellow"
                                    aria-label="{{ __('pagination.next') }}">
                                    <x-icon.chevron-right />
                                </button>
                            @else
                                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                    <span
                                        class="px-3 py-1 m-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-yellow"
                                        aria-hidden="true">
                                        <x-icon.chevron-right />
                                    </span>
                                </span>
                            @endif
                        </li>
                    </ul>
                </nav>
            </span>
        </div>
    @endif
</div>
