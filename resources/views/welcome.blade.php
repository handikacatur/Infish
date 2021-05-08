<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Infish | Soon</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/extern.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/logo/emblem-infish.svg') }}" type="image/x-icon">

    </head>
    <body class="antialiased bg-gradient-to-r from-blue-900 via-blue-500 to-blue-900">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-200 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-200 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-200 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" style="width: 450px; height: 450px;">
                <div class="text-center p-10 pt-36 h-full w-full bg-white shadow h-custom-curve inline-block align-middle">
                    <a href="/" class="text-center inline-block align-middle">
                        <x-application-logo class="w-24 h-24" />
                    </a>
                    <br><br>
                    <hr>
                    <p class="mt-5 italic inline-block align-middle"><strong>Coming Soon</strong></p>
                </div>
            </div>
        </div>
    </body>
</html>
