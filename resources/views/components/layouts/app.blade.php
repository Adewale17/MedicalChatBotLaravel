<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'MedicalBot' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <tallstackui:script />

    @livewireStyles
</head>
<body>

  @auth
    @if (Auth::guard('web')->check())
        @include('components.layouts.user.layout')
    @elseif (Auth::guard('doctor')->check())
        @include('components.layouts.doctor.layout')
    @else
        @include('components.layouts.guest.layout')
    @endif
@endauth

    @guest
        @include('components.layouts.guest.layout')
    @endguest
    @stack('scripts')

    @livewireScripts
    <script src="//unpkg.com/alpinejs" defer></script>

</body>
<!-- Alpine.js v3 CDN -->

</html>
