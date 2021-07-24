<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title . ' - ' ?? '' }} BMYWA</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">

    @livewireStyles

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>

<body>
    
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }" x-cloak="">
        <!-- Sidebar -->
        <x-admin.sidebar />
        
        <!-- notification -->
        <x-notification />

        <div class="flex flex-col flex-1 w-full">
            <!-- Header -->
            <x-admin.topbar />

            <main class="h-full overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('admin/js/init-alpine.js') }}"></script>
    <script src="{{ asset('admin/js/focus-trap.js') }}" defer></script>
    @livewireScripts
</body>

</html>