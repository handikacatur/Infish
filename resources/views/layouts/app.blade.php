<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="data()">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Infish app') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/extern.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('assets/css/dropzone.min.css')}}">
        @isset($extraCSS)
            {{$extraCSS}}
        @endisset

        
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/logo/emblem-infish.svg') }}" type="image/x-icon">
        <link href="{{ asset('vendor/fontawesome-free-5.15.3/css/all.min.css')}}" rel="stylesheet" type="text/css">
        
        {{-- <link rel="stylesheet" href="./assets/css/tailwind.output.css" /> --}}
    </head>
    <body class="font-sans antialiased">
        <div class="flex h-screen" :class="{ 'overflow-hidden': isSideMenuOpen}">
        <!-- Desktop sidebar -->
        <aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block">
            <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                Infish
            </a>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/dashboard') }}">
                    <i class="fa fa-server"></i>
                    <span class="ml-4">Dashboard</span>
                </a>
                </li>
            </ul>
            @role('partner')
              <ul>
                  <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/company-profile') }}">
                      <i class="fa fa-address-book"></i>
                      <span class="ml-4">Profil usaha</span>
                  </a>
                  </li>
              </ul>
              <ul>
                  <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/sale') }}">
                      <i class="fa fa-chart-line"></i>
                      <span class="ml-4">Penjualan</span>
                  </a>
                  </li>
              </ul>
              <ul>
                  <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/progress') }}">
                      <i class="fa fa-external-link-alt"></i>
                      <span class="ml-4">Perkembangan</span>
                  </a>
                  </li>
              </ul>
              <ul>
                  <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/submission') }}">
                      <i class="fa fa-coins"></i>
                      <span class="ml-4">Pengajuan Dana</span>
                  </a>
                  </li>
              </ul>
            @endrole
            @role('investor')
              <ul>
                  <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/invest-partner') }}">
                      <i class="fa fa-fish"></i>
                      <span class="ml-4">Mitra Perikanan</span>
                  </a>
                  </li>
              </ul>
              <ul>
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/transaction-investation') }}">
                    <i class="fa fa-clock"></i>
                    <span class="ml-4">Riwayat Transaksi</span>
                </a>
                </li>
              </ul>
            @endrole
            @role('admin')
              <hr class="w-52 m-auto">
              <ul>
                <li class="relative pl-10 py-3">
                  <span>KONFIRMASI</span>
                </li>
              </ul>
              <ul>
                <li class="relative px-6 pb-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/confirm-partner') }}">
                    <i class="fa fa-user-clock"></i>
                    <span class="ml-4">Konfirmasi Mitra - Profil Mitra</span>
                </a>
                </li>
              </ul>
              <ul>
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/confirm-progress') }}">
                    <i class="fa fa-user-tag"></i>
                    <span class="ml-4">Konfirmasi Mitra - Perkembangan</span>
                </a>
                </li>
              </ul>
              <ul>
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/confirm-submission') }}">
                    <i class="fa fa-user-check"></i>
                    <span class="ml-4">Konfirmasi Mitra - Pengajuan</span>
                </a>
                </li>
              </ul>
              <hr class="w-52 m-auto">
              <ul>
                <li class="relative pl-10 py-3">
                  <span>MITRA</span>
                </li>
              </ul>
              <ul>
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/detail-partner') }}">
                    &nbsp;<i class="fa fa-address-book"></i>
                    <span class="ml-4">Detail Mitra</span>
                </a>
                </li>
              </ul>
              <hr class="w-52 m-auto">
              <ul>
                <li class="relative pl-10 py-3">
                  <span>MASTER</span>
                </li>
              </ul>
              <ul>
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/master-fish') }}">
                    &nbsp;<i class="fa fa-fish"></i>
                    <span class="ml-4">Ikan</span>
                </a>
                </li>
              </ul>
            @endrole

            <div class="px-6 my-6">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">
                  Logout <span class="ml-2" aria-hidden="true"><i class="fa fa-lock-open"></i></span>
                </button>
              </form>
            </div>
            </div>
        </aside>
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" style="display: none;"></div>
        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu" style="display: none;">
            <div class="py-4 text-gray-500 dark:text-gray-400">
              <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                Infish
            </a>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/dashboard') }}">
                    <i class="fa fa-server"></i>
                    <span class="ml-4">Dashboard</span>
                </a>
                </li>
            </ul>
            @role('partner')
              <ul>
                  <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/company-profile') }}">
                      <i class="fa fa-address-book"></i>
                      <span class="ml-4">Profil usaha</span>
                  </a>
                  </li>
              </ul>
              <ul>
                  <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/sale') }}">
                      <i class="fa fa-chart-line"></i>
                      <span class="ml-4">Penjualan</span>
                  </a>
                  </li>
              </ul>
              <ul>
                  <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/progress') }}">
                      <i class="fa fa-external-link-alt"></i>
                      <span class="ml-4">Perkembangan</span>
                  </a>
                  </li>
              </ul>
              <ul>
                  <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/submission') }}">
                      <i class="fa fa-coins"></i>
                      <span class="ml-4">Pengajuan Dana</span>
                  </a>
                  </li>
              </ul>
            @endrole
            @role('investor')
              <ul>
                  <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/invest-partner') }}">
                      <i class="fa fa-fish"></i>
                      <span class="ml-4">Mitra Perikanan</span>
                  </a>
                  </li>
              </ul>
              <ul>
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/transaction-investation') }}">
                    <i class="fa fa-clock"></i>
                    <span class="ml-4">Riwayat Transaksi</span>
                </a>
                </li>
              </ul>
            @endrole
            @role('admin')
              <hr class="w-52 m-auto">
              <ul>
                <li class="relative pl-10 py-3">
                  <span>KONFIRMASI</span>
                </li>
              </ul>
              <ul>
                <li class="relative px-6 pb-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/confirm-partner') }}">
                    <i class="fa fa-user-clock"></i>
                    <span class="ml-4">Konfirmasi Mitra - Profil Mitra</span>
                </a>
                </li>
              </ul>
              <ul>
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/confirm-progress') }}">
                    <i class="fa fa-user-tag"></i>
                    <span class="ml-4">Konfirmasi Mitra - Perkembangan</span>
                </a>
                </li>
              </ul>
              <ul>
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/confirm-submission') }}">
                    <i class="fa fa-user-check"></i>
                    <span class="ml-4">Konfirmasi Mitra - Pengajuan</span>
                </a>
                </li>
              </ul>
              <hr class="w-52 m-auto">
              <ul>
                <li class="relative pl-10 py-3">
                  <span>MITRA</span>
                </li>
              </ul>
              <ul>
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/detail-partner') }}">
                    &nbsp;<i class="fa fa-address-book"></i>
                    <span class="ml-4">Detail Mitra</span>
                </a>
                </li>
              </ul>
              <hr class="w-52 m-auto">
              <ul>
                <li class="relative pl-10 py-3">
                  <span>MASTER</span>
                </li>
              </ul>
              <ul>
                <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ url('/master-fish') }}">
                    &nbsp;<i class="fa fa-fish"></i>
                    <span class="ml-4">Ikan</span>
                </a>
                </li>
              </ul>
            @endrole
            <ul>
                <li class="relative px-6 py-3">
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">
                      Logout <span class="ml-2" aria-hidden="true"><i class="fa fa-lock-open"></i></span>
                    </button>
                  </form>
                </li>
            </ul>
            </div>
        </aside>
        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
              <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                <!-- Mobile hamburger -->
                <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                  </svg>
                </button>
                <!-- Search input -->
                <div class="flex justify-center flex-1 lg:mr-32">
                  {{-- <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                  </div> --}}
                </div>
                <ul class="flex items-center flex-shrink-0 space-x-6">
                  
                  {{-- <!-- Notifications menu -->
                  <li class="relative">
                    <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
                      <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                      </svg>
                      <!-- Notification badge -->
                      <span aria-hidden="true" class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                    </button>
                    <template x-if="isNotificationsMenuOpen">
                      <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeNotificationsMenu" @keydown.escape="closeNotificationsMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700" aria-label="submenu">
                        <li class="flex">
                          <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                            <span>Messages</span>
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                              13
                            </span>
                          </a>
                        </li>
                        <li class="flex">
                          <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                            <span>Sales</span>
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                              2
                            </span>
                          </a>
                        </li>
                        <li class="flex">
                          <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                            <span>Alerts</span>
                          </a>
                        </li>
                      </ul>
                    </template>
                  </li> --}}

                  <!-- Profile menu -->
                  <li class="relative">
                    <button class="font-bold text-gray-900 align-middle rounded-full focus:shadow-outline-purple focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                      {{-- <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;s=aa3a807e1bbdfd4364d1f449eaa96d82" alt="" aria-hidden="true"> --}}
                      {{\Auth::user()->name}} &nbsp; <i class="fas fa-user w-4 h-4 mr-3"></i>
                    </button>
                    <template x-if="isProfileMenuOpen">
                      <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu">
                        @hasrole('partner')
                        <li class="flex">
                          <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="{{url('edit-profile')}}">
                            <i class="fas fa-user w-4 h-4 mr-3"></i>
                            <span>Profil Akun</span>
                          </a>
                        </li>
                        @endrole
                        @hasrole('investor')
                        <li class="flex">
                          <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="{{url('edit-profile-investor')}}">
                            <i class="fas fa-user w-4 h-4 mr-3"></i>
                            <span>Profil Akun</span>
                          </a>
                        </li>
                        @endrole
                        @hasrole('admin')
                        <li class="flex">
                          <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="{{url('edit-profile-admin')}}">
                            <i class="fas fa-user w-4 h-4 mr-3"></i>
                            <span>Profil Akun</span>
                          </a>
                        </li>
                        @endrole
                        <li class="flex">                          
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                              @csrf
                              {{-- <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa fa-sign-out-alt w-4 h-4 mr-3"></i>Log out</a> --}}
                              <x-dropdown-link :href="route('logout')"
                                      onclick="event.preventDefault();
                                                  this.closest('form').submit();">
                                                  <i class="fa fa-sign-out-alt w-4 h-4 mr-3"></i>
                                  {{ __('Log out') }}
                              </x-dropdown-link>
                          </form>
                        </li>
                      </ul>
                    </template>
                  </li>
                </ul>
              </div>
            </header>
            <main class="h-full pb-16 overflow-y-auto min-w-full md:min-w-0">
                <div class="container grid px-6 mx-auto py-10">
                  @isset($header)
                  {{ $header }}
                  @endisset
                {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ url('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js') }}" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
</body>
</html>
