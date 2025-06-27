@props(['on'])

<div x-data="{ shown: false, timeout: null }"
     x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
     x-show.transition.out.opacity.duration.1500ms="shown"
     x-transition:leave.opacity.duration.1500ms
     style="display: none;"
    {{ $attributes->merge(['class' => 'text-sm text-green-300 flex items-center gap-2']) }}>
    <div class="w-4 h-4 bg-green-400 rounded-full flex items-center justify-center text-xs text-white">✓</div>
    {{ $slot->isEmpty() ? __('Tersimpan.') : $slot }}
</div>
