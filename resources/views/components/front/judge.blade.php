@props(['judges' => false])


@if ($judges->count() > 0)
    <section id="judges" class="w-full py-12 bg-gray-50 lg:py-24">
        <x-judge-group>
            @foreach ($judges as $judge)
                <x-card.judge :imagelink="$judge->avatar_url" :name="$judge->name" :work="$judge->profession"
                    :desc="$judge->description" />
            {{-- @empty
                <div class="w-full border bg-white border-gray-200 rounded-lg shadow-md p-4  justify-center">
                    <h2 class="text-lg text-yellow-500 font-bold">Nothing Here Yet...</h2>
                </div> --}}
            @endforeach
        </x-judge-group>
    </section>
@else
    <div class="bg-white w-full p-2"></div>
@endif
