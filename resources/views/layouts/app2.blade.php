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

<body class="font-roboto antialiased min-h-screen overflow-y-hidden">
    <div class="bg-gray-100 flex flex-col">
        <!-- Page Heading -->
        @include('partials.header')

        <main class="flex items-start">
            <!-- Sidebar -->
            @include('partials.side-bar')

            <div class="p-8 pb-16 sm:ml-52 flex-1 h-screen overflow-y-auto">
                <!-- Page Content -->
                {{ $slot }}
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        Alpine.data('previewTopicBody', () => {
            return {
                show: false,
                        
                tags: [],
                newTag: '',

                addTag(tag) {
                    this.tags.push(tag);
                    this.newTag = '';
                },

                removeTag(tag) {
                    filterdTags = this.tags.filter((value) => value !== tag);
                    this.tags = filterdTags;
                },
            }
        });
    </script>
</body>

</html>
