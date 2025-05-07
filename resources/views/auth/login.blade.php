<head>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>


    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
</head>
<style>
    .animate__fadeInUp {
        animation-duration: 1s !important;  
    }
</style>

<x-guest-layout>
    
        
        <div class="flex items-center justify-center px-4 py-8 animate__animated animate__fadeInUp animate__delay-1s">
            <div class="w-full max-w-md md:max-w-lg space-y-6 bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">
                
              
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/cl.png') }}" alt="Logo" class="h-16">
                </div>

               
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Welcome Back</h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Sign in to continue</p>
                </div>

               
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                 
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="dark:text-gray-200" />
                        <x-text-input id="email" class="block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                   
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="dark:text-gray-200" />
                        <x-text-input id="password" class="block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-300">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                 
                    <div class="flex flex-col gap-3">
                        <x-primary-button class="w-full justify-center bg-[#006747] hover:bg-[#005a3e] dark:bg-[#005a3e] dark:hover:bg-[#004c32]">
                            {{ __('Log in') }}
                        </x-primary-button>

                        <div class="flex justify-between gap-2">
                            <a href="{{ url('/') }}" class="w-full text-center py-2 px-4 rounded-lg border border-gray-300 text-sm text-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700 transition">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button class="ms-3 animate__animated animate__spin animate__slow">
                                <a href="{{ route('terms') }}">
                                    {{ __('Register') }}
                                </a>
                            </x-primary-button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
