<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 border border-transparent rounded-xl font-semibold text-sm text-white hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 focus:ring-offset-transparent transition-all duration-150 shadow-lg']) }}>
    {{ $slot }}
</button>
