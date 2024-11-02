@extends('layout.app-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 41.66%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm mt-0 lg:mt-5">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-blue-600 font-semibold">Step 5</span>
                    <span class="text-gray-500">of 12</span>
                </div>

                <div class="hidden md:block text-gray-600 font-medium">
                    Work Area Preference
                </div>

                <div class="text-gray-500 text-sm">
                    42% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('form.step4') }}">
        @csrf
        <div class="w-full pt-32 md:pt-40 overflow-y-auto h-[900px] md:h-[700px]">
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-xl font-semibold md:text-4xl text-slate-600">
                        In which area would you like to work in the future?<span class="text-red-600">*</span>
                    </h1>
                </div>

                <!-- Select box grid -->
                <div x-data="{ future_work: '{{ old('future_work', $formData['future_work'] ?? '') }}' }"
                     class="w-full px-6 mt-10 md:justify-center md:flex md:mt-20">
                    <div class="grid grid-cols-1 gap-4 lg:grid lg:grid-cols-3 lg:gap-6 md:grid md:grid-cols-2 md:gap-4">
                        <!-- Outpatient care -->
                        <div @click="future_work = 'Outpatient care.'"
                             :class="{ 'shadow-blue-300 scale-105': future_work === 'Outpatient care.', 'opacity-60': future_work !== 'Outpatient care.' }"
                             class="flex flex-col justify-center w-56 px-6 py-4 mx-auto space-y-3 text-lg font-semibold bg-white rounded-md shadow-xl cursor-pointer md:w-72 md:px-12 md:py-6 hover:shadow-md hover:shadow-blue-200 transition-all duration-300">
                            <input type="radio" x-model="future_work" name="future_work" value="Outpatient care." class="hidden">
                            <img src="/images/ambulance.png" alt="ambulance" class="mx-auto w-9 md:w-12 transition-transform duration-300">
                            <p class="text-center">Outpatient care.</p>
                        </div>

                        <!-- Inpatient care -->
                        <div @click="future_work = 'Inpatient care'"
                             :class="{ 'shadow-blue-300 scale-105': future_work === 'Inpatient care', 'opacity-60': future_work !== 'Inpatient care' }"
                             class="flex flex-col justify-center w-56 px-6 py-4 mx-auto space-y-3 text-lg font-semibold bg-white rounded-md shadow-xl cursor-pointer md:w-72 md:px-12 md:py-6 hover:shadow-md hover:shadow-blue-200 transition-all duration-300">
                            <input type="radio" x-model="future_work" name="future_work" value="Inpatient care" class="hidden">
                            <img src="/images/impatient.png" alt="impatient" class="mx-auto w-9 md:w-12 transition-transform duration-300">
                            <p class="text-center">Inpatient care</p>
                        </div>

                        <!-- Hospital -->
                        <div @click="future_work = 'Hospital'"
                             :class="{ 'shadow-blue-300 scale-105': future_work === 'Hospital', 'opacity-60': future_work !== 'Hospital' }"
                             class="flex flex-col justify-center w-56 px-6 py-4 mx-auto space-y-3 text-lg font-semibold bg-white rounded-md shadow-xl cursor-pointer md:w-72 md:px-12 md:py-6 hover:shadow-md hover:shadow-blue-200 transition-all duration-300">
                            <input type="radio" x-model="future_work" name="future_work" value="Hospital" class="hidden">
                            <img src="/images/hospital (1).png" alt="hospital" class="mx-auto w-9 md:w-12 transition-transform duration-300">
                            <p class="text-center">Hospital</p>
                        </div>
                    </div>
                </div>
                @error('future_work')
                    <div class="mt-6 font-sans text-base text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons Section -->
            <div class="md:absolute w-full px-6 mt-12 md:bottom-24">
                <div class="flex justify-between px-2">
                    <!-- Previous button -->
                    <a href="{{ route('skip.page') }}"
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

    /* Card Hover Effects */
    .card-hover {
        transition: all 0.3s ease-in-out;
    }

    .card-hover:hover {
        transform: translateY(-2px);
    }

    /* Selection Animation */
    .selected {
        animation: selectPulse 0.5s ease-in-out;
    }

    @keyframes selectPulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
</style>
@endpush

@endsection
