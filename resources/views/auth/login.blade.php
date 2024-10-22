<x-guest-layout>
    <x-authentication-card class="shadow-lg rounded-lg overflow-hidden bg-white p-8 max-w-md mx-auto mt-16">
        <x-slot name="logo">
            <div class="flex justify-center mb-6">
                <x-authentication-card-logo class="h-16 w-16" />
            </div>
        </x-slot>

        <x-validation-errors class="mb-4 p-4 bg-red-100 text-red-700 rounded-md" />

        @if (session('status'))
            <div class="mb-4 p-4 text-sm font-medium text-green-600 bg-green-100 rounded-md">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" class="font-semibold" />
                <x-input id="email" class="block mt-2 w-full p-3 border rounded-md focus:ring focus:ring-indigo-300" 
                         type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div>
                <x-label for="password" value="{{ __('Password') }}" class="font-semibold" />
                <x-input id="password" class="block mt-2 w-full p-3 border rounded-md focus:ring focus:ring-indigo-300" 
                         type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:underline focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md" 
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4 bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md focus:ring focus:ring-indigo-300">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

