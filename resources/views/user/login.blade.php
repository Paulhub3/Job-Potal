<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Jobs Portal - Login</title>
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
<body>

      <!-- Mobile Warning Overlay -->
    <div class="md:hidden fixed inset-0 z-50 bg-gray-900 text-white p-8 flex flex-col items-center justify-center text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
        <h2 class="text-2xl font-bold mb-4">Desktop Access Only</h2>
        <p class="text-gray-300">This platform is optimized for desktop use. Please access it from a computer for the best experience.</p>
    </div>

    <div class="relative min-h-screen w-full">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 bg-gray-700">
            <img
                src="{{ asset('images/germany.jpg') }}"
                alt="Medical Background"
                class="w-full h-full object-cover mix-blend-overlay">
        </div>

        <!-- Login Container -->
        <div class="relative min-h-screen flex flex-col items-center justify-center mx-auto">

            <div class="rounded-md bg-white p-2 mb-12 w-56">
                <a href="/" class="flex justify-center">
                    <img src="/images/GlobalGPN-logoG.png" alt="Logo" class="w-40">
                </a>
            </div>

            <div class="lg:w-4/12 md:w-9/12 space-y-8 bg-white backdrop-blur-sm px-8 rounded-md shadow-xl py-8 h-full">
                <div class="text-center">
                    <p class="text-gray-600 font-medium text-xl">Please sign in to your account</p>
                </div>

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" onclick="this.parentElement.parentElement.remove()" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                            </svg>
                        </span>
                    </div>
                @endif

                <!-- Success Message -->
                @if(session('success'))
                <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 rounded mt-8 ">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <form class="mt-8 space-y-9" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="space-y-9">
                        <div>
                            <label for="email" class="block text-lg font-medium text-gray-700">Email address</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                class="mt-1 block w-full p-3 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="relative">
                            <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                            <div class="relative">
                                <input
                                    id="password"
                                    name="password"
                                    type="text"
                                    class="mt-1 block w-full p-3 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none pr-12">
                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-600 mt-1"
                                >
                                    <!-- Hide Password Icon -->
                                    <svg
                                        id="showIcon"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-5 h-5 hidden"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                    <!-- Show Password Icon -->
                                    <svg
                                        id="hideIcon"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-5 h-5"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input
                                id="remember-me"
                                name="remember"
                                type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500"
                            >
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                Remember me
                            </label>
                        </div>

                        <a href="" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">
                            Forgot password?
                        </a>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-300"
                        >
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const showIcon = document.getElementById('showIcon');
            const hideIcon = document.getElementById('hideIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showIcon.classList.add('hidden');
                hideIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                showIcon.classList.remove('hidden');
                hideIcon.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
