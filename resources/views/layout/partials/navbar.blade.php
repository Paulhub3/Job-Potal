<nav class="bg-white">
    <div class="max-w-full mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <span class="text-xl font-semibold text-gray-800">
                    Welcome back, {{ auth()->user()->name ?? 'Admin' }}
                </span>
            </div>

            <div class="flex items-center">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-2">
                        <span class="hidden md:block">{{ auth()->user()->email ?? 'admin@example.com' }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
