@extends('layout.app-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 91.66%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm mt-0 lg:mt-5">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-blue-600 font-semibold">Step 11</span>
                    <span class="text-gray-500">of 12</span>
                </div>

                <div class="hidden md:block text-gray-600 font-medium">
                    Language Proficiency
                </div>

                <div class="text-gray-500 text-sm">
                    92% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('form.step10') }}">
        @csrf
        <div class="w-full pt-32 md:pt-40 h-[700px] md:h-[800px]">
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-2xl font-semibold md:text-4xl text-slate-600">
                        What language do you communicate with?
                    </h1>
                </div>

                <!-- Form box grid -->
                <div class="w-full px-6 space-y-5 md:justify-center md:flex md:flex-col ">
                    <!-- Language Selection -->
                    <div class="flex flex-col w-full px-4 mx-auto mt-10 space-y-3 md:w-8/12 lg:w-5/12 md:space-y-4 md:mt-20">
                        <label for="language" class="font-sans text-base font-medium text-gray-600 md:text-xl">
                            What language do you speak
                        </label>
                        <div class="relative">
                            <select name="language"
                                    id="language"
                                    class="block w-full px-6 py-4 text-gray-500 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 appearance-none bg-white">
                                <option value="">Choose...</option>
                                <option value="German" {{ old('language', $language) == 'German' ? 'selected' : '' }}>German</option>
                                <option value="French" {{ old('language', $language) == 'French' ? 'selected' : '' }}>French</option>
                                <option value="Italian" {{ old('language', $language) == 'Italian' ? 'selected' : '' }}>Italian</option>
                                <option value="Luxemburgish" {{ old('language', $language) == 'Luxemburgish' ? 'selected' : '' }}>Luxemburgish</option>
                            </select>
                            <!-- Custom Select Arrow -->
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        @error('language')
                            <div class="text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Language Level Selection -->
                    <div class="flex flex-col w-full px-4 mx-auto mt-10 space-y-3 md:w-8/12 lg:w-5/12 md:space-y-4 md:mt-20">
                        <label for="language_level" class="font-sans text-base font-medium text-gray-600 md:text-xl">
                            At what level do you speak this Language
                        </label>
                        <div class="relative">
                            <select name="language_level"
                                    id="language_level"
                                    class="block w-full px-6 py-4 text-gray-500 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 appearance-none bg-white">
                                <option value="">Choose...</option>
                                <option value="A1" {{ old('language_level', $language_level) == 'A1' ? 'selected' : '' }}>A1 - Beginner</option>
                                <option value="A2" {{ old('language_level', $language_level) == 'A2' ? 'selected' : '' }}>A2 - Elementary</option>
                                <option value="B1" {{ old('language_level', $language_level) == 'B1' ? 'selected' : '' }}>B1 - Intermediate</option>
                                <option value="B2" {{ old('language_level', $language_level) == 'B2' ? 'selected' : '' }}>B2 - Upper Intermediate</option>
                                <option value="C1" {{ old('language_level', $language_level) == 'C1' ? 'selected' : '' }}>C1 - Advanced</option>
                                <option value="C2" {{ old('language_level', $language_level) == 'C2' ? 'selected' : '' }}>C2 - Mastery</option>
                            </select>
                            <!-- Custom Select Arrow -->
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        @error('language_level')
                            <div class="text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="absolute w-full px-4 bottom-24">
                <div class="flex justify-between md:px-6">
                    <!-- Previous button -->
                    <a href="{{ route('form.step9') }}"
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

    /* Select Input Styling */
    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    select:focus {
        outline: none;
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

    /* Hover Effects */
    select:hover {
        border-color: #93c5fd;
    }

    /* Focus Ring Animation */
    .focus\:ring {
        transition: box-shadow 0.2s ease-in-out;
    }
</style>
@endpush

@endsection
