@extends('layout.app-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 83.33%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm mt-0 lg:mt-5">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-blue-600 font-semibold">Step 10</span>
                    <span class="text-gray-500">of 12</span>
                </div>

                <div class="hidden md:block text-gray-600 font-medium">
                    EU Medical License
                </div>

                <div class="text-gray-500 text-sm">
                    83% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('form.step9') }}">
        @csrf
        <div class="w-full pt-32 md:pt-40 h-[600px] md:h-full">
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-2xl font-semibold md:text-4xl text-slate-600">
                        Do you have a EU license to practice medicine?
                    </h1>
                </div>

                <!-- Form box grid -->
                <div class="w-full px-6 mt-10 space-y-6 md:justify-center md:flex md:flex-col md:mt-20 ">
                    <div class="flex flex-col mx-auto space-y-6 md:w-8/12 lg:w-5/12">
                        <!-- Yes Option -->
                        <label class="flex items-center p-4 space-x-3 bg-white rounded-lg shadow-md cursor-pointer hover:shadow-lg transition-all duration-300">
                            <input type="radio"
                                   name="eu_license"
                                   value="1"
                                   class="w-5 h-5 text-blue-600 border-2 border-gray-300 focus:ring-blue-500 focus:ring-2 md:h-6 md:w-6 transition-all duration-200"
                                   {{ old('eu_license', $eu_license) == 1 ? 'checked' : '' }}
                                   required>
                            <span class="text-sm text-gray-700 md:text-lg">
                                Yes, I have a EU license to practice medicine
                            </span>
                        </label>

                        <!-- No Option -->
                        <label class="flex items-center p-4 space-x-3 bg-white rounded-lg shadow-md cursor-pointer hover:shadow-lg transition-all duration-300">
                            <input type="radio"
                                   name="eu_license"
                                   value="0"
                                   class="w-5 h-5 text-blue-600 border-2 border-gray-300 focus:ring-blue-500 focus:ring-2 md:h-6 md:w-6 transition-all duration-200"
                                   {{ old('eu_license', $eu_license) == 0 ? 'checked' : '' }}
                                   required>
                            <span class="text-sm text-gray-700 md:text-lg">
                                No, I don't have a EU license to practice medicine
                            </span>
                        </label>

                        @error('eu_license')
                            <div class="text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="absolute w-full px-6 bottom-24">
                <div class="flex justify-between md:px-6">
                    <!-- Previous button -->
                    <a href="{{ route('form.step8') }}"
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

    /* Radio Button Styles */
    input[type="radio"] {
        position: relative;
        cursor: pointer;
    }

    input[type="radio"]:checked {
        animation: pulse 0.5s;
    }

    input[type="radio"]:checked + span {
        color: #2563eb;
    }

    /* Label Hover Effect */
    label:hover {
        transform: translateY(-1px);
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

    /* Pulse Animation */
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }
</style>
@endpush

@endsection
