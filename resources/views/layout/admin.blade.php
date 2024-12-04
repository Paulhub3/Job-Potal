<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    @production
    @php
        $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    @endphp
    <link rel="stylesheet" href="{{ asset('build/' . $manifest['resources/css/app.css']['file']) }}">
    <script type="module" src="{{ asset('build/' . $manifest['resources/js/app.js']['file']) }}"></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endproduction
</head>
<body class="bg-gray-100">

      <!-- Mobile Warning Overlay -->
      <div class="md:hidden fixed inset-0 z-50 bg-gray-900 text-white p-8 flex flex-col items-center justify-center text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
        <h2 class="text-2xl font-bold mb-4">Desktop Access Only</h2>
        <p class="text-gray-300">This platform is optimized for desktop use. Please access it from a computer for the best experience.</p>
    </div>

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        @include('layout.partials.sidebar')

        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            @include('layout.partials.navbar')

            <!-- Main Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
