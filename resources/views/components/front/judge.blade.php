@props(['judges' => false])


@if ($judges->count() > 0)
    <section id="judges" class="w-full py-12 bg-gray-50 lg:py-24">
        <x-judge-group>
            @foreach ($judges as $judge)
                <x-card.judge :imagelink="$judge->avatar_url" :name="$judge->name" :work="$judge->profession"
                    :desc="$judge->description" :socials="$judge->social_links"/>
            @endforeach
        </x-judge-group>
    </section>
@else
    <div class="bg-white w-full p-2"></div>
@endif
