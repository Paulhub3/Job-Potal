@extends('layout.app-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 50%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm mt-0 lg:mt-5">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-blue-600 font-semibold">Step 6</span>
                    <span class="text-gray-500">of 12</span>
                </div>

                <div class="hidden md:block text-gray-600 font-medium">
                    Employment Type
                </div>

                <div class="text-gray-500 text-sm">
                    50% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('form.step5') }}">
        @csrf
        <div class="w-full pt-32 md:pt-40 overflow-y-auto h-[820px] md:h-[750px]">
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-2xl font-semibold md:text-4xl text-slate-600">
                        What kind of job are you looking for?<span class="text-red-600">*</span>
                    </h1>
                </div>

                <!-- Select box grid -->
                <div x-data="{ work_type: '{{ old('work_type', $formData['work_type'] ?? '') }}' }"
                     class="w-full px-6 mt-10 md:justify-center md:flex md:mt-20">
                    <div class="grid grid-cols-1 gap-4 lg:grid lg:grid-cols-2 lg:gap-6 md:grid md:grid-cols-2 md:gap-4">
                        <!-- Full-time Option -->
                        <div @click="work_type = 'Full-time'"
                             :class="{ 'shadow-blue-300 scale-105': work_type === 'Full-time', 'opacity-70': work_type !== 'Full-time' }"
                             class="flex flex-col justify-center w-56 px-6 py-4 mx-auto space-y-3 text-lg font-semibold bg-white rounded-md shadow-xl cursor-pointer md:px-12 md:py-6 hover:shadow-md hover:shadow-blue-200 transition-all duration-300">
                            <input type="radio" x-model="work_type" name="work_type" value="Full-time" class="hidden">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor"
                                 :class="{ 'text-blue-500': work_type === 'Full-time' }"
                                 class="size-16 text-[#c7e0ef] mx-auto transition-colors duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p class="text-center">Full-time</p>
                        </div>

                        <!-- Part-time Option -->
                        <div @click="work_type = 'Part-time'"
                             :class="{ 'shadow-blue-300 scale-105': work_type === 'Part-time', 'opacity-70': work_type !== 'Part-time' }"
                             class="flex flex-col justify-center w-56 px-6 py-4 mx-auto space-y-3 text-lg font-semibold bg-white rounded-md shadow-xl cursor-pointer md:px-12 md:py-6 hover:shadow-md hover:shadow-blue-200 transition-all duration-300">
                            <input type="radio" x-model="work_type" name="work_type" value="Part-time" class="hidden">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor"
                                 :class="{ 'text-blue-500': work_type === 'Part-time' }"
                                 class="size-16 text-[#c7e0ef] mx-auto transition-colors duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p class="text-center">Part-time</p>
                        </div>
                    </div>
                </div>
                @error('work_type')
                    <div class="mt-6 font-sans text-base text-red-600 animate-shake">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons Section -->
            <div class="md:absolute w-full px-6 mt-12 md:bottom-24">
                <div class="flex justify-between px-2">
                    <!-- Previous button -->
                    <a href="{{ route('form.step4') }}"
                       class="w-32 md:w-44 px-2 py-2 md:px-4 md:py-4 border-none bg-[#0693e3] text-base md:text-xl font-medium transition duration-300 hover:bg-[#2ea3f2] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 md:w-7 md:h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                        </svg>
                        <span>Previous</span>
                    </a>

                    <!-- Next button -->
                    <button type="submit"
                            class="w-24 md:w-44 px-2 py-2 md:px-4 md:py-4 border-none bg-[#0693e3] text-base md:text-xl font-medium transition duration-300 hover:bg-[#2ea3f2] text-white flex items-center justify-center">
                        <span>Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2 md:w-7 md:h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>

                <!-- Footer Notification -->
                <div class="mt-6">
                    <div class="bg-[#c7e0ef] shadow-md py-4 px-4 rounded-md">
                        <div class="text-center text-gray-600 text-xs md:text-sm">
                            <span class="text-red-600">*</span> Our service is free of charge for you. We finance ourselves exclusively through fees of the listed providers.
                        </div>
                    </div>
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

    /* Card Hover/Selection Effects */
    .card-hover {
        transition: all 0.3s ease-in-out;
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

    /* Selection Animation */
    .scale-up {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }
</style>
@endpush

@endsection
