@props(['label', 'error' => false, 'target' => false])

<div 
    x-data="{isUploading: false, progress: 0, focused: false }" 
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="setTimeout(()=> {isUploading = false;}, 100); setTimeout(()=> {progress = 0;}, 500)" 
    x-on:livewire-upload-error="isUploading = false; progress = 0"
    x-on:livewire-upload-progress="progress = $event.detail.progress" class="block items-center">
    <div class="text-sm flex items-center justify-evenly">
        <input {{ $attributes }} @focus="focused = true" @blur="focused = false" class="sr-only" id="file" />
        <label for="file" :class="{ 'outline-none border-blue-300 shadow-outline-blue': focused }"
            class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
            <span>{{ $label }}</span>
            <x-icon.three-dots wire:loading wire:target="{{ $target }}" class="w-5 h-5 ml-2 -mr-1"
                fill="currentColor" aria-hidden="true" />
        </label>
        <div class=" items-center text-sm">
            <div class="w-32 h-32 mr-4 rounded-md md:block">
                {{ $slot }}
            </div>
        </div>
    </div>

    <div x-show.transition.fade.duration.500ms="isUploading"  class="relative py-2 w-1/2 mx-auto">
        <div class="flex mb-1 items-center justify-between">
          <div>
            <span class="text-xs font-semibold inline-block py-0.5 px-0.5 uppercase rounded-full text-green-600 bg-green-200">
              Uploading Image
            </span>
          </div>
          <div class="text-right">
            <span x-text="`${progress}%`" class="text-xs font-bold inline-block text-green-800 bg-green-100 rounded-full py-0.5 px-0.5"></span>
          </div>
        </div>
        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
          <div :style="`width: ${progress}%; transition: width 1.5s;`" class="shadow-none h-2 flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
        </div>
    </div>

    @if ($error)
        <span class="text-xs font-semibold text-red-600 dark:text-red-400">
            {{ $error }}
        </span>
    @endif
</div>
