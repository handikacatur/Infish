<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        {{-- <div class="w-full"> --}}
            <form class="w-full" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="px-3 mb-3">
                    <x-label for="first_name" :value="__('Nama Depan')" class="block text-gray-700 text-sm font-bold mb-2"/>
                    <x-input id="first_name" class="shadow appearance-none border rounded py-2 px-3 w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="first_name" :value="old('first_name')" required autofocus />
                </div>
                <div class="px-3 mb-3">
                    <x-label for="last_name" :value="__('Nama Belakang')" class="block text-gray-700 text-sm font-bold mb-2"/>
                    <x-input id="last_name"  class="shadow appearance-none border rounded py-2 px-3 w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="first_name" :value="old('last_name')" required autofocus />
                </div>
                <div class="px-3 mb-2">
                    <x-label for="email" :value="__('Email')" class="w-full block text-gray-700 text-sm font-bold mb-2"/>
                    <x-input id="email" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" :value="old('email')" required />
                </div>
                <div class="px-3 mb-2">
                  <x-label for="password" :value="__('Password')" class="block text-gray-700 text-sm font-bold mb-2"/>
                  <x-input id="password" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div class="px-3 mb-2">
                  <x-label for="password_confirmation" :value="__('Confirm Password')" class="block text-gray-700 text-sm font-bold mb-2"/>
                  <x-input id="password_confirmation" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password_confirmation" required/>
                </div>
                <div class="px-3 mb-2">
                  <x-label for="phone_number" :value="__('Nomor Telepon')" class="block text-gray-700 text-sm font-bold mb-2"/>
                  <x-input id="phone_number" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" name="phone_number" :value="old('phone_number')" required/>
                </div>
                <div class="px-3 mb-2">
                <x-label :value="__('Daftar Sebagai :')"  class="block text-gray-700 text-sm font-bold mb-2"/>
                
                <div class="relative">
                  <x-input-select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="register_as">
                    <option value="1">Investor</option>
                    <option value="2">Mitra</option>
                  </x-input-select>
                </div>
              </div>
              <br>
              
              <div class="w-full block px-3">
                <x-button class="items-center w-full h-14 shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                    {{ __('Register')}}
                </x-button>
              </div>

              <a class="my-4 mx-3 block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('login') }}">
                  {{ __('Already registered?') }}
              </a>
            </form>
          </div>

    </x-auth-card>
</x-guest-layout>
