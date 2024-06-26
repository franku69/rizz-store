@props(['messages'])

@php
    // Convert to a collection if messages are an array
    if (is_array($messages)) {
        $messages = collect($messages);
    }
@endphp

@if ($messages instanceof \Illuminate\Support\Collection && $messages->isNotEmpty())
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ($messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@elseif ($messages instanceof \Illuminate\Support\MessageBag && $messages->any())
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ($messages->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
