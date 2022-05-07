<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jaspar Ifechi">
    <meta name="keyword" content="Blooming, Minds, arts, creatives, young, writer, creative thinking">
    <meta name="description"
        content="BMYWA - Blooming Minds Young Writers Awards is an initiative aimed at raising young African leaders by recognizing and rewarding children with creative abilities in writing and arts.">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@bmywa">
    <meta name="twitter:creator" content="@ifeabasi">
    <meta name="twitter:title" content="Blooming Minds Young Writers Award">
    <meta name="twitter:description"
        content="BMYWA - Blooming Minds Young Writers Awards is an initiative aimed at raising young African leaders by recognizing and rewarding children with creative abilities in writing and arts.">
    <meta name="twitter:image" content="{{ asset('images/about.jpg') }}">

    <meta property="og:type" content="website" />
    <meta property="og:title" content="Blooming Minds Young Writers Award" />
    <meta property="og:description"
        content="BMYWA - Blooming Minds Young Writers Awards is an initiative aimed at raising young African leaders by recognizing and rewarding children with creative abilities in writing and arts.">
    <meta property="og:image" content="{{ asset('images/about.jpg') }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="200">

    <meta property="og:url" content="{{ route('welcome') }}">

    <title>{{ $title ?? 'Blooming Minds Young Writers Award' }}</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles
</head>

<body>

    {{-- @if (!Request::is('events'))
        <livewire:front.info-banner />
    @endif --}}

    <div class="fade-in">
        {{ $hero }}
    </div>
    <main>
        {{ $slot }}
    </main>

    <x-front.footer />

    @livewireScripts

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

    <script>
        const callback = function(entries) {
            entries.forEach((entry) => {

                if (entry.isIntersecting) {
                    entry.target.classList.add("animate-fadeIn");
                } else {
                    entry.target.classList.remove("animate-fadeIn");
                }
            });
        };

        const observer = new IntersectionObserver(callback);

        const targets = document.querySelectorAll(".fade-in");
        targets.forEach(function(target) {
            target.classList.add("opacity-0");
            observer.observe(target);
        });
    </script>

</body>

</html>
