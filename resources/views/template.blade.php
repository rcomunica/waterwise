<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'WaterWise')}} - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dashboard.js'])
    @livewireStyles

</head>

<body>

    <div class="min-h-screen bg-gray-100 flex flex-col">
        {{-- NAV BAR--}}
        @livewire('navigation-menu')
        {{-- contain --}}
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')


    @livewireScripts

</body>


</html>