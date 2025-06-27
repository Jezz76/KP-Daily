<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl font-semibold text-sm text-white hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 focus:ring-offset-transparent disabled:opacity-25 transition-all duration-150 shadow-lg']) }}>
    {{ $slot }}
</button>
