<div class="max-w-4xl px-8 mx-auto lg:px-16">
    <h2 class="mb-2 text-xl font-bold text-center text-gray-900 md:text-3xl">Frequently Asked Questions</h2>
    <div class="relative mt-12 space-y-5">
        @forelse (loadFaqs() as $faq)
            <x-card.faq :qtn="$faq->question" :ans="$faq->answer" />
        @empty
            <div class="relative overflow-hidden border-2 border-white shadow-lg rounded-lg select-none hover:bg-white">
                <h4
                    class="flex items-center justify-between text-lg font-medium text-gray-700 cursor-pointer sm:text-xl px-7 py-7 hover:text-gray-800">
                    <span>Nothing Here Yet..</span>
                    <svg class="w-6 h-6 transition-all duration-200 ease-out transform text-red-500 -rotate-45"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                        </path>
                    </svg>
                </h4>
            </div>
        @endforelse
    </div>
</div>
