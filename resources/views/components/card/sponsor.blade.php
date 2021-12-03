@props(['name' => false, 'imgUrl' => false, 'url' => false])

<div class="box-border inline-block px-2 py-0 my-2 text-center text-gray-800">
    <a href="{{ $url }}" target="{{ $url ? '_blank' : '' }}" rel="noopener">
        <img src="{{ $imgUrl }}" alt="{{ $name }}'s logo" class="block object-contain h-12 lg:h-16">
    </a>
</div>
