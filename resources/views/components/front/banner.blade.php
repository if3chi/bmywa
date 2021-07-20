 <section {{ $attributes }} x-data="{ showMenu: false }">

     {{-- <div class="absolute inset-0 z-0 h-full bg-blue-900 opacity-10"></div> --}}
     <x-front.nav />

     {{ $slot }}

 </section>
