@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-300 space-y-1 mt-2']) }}>
        @foreach ((array) $messages as $message)
            <li class="flex items-center gap-2">
                <div class="w-4 h-4 bg-red-400 rounded-full flex items-center justify-center text-xs text-white">!</div>
                {{ $message }}
            </li>
        @endforeach
    </ul>
@endif
