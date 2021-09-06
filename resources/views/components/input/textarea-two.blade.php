@props(['label' => false, 'id' => false, 'error' => false])

<div class="relative mb-6">
    <div class="relative">
        <label for="{{ $id }}" class="font-medium text-gray-900">{{ $label }}</label>
        <textarea {{ $attributes }} id="{{ $id }}"
            wire:dirty.class="border-yellow-100 focus:ring-yellow-300"
            wire:dirty.class.remove="border-red-100 focus:ring-red-400"
            class="block w-full p-5 mt-2 text-xl placeholder-gray-400 border-2  rounded-lg focus:outline-none focus:ring-4 focus:ring-opacity-50 {{ $error ? 'border-red-100 focus:ring-red-400' : 'border-yellow-100 focus:ring-yellow-300' }}"></textarea>
    </div>

    @if ($error)
        <div class="p-0.5 mx-2">
            <span class="text-xs font-semibold text-red-600 dark:text-red-400 tracking-wider">
                {{ $error }}
            </span>
        </div>
    @endif
</div>
