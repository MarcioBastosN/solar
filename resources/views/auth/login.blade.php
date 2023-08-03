<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex">

        <div class="hidden bg-primary lg:block lg:w-2/3">
            <div class="flex items-center h-full px-20 bg-primary bg-opacity-40">
                <div>
                    <h1 class="text-6xl font-bold text-white">Solar - Paula Silva</h1>
                    <p class="mt-3 text-lg max-w-3xl text-gray-300">
                        Sistema de coleta de dados e aconpanhamento de processos
                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-full px-6 mx-auto lg:w-2/6 h-screen">
            <div class="flex flex-col w-full mx-auto my-auto max-w-lg">

                <div class="text-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('LOGO PRIMARIA FUNDO TRANSPARENTE.svg') }}" alt="" class="w-64">
                    </div>
                    <div class="text-bold text-lg text-gray-600">Faça login para acessar sua conta</div>
                </div>

                <div class="mt-4">
                    {{-- form --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Esqueceu a senha?') }}
                                </a>
                            @endif

                            <x-primary-button class="ml-3">
                                {{ __('Entrar') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <a href="{{ route('welcome') }}" class="text-sm">Home</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
