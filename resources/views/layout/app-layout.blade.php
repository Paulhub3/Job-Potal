<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Find jobs with Gesundheit Personnel Netz">
    <meta name="theme-color" content="#ffffff">

    <title>{{ config('app.name', 'Find Job') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png">

    <!-- Preload critical assets -->
    <link rel="preload" href="/images/GlobalGPN-logoG.png" as="image">

    <!-- Styles -->
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.3s ease-out;
        }

        .preloader.fade-out {
            opacity: 0;
        }

        /* Google Translate Widget */
        .translate-widget {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 9999;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 8px 12px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .translate-widget:hover {
            background-color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .goog-te-gadget-simple {
            background-color: transparent !important;
            border: none !important;
            font-size: 16px !important;
            line-height: 1.4 !important;
            padding: 0 !important;
            display: flex !important;
            align-items: center !important;
        }

        .goog-te-gadget-icon {
            display: none !important;
        }

        /* Main Layout */
        .main-content {
            min-height: calc(100vh - 144px); /* Adjust based on header + footer height */
            margin-top: 72px; /* Height of navbar */
            margin-bottom: 72px; /* Height of footer */
        }

        /* Progress Bar Animation */
        @keyframes progressAnimation {
            0% { width: 0; }
            100% { width: var(--progress-width); }
        }

        .progress-bar {
            animation: progressAnimation 0.6s ease-out forwards;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-200 antialiased">
    <!-- Preloader -->
    <div class="preloader">
        <div class="flex flex-col items-center">
            <img src="/images/GlobalGPN-logoG.png" alt="Loading..." class="w-24 h-auto mb-4 animate-pulse">
            <div class="w-24 h-1 bg-gray-200 rounded-full overflow-hidden">
                <div class="w-full h-full bg-blue-600 animate-[loading_1s_ease-in-out_infinite]"></div>
            </div>
        </div>
    </div>

    <!-- Main Layout Container -->
    <div class="flex flex-col min-h-screen">
        <!-- Navbar -->
        <nav class="fixed top-0 z-50 w-full bg-white shadow-md transition-transform duration-300">
            <div class="max-w-full px-4 py-2 mx-auto sm:px-6 lg:px-8 lg:py-4">
                <a href="/" class="flex justify-center transition-transform hover:scale-105 duration-300">
                    <img src="/images/GlobalGPN-logoG.png"
                         alt="GlobalGPN-logo"
                         class="w-36 md:w-40"
                         width="160"
                         height="40">
                </a>
            </div>
        </nav>
        

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="fixed bottom-0 w-full bg-white shadow-md">
            <div class="px-4 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="text-center text-gray-600 text-sm md:text-base">
                    &copy; {{ date('Y') }} Gesundheit Personnel Netz. All rights reserved.
                </div>
            </div>
        </footer>
    </div>

    <!-- Google Translate Widget -->
    <div id="google_translate_element" class="translate-widget"></div>

    <!-- Scripts -->
    <script>
        // Preloader
        window.addEventListener('load', function() {
            const preloader = document.querySelector('.preloader');
            preloader.classList.add('fade-out');
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 300);
        });

        // Google Translate
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'fr,de,it',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }

        // Handle page transitions
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading class to links
            document.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function() {
                    if (!this.hasAttribute('target') && this.getAttribute('href') !== '#') {
                        document.body.classList.add('loading');
                    }
                });
            });

            // Handle form submissions
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function() {
                    document.body.classList.add('loading');
                });
            });
        });
    </script>

    <!-- Google Translate Script -->
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" async defer></script>

    @stack('scripts')

    <style>
        @keyframes loading {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .loading::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, transparent, #3b82f6, transparent);
            animation: loading 1.5s infinite;
            z-index: 9999;
        }
    </style>
</body>
</html>
