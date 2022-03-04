@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-md text-center rounded-md p-1 bg-green-100 text-green-700']) }}>
        {{ $status }}
    </div>
@endif
