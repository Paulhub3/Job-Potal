@extends('layout.base-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 83.33%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="hidden md:block text-gray-600 font-medium">
                    Salary Details
                </div>

                <div class="text-gray-500 text-sm">
                    83% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('form.page4') }}">
        @csrf
        <div class="w-full pt-32 md:pt-36 overflow-y-auto h-[650px] md:h-[700px]">
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-2xl font-semibold md:text-4xl text-slate-600">
                        What is your salary rate?
                    </h1>
                </div>

                <!-- Form box grid -->
                <div class="w-full px-6 mt-10 space-y-5 md:justify-center md:flex md:flex-col md:mt-20">
                    <!-- Currency Selection -->
                    <div class="flex flex-col w-full px-4 mx-auto space-y-3 md:w-8/12 lg:w-5/12 md:space-y-4">
                        <label for="currency" class="font-sans text-base font-medium text-gray-600 md:text-lg">Currency</label>
                        <div class="relative">
                            <select name="currency"
                                    id="currency"
                                    class="block w-full px-6 py-4 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 appearance-none bg-white"
                                    >
                                <option value="">Choose...</option>
                                <option value="EUR" {{ old('currency', $currency) == 'EUR' ? 'selected' : '' }}>EUR (Euro)</option>
                                <option value="CHF" {{ old('currency', $currency) == 'CHF' ? 'selected' : '' }}>CHF (Swiss Franc)</option>
                            </select>
                            <!-- Custom Select Arrow -->
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        @error('currency')
                            <div class="text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Salary Range Selection -->
                    <div class="flex flex-col w-full px-4 mx-auto mt-10 space-y-3 md:w-8/12 lg:w-5/12 md:space-y-4 md:mt-20">
                        <label for="salary_range" class="font-sans text-base font-medium text-gray-600 md:text-lg">Salary Range</label>
                        <div class="relative">
                            <select name="salary_range"
                                    id="salary_range"
                                    class="block w-full px-6 py-4 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 appearance-none bg-white"
                                    >
                                <option value="">Choose...</option>
                                <option value="4000-10000" {{ old('salary_range', $salary_range) == '4000-10000' ? 'selected' : '' }}>4000 - 10000</option>
                                <option value="10000-15000" {{ old('salary_range', $salary_range) == '10000-15000' ? 'selected' : '' }}>10000 - 15000</option>
                                <option value="15000-20000" {{ old('salary_range', $salary_range) == '15000-20000' ? 'selected' : '' }}>15000 - 20000</option>
                            </select>
                            <!-- Custom Select Arrow -->
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        @error('salary_range')
                            <div class="text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="absolute w-full px-4 bottom-24">
                <div class="flex justify-between md:px-6">
                    <!-- Previous button -->
                    <a href="{{ route('form.page3') }}"
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

    /* Select Input Styles */
    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    select:focus {
        outline: none;
    }
</style>
@endpush

@endsection
