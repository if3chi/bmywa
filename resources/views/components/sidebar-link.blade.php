@props(['url'])

@php
    $spanClasses = (Request::is($url) ?? false)
                ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg'
                : '';
    $aClasses = (Request::is($url) ?? false)
                ? 'inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100'
                : 'inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200';
@endphp

<span {{ $attributes->merge(['class' => $spanClasses]) }} aria-hidden="true"></span>
<a {{ $attributes->merge(['class' => $aClasses]) }} >
    {{ $slot }}
</a>