<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="font-roboto antialiased">
    <div class="flex flex-col min-h-screen">
        <!-- Page Heading -->
        <header class="bg-white h-16 px-6 flex items-center justify-between border-b">
            <x-application-logo class="w-11 h-11 fill-current text-gray-500" />

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        @include('partials.notifications-user')
                    @else
                        <!-- Register or Login -->
                        {{ $authAction }}
                        {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif
		</header>

        <!-- Page Content -->
        {{-- <main class="flex-1 grid grid-cols-12 gap-x-6 items-center justify-between px-6 lg:px-20">
            <!-- Auth Form -->
            <div class="col-span-12 lg:col-span-5">
                {{ $slot }}
            </div>

            <!-- Auth Illustration -->
            <div class="hidden lg:block col-span-0 lg:col-span-7">
                {{ $illustration }}
            </div>
        </main> --}}

        <main class="font-roboto antialiased">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
