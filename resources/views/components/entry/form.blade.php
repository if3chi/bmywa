<div class="w-full mt-16 md:mt-0 md:w-50">
    <form {{ $attributes }}
        class="relative z-10 h-auto py-8 px-5 overflow-hidden bg-white border-b-2 border-yellow-100 rounded-lg shadow-lg">

        @if (!entryIsActive())
            <div class="absolute bg-red-100 inset-1/4 max-h-16 left-0 p-3 skew-y-12 transform w-full z-30">
                <p
                    class="font-medium lg:text-2xl md:text-lg mx-auto skew-x-3 skew-y-0 sm:text-base text-center text-red-900 text-sm tracking-tight transform">
                    Submissions are closed at the moment.
                </p>
            </div>
        @endif

        <fieldset {{ !entryIsActive() ? 'disabled' : '' }}>
            {{ $slot }}
        </fieldset>

    </form>
</div>
