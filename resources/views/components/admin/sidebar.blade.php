<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/">
            {{ __('BMYWA') }}
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <x-sidebar-link href="{{ route('dashboard') }}" url='admin/dashboard'>
                    <x-icon.home />
                    <span class="ml-4">{{ __('Dashboard') }}</span>
                </x-sidebar-link>
            </li>
        </ul>
        <div class="border-2 dark:border-gray-600  ml-2 mr-4 rounded-lg"></div>
        <ul>
            <li class="relative px-6 py-3">
                <x-sidebar-link href="{{ route('submissions.index') }}" url='admin/submissions'>
                    <x-icon.article class="w-6 h-7" />
                    <span class="ml-4">{{ __('Submissions') }}</span>
                </x-sidebar-link>
            </li>
            <li class="relative px-6 py-3">
                <x-sidebar-link href="{{ route('judges.index') }}" url='admin/judges'>
                    <x-icon.users />
                    <span class="ml-4">{{ __('Judges') }}</span>
                </x-sidebar-link>
            </li>
            <li class="relative px-6 py-3">
                <x-sidebar-link href="{{ route('sponsors.index') }}" url='admin/sponsors'>
                    <x-icon.trademark />
                    <span class="ml-4">{{ __('Sponsors') }}</span>
                </x-sidebar-link>
            </li>
        </ul>
    </div>
</aside>
<!-- Mobile sidebar -->

<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/">
            {{ __('BMYWA') }}
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <x-sidebar-link href="{{ route('dashboard') }}" url='admin/dashboard'>
                    <x-icon.home />
                    <span class="ml-4">{{ __('Dashboard') }}</span>
                </x-sidebar-link>
            </li>
        </ul>
        <div class="border-2 dark:border-gray-600 ml-2 mr-4 rounded-lg"></div>
        <ul>
            <li class="relative px-6 py-3">
                <x-sidebar-link href="{{ route('submissions.index') }}" url='admin/submissions'>
                    <x-icon.article class="w-6 h-7" />
                    <span class="ml-4">{{ __('Submissions') }}</span>
                </x-sidebar-link>
            </li>
            <li class="relative px-6 py-3">
                <x-sidebar-link href="{{ route('judges.index') }}" url='admin/judges'>
                    <x-icon.users />
                    <span class="ml-4">{{ __('Judges') }}</span>
                </x-sidebar-link>
            </li>
            <li class="relative px-6 py-3">
                <x-sidebar-link href="{{ route('sponsors.index') }}" url='admin/sponsors'>
                    <x-icon.trademark />
                    <span class="ml-4">{{ __('Sponsors') }}</span>
                </x-sidebar-link>
            </li>
        </ul>
    </div>
</aside>
