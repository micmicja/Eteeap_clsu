<head>
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

    <!-- Animate.css -->
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
</head>

<x-guest-layout>
    <!-- Full Page Container with Animation -->
    <div x-data="{ darkMode: false }" :class="{ 'dark': darkMode }" class="min-h-screen bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
        
        <!-- Dark Mode Toggle Button -->
        <div class="flex justify-end p-4">
            <button @click="darkMode = !darkMode" class="text-sm text-gray-600 dark:text-gray-300">
                <span x-text="darkMode ? '🌙 Dark' : '☀️ Light'"></span> Mode
            </button>
        </div>

        <!-- Register Form Wrapper with Animation -->
        <div class="flex items-center justify-center px-4 py-8 animate__animated animate__fadeInUp animate__delay-0.5s animate__slow">
            <div class="w-full max-w-md md:max-w-lg space-y-6 bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">
                
                <!-- Logo -->
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/logo12.png') }}" alt="Logo" class="h-16">
                </div>

                <!-- Welcome Text -->
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Create Account</h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Sign up to get started</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" class="dark:text-gray-200" />
                        <x-text-input id="name" class="block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" class="dark:text-gray-200" />
                        <x-text-input id="email" class="block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" class="dark:text-gray-200" />
                        <x-text-input id="password" class="block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="dark:text-gray-200" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
