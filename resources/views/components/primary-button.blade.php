<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 border border-transparent rounded-xl font-semibold text-sm text-white hover:from-purple-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 focus:ring-offset-transparent transition-all duration-150 shadow-lg']) }}>
    {{ $slot }}
</button>
