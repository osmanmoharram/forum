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
    <link rel="stylesheet" href="{{ asset('css\highlight.js\styles\tomorrow-night-blue.css') }}">
</head>

<body class="overflow-hidden font-roboto antialiased">

    <div class="flex flex-col min-h-screen">
        <!-- Page Heading -->
        <header class="bg-white h-16 px-6 flex items-center justify-between border-b">
            <x-application-logo />

			{{ $action }}
		</header>

        <main class="font-roboto antialiased">
            {{ $slot }}
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

