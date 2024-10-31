<div class="relative" x-data="{ open: @entangle('isOpen') }">
    <!-- Fixed Header -->
    <nav class="bg-white fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo Section -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="flex justify-center">
                        <img src="/images/GlobalGPN-logoG.png" alt="Logo" class="w-28">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden sm:flex sm:items-center">
                    <div class="flex space-x-5">
                        <a href="/" class="text-sm font-medium {{ request()->is('/') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-900' }}">
                            Home
                        </a>
                        <a href="#process" class="text-sm font-medium {{ request()->is('process*') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-900' }}">
                            The Process
                        </a>
                        <a href="#jobs" class="text-sm font-medium {{ request()->is('jobs*') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-900' }}">
                            Jobs
                        </a>
                        <a href="#employers" class="text-sm font-medium {{ request()->is('employers*') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-900' }}">
                            Employers
                        </a>
                        <a href="#about" class="text-sm font-medium {{ request()->is('about*') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-900' }}">
                            About Us
                        </a>
                        <a href="#faq" class="text-sm font-medium {{ request()->is('faq*') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-900' }}">
                            FAQ
                        </a>
                        <a href="#contact" class="text-sm font-medium {{ request()->is('contact*') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-900' }}">
                            Contact Us
                        </a>
                        <a href="#africa" class="text-sm font-medium {{ request()->is('africa*') ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-900' }}">
                            Africa
                        </a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center sm:hidden">
                    <button
                        wire:click="toggleNav"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    >
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu Icons -->
                        <svg
                            class="h-6 w-6 transition-transform duration-200 ease-in-out"
                            :class="{ 'transform rotate-180': open }"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                :class="{ 'hidden': open, 'inline-flex': !open }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                            <path
                                :class="{ 'inline-flex': open, 'hidden': !open }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu overlay -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform translate-y-[-100%]"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-[-100%]"
            class="fixed sm:hidden left-0 right-0 top-16 bottom-0 bg-white z-40 overflow-y-auto"
            @click.away="$wire.closeNav()"
            style="display: none;"
        >
            <div class="px-4 pt-2 pb-3 space-y-1 bg-slate-100">
                <a
                    href="/"
                    wire:click="closeNav"
                    class="block pl-6 pr-4 py-3 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition duration-150 ease-in-out rounded-md"
                >
                    Home
                </a>
                <a
                    href="#process"
                    wire:click="closeNav"
                    class="block pl-6 pr-4 py-3 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition duration-150 ease-in-out rounded-md"
                >
                    The Process
                </a>
                <a
                    href="#jobs"
                    wire:click="closeNav"
                    class="block pl-6 pr-4 py-3 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition duration-150 ease-in-out rounded-md"
                >
                    Jobs
                </a>
                <a
                    href="#employers"
                    wire:click="closeNav"
                    class="block pl-6 pr-4 py-3 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition duration-150 ease-in-out rounded-md"
                >
                    Employers
                </a>
                <a
                    href="#about"
                    wire:click="closeNav"
                    class="block pl-6 pr-4 py-3 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition duration-150 ease-in-out rounded-md"
                >
                    About Us
                </a>
                <a
                    href="#faq"
                    wire:click="closeNav"
                    class="block pl-6 pr-4 py-3 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition duration-150 ease-in-out rounded-md"
                >
                    FAQ
                </a>
                <a
                    href="#contact"
                    wire:click="closeNav"
                    class="block pl-6 pr-4 py-3 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition duration-150 ease-in-out rounded-md"
                >
                    Contact Us
                </a>
                <a
                    href="#africa"
                    wire:click="closeNav"
                    class="block pl-6 pr-4 py-3 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition duration-150 ease-in-out rounded-md"
                >
                    Africa
                </a>
            </div>
        </div>
    </nav>

    <!-- Spacer to prevent content from hiding under fixed header-->
    <div class="h-16"></div>
</div>
