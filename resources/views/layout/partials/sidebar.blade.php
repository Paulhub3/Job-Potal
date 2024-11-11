<aside class="w-80 bg-gray-800 text-white">
     <!-- Logo -->
    <div class="bg-white p-1 mb-12 w-full">
        <a href="/" class="flex justify-center">
            <img src="/images/GlobalGPN-logoG.png" alt="Logo" class="w-32">
        </a>
    </div>

    <nav class="mt-2">
        <div class="px-4 space-y-5">
            <!-- Dashboard - Grid/Layout Icon -->
            <a href="" class="block px-4 py-3 rounded-lg hover:bg-gray-700 text-base font-medium font-sans {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    Dashboard
                </span>
            </a>

            <!-- Nursing Job Applications - Clipboard with Medical Cross -->
            <a href="" class="block px-4 py-3 rounded-lg hover:bg-gray-700 text-base font-medium font-sans {{ request()->routeIs('admin.users') ? 'bg-gray-700' : '' }}">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                    Nursing Job Applications
                </span>
            </a>

            <!-- Medical Employer - Hospital Building -->
            <a href="" class="block px-4 py-3 rounded-lg hover:bg-gray-700 text-base font-medium font-sans {{ request()->routeIs('admin.settings') ? 'bg-gray-700' : '' }}">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Medical Employer
                </span>
            </a>

            <!-- Other Medical Jobs - Medical Briefcase -->
            <a href="" class="block px-4 py-3 rounded-lg hover:bg-gray-700 text-base font-medium font-sans {{ request()->routeIs('admin.settings') ? 'bg-gray-700' : '' }}">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7h-7m0 0v7m0-7l7 7m0 0v7a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h7"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 3h5v5"/>
                    </svg>
                    Other Medical jobs
                </span>
            </a>

            <!-- Other Professions Application - Document Stack -->
            <a href="" class="block px-4 py-3 rounded-lg hover:bg-gray-700 text-base font-medium font-sans {{ request()->routeIs('admin.settings') ? 'bg-gray-700' : '' }}">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Other Professions Application
                </span>
            </a>

            <!-- Other Professions Employer - Office Building -->
            <a href="" class="block px-4 py-3 rounded-lg hover:bg-gray-700 text-base font-medium font-sans {{ request()->routeIs('admin.settings') ? 'bg-gray-700' : '' }}">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Other Professions Employer
                </span>
            </a>
        </div>
    </nav>
</aside>
