<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="min-h-screen w-full bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-40 right-10 w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        <div class="absolute bottom-40 right-40 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-6000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-blob animation-delay-8000"></div>
    </div>

    <!-- Floating Particles -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute animate-float-1 top-1/4 left-1/4 w-3 h-3 bg-white rounded-full opacity-40"></div>
        <div class="absolute animate-float-2 top-1/3 right-1/3 w-2 h-2 bg-pink-300 rounded-full opacity-50"></div>
        <div class="absolute animate-float-3 bottom-1/4 left-1/3 w-4 h-4 bg-purple-300 rounded-full opacity-30"></div>
        <div class="absolute animate-float-4 bottom-1/3 right-1/4 w-2 h-2 bg-indigo-300 rounded-full opacity-45"></div>
        <div class="absolute animate-float-5 top-2/3 left-1/2 w-3 h-3 bg-cyan-300 rounded-full opacity-35"></div>
        <div class="absolute animate-float-1 top-1/5 right-1/5 w-2 h-2 bg-yellow-300 rounded-full opacity-40"></div>
    </div>

    <!-- Main Content Grid Layout -->
    <div class="relative z-10 min-h-screen flex">
        <!-- Left Side - Branding/Info Section -->
        <div class="hidden lg:flex lg:w-1/2 flex-col justify-center items-center px-12 text-center">
            <div class="max-w-lg">
                <!-- Large Brand Logo -->
                <div class="inline-block p-6 rounded-full bg-gradient-to-br from-indigo-400 via-purple-400 to-pink-400 shadow-2xl mb-8 animate-pulse-glow">
                    <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                
                <h1 class="text-6xl font-bold text-white mb-6 drop-shadow-lg">
                    Bergabung Bersama Kami
                </h1>
                <p class="text-2xl text-purple-200 mb-8 font-light leading-relaxed">
                    Mulai journey KP yang amazing! Daftar sekarang dan nikmati fitur-fitur canggih untuk mengelola aktivitas KP Anda.
                </p>
                
                <!-- Benefits highlights -->
                <div class="space-y-4 text-left">
                    <div class="flex items-center text-purple-100">
                        <svg class="w-6 h-6 mr-3 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Setup cepat dalam 1 menit
                    </div>
                    <div class="flex items-center text-purple-100">
                        <svg class="w-6 h-6 mr-3 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Data aman dan terlindungi
                    </div>
                    <div class="flex items-center text-purple-100">
                        <svg class="w-6 h-6 mr-3 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Analytics dan reporting otomatis
                    </div>
                    <div class="flex items-center text-purple-100">
                        <svg class="w-6 h-6 mr-3 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        Gratis untuk semua mahasiswa
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-8 lg:px-12">
            <div class="w-full max-w-md">
                <!-- Mobile Logo (hidden on desktop) -->
                <div class="lg:hidden text-center mb-6">
                    <div class="inline-block p-4 rounded-full bg-gradient-to-br from-indigo-400 via-purple-400 to-pink-400 shadow-2xl mb-4 animate-pulse-glow">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-2 drop-shadow-lg">Bergabung dengan Kami</h1>
                    <p class="text-purple-200 text-lg font-light">Mulai perjalanan KP Anda hari ini!</p>
                </div>

                <!-- Glass Morphism Card -->
                <div class="backdrop-blur-xl bg-white/10 rounded-3xl p-8 shadow-2xl border border-white/20 relative overflow-hidden">
                    <!-- Card Glow Effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-400/20 via-purple-400/20 to-pink-400/20 rounded-3xl blur-xl"></div>
                    
                    <!-- Desktop Form Title -->
                    <div class="hidden lg:block text-center mb-6">
                        <h2 class="text-3xl font-bold text-white mb-2">Daftar Akun Baru</h2>
                        <p class="text-purple-200">Isi data diri Anda untuk memulai</p>
                    </div>
                    
                    <form wire:submit="register" class="relative z-10 space-y-6">
                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-purple-100 mb-2">Nama Lengkap</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input wire:model="name" 
                                       id="name" 
                                       type="text" 
                                       name="name" 
                                       required 
                                       autofocus 
                                       autocomplete="name"
                                       class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/20 focus:bg-white/20 focus:shadow-glow"
                                       placeholder="Masukkan nama lengkap Anda">
                            </div>
                            @error('name') 
                                <p class="mt-2 text-sm text-red-300 animate-shake">{{ $message }}</p> 
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-purple-100 mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <input wire:model="email" 
                                       id="email" 
                                       type="email" 
                                       name="email" 
                                       required 
                                       autocomplete="username"
                                       class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/20 focus:bg-white/20 focus:shadow-glow"
                                       placeholder="nama@email.com">
                            </div>
                            @error('email') 
                                <p class="mt-2 text-sm text-red-300 animate-shake">{{ $message }}</p> 
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-purple-100 mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input wire:model="password" 
                                       id="password" 
                                       type="password" 
                                       name="password" 
                                       required 
                                       autocomplete="new-password"
                                       class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/20 focus:bg-white/20 focus:shadow-glow"
                                       placeholder="Buat password yang kuat">
                            </div>
                            @error('password') 
                                <p class="mt-2 text-sm text-red-300 animate-shake">{{ $message }}</p> 
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-purple-100 mb-2">Konfirmasi Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <input wire:model="password_confirmation" 
                                       id="password_confirmation" 
                                       type="password" 
                                       name="password_confirmation" 
                                       required 
                                       autocomplete="new-password"
                                       class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/20 focus:bg-white/20 focus:shadow-glow"
                                       placeholder="Ulangi password Anda">
                            </div>
                            @error('password_confirmation') 
                                <p class="mt-2 text-sm text-red-300 animate-shake">{{ $message }}</p> 
                            @enderror
                        </div>

                        <!-- Register Button -->
                        <button type="submit" 
                                class="w-full py-3 px-6 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 hover:from-indigo-600 hover:via-purple-600 hover:to-pink-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 focus:ring-offset-transparent relative overflow-hidden group">
                            <span class="relative z-10 flex items-center justify-center">
                                <span wire:loading.remove class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                    Daftar Sekarang
                                </span>
                                <span wire:loading class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Mendaftarkan...
                                </span>
                            </span>
                            <!-- Glowing hover effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300 rounded-xl"></div>
                        </button>

                        <!-- Login Link -->
                        <div class="text-center">
                            <p class="text-purple-200">
                                Sudah punya akun? 
                                <a href="{{ route('login') }}" 
                                   wire:navigate
                                   class="text-purple-300 hover:text-white font-semibold transition-colors hover:underline">
                                    Masuk di sini
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="absolute bottom-4 left-0 right-0 text-center z-10">
        <p class="text-purple-300 text-sm">© 2025 KP Daily Log. Mari mulai journey KP yang amazing! ✨</p>
    </div>
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-80 h-80 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-40 right-10 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-10 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        <div class="absolute bottom-40 right-40 w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-6000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-blob animation-delay-8000"></div>
    </div>

    <!-- Floating Particles -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute animate-float-1 top-1/4 left-1/4 w-3 h-3 bg-white rounded-full opacity-40"></div>
        <div class="absolute animate-float-2 top-1/3 right-1/3 w-2 h-2 bg-pink-300 rounded-full opacity-50"></div>
        <div class="absolute animate-float-3 bottom-1/4 left-1/3 w-4 h-4 bg-purple-300 rounded-full opacity-30"></div>
        <div class="absolute animate-float-4 bottom-1/3 right-1/4 w-2 h-2 bg-indigo-300 rounded-full opacity-45"></div>
        <div class="absolute animate-float-5 top-2/3 left-1/2 w-3 h-3 bg-cyan-300 rounded-full opacity-35"></div>
        <div class="absolute animate-float-1 top-1/5 right-1/5 w-2 h-2 bg-yellow-300 rounded-full opacity-40"></div>
    </div>

    <!-- Main Register Container -->
    <div class="relative z-10 w-full max-w-lg">
        <!-- Logo/Brand Section -->
        <div class="text-center mb-8">
            <div class="inline-block p-4 rounded-full bg-gradient-to-br from-indigo-400 via-purple-400 to-pink-400 shadow-2xl mb-4 animate-pulse-glow">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2 drop-shadow-lg">Bergabung dengan Kami</h1>
            <p class="text-purple-200 text-lg font-light">Mulai perjalanan KP Anda hari ini!</p>
        </div>

        <!-- Glass Morphism Card -->
        <div class="backdrop-blur-xl bg-white/10 rounded-3xl p-8 shadow-2xl border border-white/20 relative overflow-hidden">
            <!-- Card Glow Effect -->
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-400/20 via-purple-400/20 to-pink-400/20 rounded-3xl blur-xl"></div>
            
            <form wire:submit="register" class="relative z-10 space-y-6">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-purple-100 mb-2">Nama Lengkap</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <input wire:model="name" 
                               id="name" 
                               type="text" 
                               name="name" 
                               required 
                               autofocus 
                               autocomplete="name"
                               class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/20 focus:bg-white/20 focus:shadow-glow"
                               placeholder="Masukkan nama lengkap Anda">
                    </div>
                    @error('name') 
                        <p class="mt-2 text-sm text-red-300 animate-shake">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-purple-100 mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input wire:model="email" 
                               id="email" 
                               type="email" 
                               name="email" 
                               required 
                               autocomplete="username"
                               class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/20 focus:bg-white/20 focus:shadow-glow"
                               placeholder="nama@email.com">
                    </div>
                    @error('email') 
                        <p class="mt-2 text-sm text-red-300 animate-shake">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-purple-100 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input wire:model="password" 
                               id="password" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="new-password"
                               class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/20 focus:bg-white/20 focus:shadow-glow"
                               placeholder="Buat password yang kuat">
                    </div>
                    @error('password') 
                        <p class="mt-2 text-sm text-red-300 animate-shake">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-purple-100 mb-2">Konfirmasi Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <input wire:model="password_confirmation" 
                               id="password_confirmation" 
                               type="password" 
                               name="password_confirmation" 
                               required 
                               autocomplete="new-password"
                               class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/20 focus:bg-white/20 focus:shadow-glow"
                               placeholder="Ulangi password Anda">
                    </div>
                    @error('password_confirmation') 
                        <p class="mt-2 text-sm text-red-300 animate-shake">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Register Button -->
                <button type="submit" 
                        class="w-full py-3 px-6 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 hover:from-indigo-600 hover:via-purple-600 hover:to-pink-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 focus:ring-offset-transparent relative overflow-hidden group">
                    <span class="relative z-10 flex items-center justify-center">
                        <span wire:loading.remove class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Daftar Sekarang
                        </span>
                        <span wire:loading class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Mendaftarkan...
                        </span>
                    </span>
                    <!-- Glowing hover effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300 rounded-xl"></div>
                </button>

                <!-- Login Link -->
                <div class="text-center">
                    <p class="text-purple-200">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" 
                           wire:navigate
                           class="text-purple-300 hover:text-white font-semibold transition-colors hover:underline">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-purple-300 text-sm">© 2025 KP Daily Log. Mari mulai journey KP yang amazing! ✨</p>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        
        @keyframes float-1 {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        @keyframes float-2 {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(-180deg); }
        }
        
        @keyframes float-3 {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-25px) rotate(90deg); }
        }
        
        @keyframes float-4 {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-18px) rotate(-90deg); }
        }
        
        @keyframes float-5 {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-22px) rotate(270deg); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(168, 85, 247, 0.4); }
            50% { box-shadow: 0 0 40px rgba(168, 85, 247, 0.8); }
        }
        
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        
        .animation-delay-6000 {
            animation-delay: 6s;
        }
        
        .animation-delay-8000 {
            animation-delay: 8s;
        }
        
        .animate-float-1 { animation: float-1 6s ease-in-out infinite; }
        .animate-float-2 { animation: float-2 8s ease-in-out infinite; }
        .animate-float-3 { animation: float-3 7s ease-in-out infinite; }
        .animate-float-4 { animation: float-4 9s ease-in-out infinite; }
        .animate-float-5 { animation: float-5 5s ease-in-out infinite; }
        
        .animate-pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }
        
        .animate-fade-in {
            animation: fade-in 0.5s ease-out;
        }
        
        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }
        
        .focus\:shadow-glow:focus {
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.3);
        }
    </style>
</div>
