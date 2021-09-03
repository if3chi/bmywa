@props(['sponsors' => false])

@if ($sponsors->count())
    <section class="box-border px-5 py-12 text-gray-800 bg-white xl:my-0 fade-in">
        <div
            class="flex flex-wrap items-center justify-center px-5 mx-auto md:px-12 md:flex-wrap lg:justify-between max-w-7xl">
            <span
                class="box-border block w-full mb-5 text-xs font-bold text-center text-gray-500 tracking-widest uppercase lg:w-auto lg:inline lg:mb-0">Our
                Sponsors
            </span>

            @foreach ($sponsors as $sponsor)
                <x-card.sponsor :name="$sponsor->name" :imgUrl="$sponsor->logo_url" />
            @endforeach
        </div>
    </section>
@endif
