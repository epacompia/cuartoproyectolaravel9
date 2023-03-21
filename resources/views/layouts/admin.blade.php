<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- css fontanswsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/efe1bdfe15.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-700">
    <x-banner />

    @php
        $links = [
            [
                'title' => 'Dashboard',
                'url' => route('admin.dashboard'),
                'active' => request()->routeIs('admin.dashboard'),
                'icon' =>'fa-solid fa-gauge-high'
            ],
            [
                'title' => 'Posts',
                'url' => route('admin.posts.index'),
                'active' => request()->routeIs('admin.posts.*'),
                'icon' =>'fa-solid fa-blog'
            ],
        ];

    @endphp

    <div class="flex" x-data="{
        open: false,
        openSidebar: true
     }">
        <div :class="{
            'lg:block': openSidebar,
        }" class="w-64 flex-shrink-0 hidden lg:block">






            @include('layouts.partials.admin.sidebar')



        </div>
        <div class="flex-1">
            @include('layouts.partials.admin.navigation')

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                {{ $slot }}
            </div>
        </div>

    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
