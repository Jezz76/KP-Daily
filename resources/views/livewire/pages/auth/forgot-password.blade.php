<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div class="min-h-screen w-full bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-20 right-20 w-80 h-80 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-20 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-6000"></div>
    </div>

    <!-- Floating Particles -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute animate-float-1 top-1/4 left-1/4 w-2 h-2 bg-white rounded-full opacity-30"></div>
        <div class="absolute animate-float-2 top-1/3 right-1/3 w-1 h-1 bg-blue-300 rounded-full opacity-40"></div>
        <div class="absolute animate-float-3 bottom-1/4 left-1/3 w-3 h-3 bg-indigo-300 rounded-full opacity-25"></div>
        <div class="absolute animate-float-4 bottom-1/3 right-1/4 w-2 h-2 bg-purple-300 rounded-full opacity-35"></div>
    </div>

    <!-- Main Content Grid Layout -->
    <div class="relative z-10 min-h-screen flex">
        <!-- Left Side - Branding/Info Section -->
        <div class="hidden lg:flex lg:w-1/2 flex-col justify-center items-center px-12 text-center">
            <div class="max-w-lg">
                <!-- Large Brand Logo -->
                <div class="inline-block p-6 rounded-full bg-gradient-to-br from-blue-400 to-purple-400 shadow-2xl mb-8 animate-pulse-glow">
                    <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                </div>
                
                <h1 class="text-6xl font-bold text-white mb-6 drop-shadow-lg">
                    Lupa Password?
                </h1>
                <p class="text-2xl text-blue-200 mb-8 font-light leading-relaxed">
                    Jangan khawatir! Hal ini sering terjadi pada semua orang. Kami akan membantu Anda mendapatkan kembali akses ke akun Anda.
                </p>
                
                <!-- Help steps -->
                <div class="space-y-4 text-left">
                    <div class="flex items-start text-blue-100">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3 mt-0.5">1</div>
                        <div>
                            <p>Masukkan alamat email yang terdaftar</p>
                        </div>
                    </div>
                    <div class="flex items-start text-blue-100">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3 mt-0.5">2</div>
                        <div>
                            <p>Kami akan mengirim link reset password</p>
                        </div>
                    </div>
                    <div class="flex items-start text-blue-100">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3 mt-0.5">3</div>
                        <div>
                            <p>Klik link dan buat password baru</p>
                        </div>
                    </div>
                    <div class="flex items-start text-blue-100">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3 mt-0.5">4</div>
                        <div>
                            <p>Login dengan password baru Anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Reset Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-8 lg:px-12">
            <div class="w-full max-w-md">
                <!-- Mobile Logo (hidden on desktop) -->
                <div class="lg:hidden text-center mb-8">
                    <div class="inline-block p-4 rounded-full bg-gradient-to-br from-blue-400 to-purple-400 shadow-2xl mb-4 animate-pulse-glow">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-2 drop-shadow-lg">Lupa Password?</h1>
                    <p class="text-blue-200 text-lg font-light">Jangan khawatir, kami akan bantu!</p>
                </div>

                <!-- Glass Morphism Card -->
                <div class="backdrop-blur-xl bg-white/10 rounded-3xl p-8 shadow-2xl border border-white/20 relative overflow-hidden">
                    <!-- Card Glow Effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400/20 to-purple-400/20 rounded-3xl blur-xl"></div>
                    
                    <!-- Desktop Form Title -->
                    <div class="hidden lg:block text-center mb-6">
                        <h2 class="text-3xl font-bold text-white mb-2">Reset Password</h2>
                        <p class="text-blue-200">Masukkan email untuk reset password</p>
                    </div>
                    
                    <!-- Description -->
                    <div class="relative z-10 mb-6 p-4 bg-white/5 rounded-xl border border-white/10">
                        <p class="text-blue-100 text-sm leading-relaxed">
                            Masukkan alamat email Anda dan kami akan mengirimkan link untuk reset password. 
                            Periksa inbox atau folder spam Anda setelah mengirim.
                        </p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-6 p-4 bg-green-500/20 border border-green-400/30 rounded-xl text-green-100 backdrop-blur-sm animate-fade-in">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif

                    <form wire:submit="sendPasswordResetLink" class="relative z-10">
                        <!-- Email Address -->
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-blue-100 mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <input wire:model="email" 
                                       id="email" 
                                       type="email" 
                                       name="email" 
                                       required 
                                       autofocus
                                       class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/20 focus:bg-white/20 focus:shadow-glow"
                                       placeholder="masukkan@email.com">
                            </div>
                            @error('email') 
                                <p class="mt-2 text-sm text-red-300 animate-shake">{{ $message }}</p> 
                            @enderror
                        </div>

                        <!-- Send Reset Link Button -->
                        <button type="submit" 
                                class="w-full py-3 px-6 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-transparent relative overflow-hidden group">
                            <span class="relative z-10 flex items-center justify-center">
                                <span wire:loading.remove class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Kirim Link Reset Password
                                </span>
                                <span wire:loading class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Mengirim email...
                                </span>
                            </span>
                            <!-- Glowing hover effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300 rounded-xl"></div>
                        </button>

                        <!-- Back to Login Link -->
                        <div class="text-center mt-6">
                            <p class="text-blue-200">
                                Ingat password Anda? 
                                <a href="{{ route('login') }}" 
                                   wire:navigate
                                   class="text-blue-300 hover:text-white font-semibold transition-colors hover:underline">
                                    Kembali ke Login
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
        <p class="text-blue-300 text-sm">© 2025 KP Daily Log. Kami siap membantu Anda! 🔐</p>
    </div>
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-20 right-20 w-64 h-64 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-20 w-64 h-64 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        <div class="absolute bottom-10 right-10 w-64 h-64 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-6000"></div>
    </div>

    <!-- Floating Particles -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute animate-float-1 top-1/4 left-1/4 w-2 h-2 bg-white rounded-full opacity-30"></div>
        <div class="absolute animate-float-2 top-1/3 right-1/3 w-1 h-1 bg-blue-300 rounded-full opacity-40"></div>
        <div class="absolute animate-float-3 bottom-1/4 left-1/3 w-3 h-3 bg-indigo-300 rounded-full opacity-25"></div>
        <div class="absolute animate-float-4 bottom-1/3 right-1/4 w-2 h-2 bg-purple-300 rounded-full opacity-35"></div>
    </div>

    <!-- Main Container -->
    <div class="relative z-10 w-full max-w-md">
        <!-- Logo/Brand Section -->
        <div class="text-center mb-8">
            <div class="inline-block p-4 rounded-full bg-gradient-to-br from-blue-400 to-purple-400 shadow-2xl mb-4 animate-pulse-glow">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2 drop-shadow-lg">Lupa Password?</h1>
            <p class="text-blue-200 text-lg font-light">Jangan khawatir, kami akan bantu!</p>
        </div>

        <!-- Glass Morphism Card -->
        <div class="backdrop-blur-xl bg-white/10 rounded-3xl p-8 shadow-2xl border border-white/20 relative overflow-hidden">
            <!-- Card Glow Effect -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-400/20 to-purple-400/20 rounded-3xl blur-xl"></div>
            
            <!-- Description -->
            <div class="relative z-10 mb-6 p-4 bg-white/5 rounded-xl border border-white/10">
                <p class="text-blue-100 text-sm leading-relaxed">
                    Masukkan alamat email Anda dan kami akan mengirimkan link untuk reset password. 
                    Periksa inbox atau folder spam Anda setelah mengirim.
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-6 p-4 bg-green-500/20 border border-green-400/30 rounded-xl text-green-100 backdrop-blur-sm animate-fade-in">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <form wire:submit="sendPasswordResetLink" class="relative z-10">
                <!-- Email Address -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-blue-100 mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input wire:model="email" 
                               id="email" 
                               type="email" 
                               name="email" 
                               required 
                               autofocus
                               class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/20 focus:bg-white/20 focus:shadow-glow"
                               placeholder="masukkan@email.com">
                    </div>
                    @error('email') 
                        <p class="mt-2 text-sm text-red-300 animate-shake">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Send Reset Link Button -->
                <button type="submit" 
                        class="w-full py-3 px-6 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-transparent relative overflow-hidden group">
                    <span class="relative z-10 flex items-center justify-center">
                        <span wire:loading.remove class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Kirim Link Reset Password
                        </span>
                        <span wire:loading class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Mengirim email...
                        </span>
                    </span>
                    <!-- Glowing hover effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300 rounded-xl"></div>
                </button>

                <!-- Back to Login Link -->
                <div class="text-center mt-6">
                    <p class="text-blue-200">
                        Ingat password Anda? 
                        <a href="{{ route('login') }}" 
                           wire:navigate
                           class="text-blue-300 hover:text-white font-semibold transition-colors hover:underline">
                            Kembali ke Login
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-blue-300 text-sm">© 2025 KP Daily Log. Kami siap membantu Anda! 🔐</p>
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
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.4); }
            50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.8); }
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
        
        .animate-float-1 { animation: float-1 6s ease-in-out infinite; }
        .animate-float-2 { animation: float-2 8s ease-in-out infinite; }
        .animate-float-3 { animation: float-3 7s ease-in-out infinite; }
        .animate-float-4 { animation: float-4 9s ease-in-out infinite; }
        
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
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }
    </style>
</div>
