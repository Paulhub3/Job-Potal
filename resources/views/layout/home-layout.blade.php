<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gesundheit Portal</title>
    @production
    @php
        $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    @endphp
    <link rel="stylesheet" href="{{ asset('build/' . $manifest['resources/css/app.css']['file']) }}">
    <script type="module" src="{{ asset('build/' . $manifest['resources/js/app.js']['file']) }}"></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endproduction
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- AOS  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- FontAwesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    @livewireStyles
    <style>
        /* Fallback for mobile devices */
        @media (max-width: 767px) {
            [data-aos] {
                opacity: 1 !important;
                transform: none !important;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- livewire Navigation -->
    <livewire:home-navigation />
    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
    @livewireScripts
    <!-- AOS and GSAP Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true,
                offset: 0,
                duration: 800,
                easing: 'ease-in-out',
                delay: 0,
                disable: function() {
                    return window.innerWidth < 768; // Disable on mobile devices
                }
            });

            // Ensure content is visible on mobile
            if (window.innerWidth < 768) {
                document.querySelectorAll('[data-aos]').forEach(element => {
                    element.removeAttribute('data-aos');
                });
            }
        });

        // Handle resize events
        window.addEventListener('resize', function() {
            if (window.innerWidth < 768) {
                document.querySelectorAll('[data-aos]').forEach(element => {
                    element.removeAttribute('data-aos');
                });
            }
        });
        </script>
</body>
</html>
