<head>
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

    <!-- Animate.css -->
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
</head>

<x-guest-layout>
  

        <!-- Register Form Wrapper with Animation -->
         <div class="flex items-center justify-center px-4 py-8  ">
            <div class="w-full max-w-md md:max-w-lg space-y-6 bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">
          
                <!-- Logo -->
                       <div class="flex justify-center mb-6">
                    <img src="{{ asset('images/cl.png') }}" alt="Logo" class="h-28 w-auto drop-shadow-lg ">
                </div>
            
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 text-center">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Back to Login') }}
                    </a>
                    
                    <x-primary-button class="px-2 py-1 text-sm">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
