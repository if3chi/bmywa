@props(['label', 'error' => false])

<div wire:ignore x-data x-init="
        FilePond.setOptions({
            allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                }
            },
        });

        FilePond.create($refs.input);

        " class="space-y-2 mt-2">

    <input type="file" x-ref='input'>


</div>
@if ($error)
    <span class="text-xs font-semibold text-red-600 dark:text-red-400 -mt-2">
        {{ $error }}
    </span>
@endif

@push('styles')
    @once
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    @endonce
@endpush

@push('scripts')
    @once
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    @endonce
@endpush
