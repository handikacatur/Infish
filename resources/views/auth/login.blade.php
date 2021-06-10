<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        {{-- <div class="wx-full"> --}}
            <form class="w-full" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="w-full px-3 mb-4">
                    <x-label for="email" :value="__('Email')" class="w-full block text-gray-700 text-sm font-bold mb-2 text-left h-custom-text-blue"/>
                    <x-input id="email" class="shadow appearance-none block border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" :value="old('email')" required />
                </div>
                <div class="w-full px-3">
                    <x-label for="password" :value="__('Password')" class="block text-gray-700 text-sm font-bold mb-2 text-left"/>
                    <x-input id="password" class="shadow appearance-none block border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" required autocomplete="new-password" />
                </div>
                <br>
                <!-- Remember Me -->
                <div class="w-full block px-3">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="appearance-none rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="w-full block px-3 text-center">
                    <x-button class="w-full h-14 m-auto shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold text-center py-3 rounded">
                        {{ __('Log in')}}
                    </x-button>
                </div>
                <a class="my-4 mx-3 block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('register') }}">
                    {{ __('Belum Punya Akun ?') }}
                </a>
                @if (Route::has('password.request'))
                <div class="w-full my-3 content-center">
                    <a class="px-3 align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
                @endif
            </form>
          {{-- </div> --}}

        </form>
    </x-auth-card>
</x-guest-layout>
