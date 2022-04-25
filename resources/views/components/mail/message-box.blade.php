@props(['label' => 'Message', 'error' => false])

@php
$classes = $error ? 'block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input placeholder-gray-300 dark:placeholder-gray-500' : 'block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-yellow-400 focus:outline-none focus:shadow-outline-yellow dark:focus:shadow-outline-yellow form-input placeholder-gray-300 dark:placeholder-gray-500';
@endphp

<div>
    <label for="email-message"
        class="block text-sm font-medium text-gray-700 dark:text-gray-200">{{ $label }}</label>
    <div class="mt-1">
        <textarea {{ $attributes->merge(['class' => $classes]) }} rows="6" name="email-message" id="email-message"></textarea>
    </div>
    @if ($error)
        <p class="m-1 text-sm font-semibold text-red-600 dark:text-red-400">{{ $error }}</p>
    @endif
</div>
