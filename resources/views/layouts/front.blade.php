<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jaspar Ifechi">
    <meta name="description"
        content="Blooming Minds Young Writers Awards is an initiative aimed at raising young African leaders by recognizing and rewarding children with creative abilities in writing and arts.">
    <meta name="keyword" content="Blooming, Minds, arts, creatives, young, writer, creative thinking">

    <meta property="og:type" content="website" />
    <meta property="og:title" content="Blooming Minds Young Writers Award" />
    <meta property="og:description"
        content="BMYWA is an initiative aimed at raising young African leaders by recognizing and rewarding creativity.">
    <meta property="og:image" content="{{ asset('images/about.jpg') }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="200">

    <meta property="og:url" content="{{ route('welcome') }}">

    <title>{{ $title ?? 'Blooming Minds Young Writers Award' }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    {{ $hero }}

    <main>
        {{ $slot }}
    </main>

    <x-front.footer />

    <!-- AlpineJS Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>

    <script>
        const callback = function(entries) {
            entries.forEach((entry) => {
                console.log(entry);

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