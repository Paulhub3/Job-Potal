@extends('layout.base-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 100%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="hidden md:block text-gray-600 font-medium">
                    Company Information
                </div>

                <div class="text-gray-500 text-sm">
                    100% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('form.submit') }}">
        @csrf
        <div class="w-full pt-32 md:pt-36 overflow-y-auto h-[1050px] md:h-[1100px]">
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-2xl font-semibold md:text-2xl text-slate-600">
                        Provide your company contact information
                    </h1>
                </div>

                <!-- Form Fields -->
                <div class="w-full px-6 mt-10 space-y-5 md:justify-center md:flex md:flex-col md:mt-20">
                    <!-- Company Name -->
                    <div class="flex flex-col mx-auto space-y-3 md:w-8/12 lg:w-5/12">
                        <label for="company_name" class="font-sans text-base font-medium text-gray-600 md:text-lg">
                            Company name
                        </label>
                        <input type="text"
                               name="company_name"
                               class="block w-full px-4 py-3 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200">
                        @error('company_name')
                            <div class="mt-2 text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Company Email -->
                    <div class="flex flex-col mx-auto space-y-3 md:w-8/12 lg:w-5/12">
                        <label for="email" class="font-sans text-base font-medium text-gray-600 md:text-lg">
                            Company Email
                        </label>
                        <input type="email"
                               name="email"
                               class="block w-full px-4 py-3 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200">
                        @error('email')
                            <div class="mt-2 text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Company Phone -->
                    <div class="flex flex-col mx-auto space-y-3 md:w-8/12 lg:w-5/12">
                        <label for="phone_number" class="font-sans text-base font-medium text-gray-600 md:text-lg">
                            Company phone number
                        </label>
                        <input type="tel"
                               name="phone_number"
                               pattern="^\+?[1-9]\d{1,14}$"
                               title="Please enter a valid phone number (e.g., +1234567890 or 1234567890)"
                               class="block w-full px-4 py-3 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200">
                        @error('phone_number')
                            <div class="mt-2 text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Company Address -->
                    <div class="flex flex-col mx-auto space-y-3 md:w-8/12 lg:w-5/12">
                        <label for="company_address" class="font-sans text-base font-medium text-gray-600 md:text-lg">
                            Company address
                        </label>
                        <input type="text"
                               name="company_address"
                               class="block w-full px-4 py-3 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200">
                        @error('company_address')
                            <div class="mt-2 text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Job Description -->
                    <div class="flex flex-col mx-auto space-y-3 md:w-8/12 lg:w-5/12">
                        <label for="job_description" class="font-sans text-base font-medium text-gray-600 md:text-lg">
                            Job description
                        </label>
                        <textarea name="job_description"
                                  rows="5"
                                  class="block w-full px-4 py-3 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 resize-none"></textarea>
                        @error('job_description')
                            <div class="mt-2 text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="absolute w-full px-6 mt-12 pb-24">
                <div class="flex justify-between md:px-6">
                    <!-- Previous button -->
                    <a href="{{ route('form.page4') }}"
                       class="w-32 md:w-44 px-2 py-2 md:px-4 md:py-4 border-none bg-[#0693e3] text-base md:text-xl font-medium transition duration-300 hover:bg-[#2ea3f2] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 md:w-7 md:h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                        </svg>
                        <span>Previous</span>
                    </a>

                    <!-- Submit button -->
                    <button type="submit"
                            class="w-24 md:w-44 px-2 py-2 md:px-4 md:py-4 border-none bg-[#0693e3] text-base md:text-xl font-medium transition duration-300 hover:bg-[#2ea3f2] text-white flex items-center justify-center">
                        <span>Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
<style>
    /* Progress Bar Animation */
    .bg-blue-600 {
        transition: width 0.5s ease-out;
    }

    /* Error Animation */
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    .animate-shake {
        animation: shake 0.5s ease-in-out;
    }

    /* Input Focus Animation */
    .focus-within\:ring {
        transition: all 0.2s ease-in-out;
    }

    /* Input Hover Effect */
    input:hover, textarea:hover {
        border-color: #93c5fd;
    }
</style>
@endpush

@endsection
