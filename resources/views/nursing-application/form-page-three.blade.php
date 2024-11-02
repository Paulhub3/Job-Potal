@extends('layout.app-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 25%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm mt-0 lg:mt-5">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-blue-600 font-semibold">Step 3</span>
                    <span class="text-gray-500">of 12</span>
                </div>

                <div class="hidden md:block text-gray-600 font-medium">
                    Preferred Countries
                </div>

                <div class="text-gray-500 text-sm">
                    25% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('form.step2') }}">
        @csrf
        <div class="w-full pt-32 md:pt-40 overflow-y-auto h-[1330px] md:h-[1200px] lg:h-[900px]">
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-xl font-semibold md:text-4xl text-slate-600">
                        In which of these countries would you like to work in?<span class="text-red-600">*</span>
                    </h1>
                </div>

                <!--Select box grid-->
                <div x-data="{ work_country: {{ json_encode(old('work_country', $formData['work_country'] ?? [])) }} }"
                     class="w-full px-6 mt-10 md:justify-center md:flex md:mt-20">
                    <div class="grid grid-cols-1 gap-4 lg:grid lg:grid-cols-4 lg:gap-6 md:grid md:grid-cols-2 md:gap-4">
                        <template x-for="country in ['Germany', 'Austria', 'Luxembourg', 'Belgium', 'Switzerland']" :key="country">
                            <div x-data="{ checked: work_country.includes(country) }"
                                 :class="{ 'shadow-blue-300': checked }"
                                 class="flex flex-col justify-center w-56 px-6 py-4 mx-auto space-y-3 text-lg font-semibold bg-white rounded-md shadow-xl cursor-pointer md:px-12 md:py-6 hover:shadow-md hover:shadow-blue-200 transition-all duration-300">
                                <input type="checkbox"
                                       x-model="work_country"
                                       name="work_country[]"
                                       :value="country"
                                       class="hidden">
                                <div @click="checked = !checked; if (checked) work_country.push(country); else work_country.splice(work_country.indexOf(country), 1)"
                                     class="transition-transform duration-200 hover:scale-105">
                                    <img :class="{ 'opacity-50': !checked, 'opacity-100 transform scale-105': checked }"
                                         :src="`/images/${country.toLowerCase()}.png`"
                                         :alt="`${country} flag`"
                                         class="w-20 mx-auto transition-all duration-300">
                                    <p class="text-center mt-3" x-text="country"></p>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                @error('work_country')
                    <div class="mt-6 font-sans text-base text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons Section -->
            <div class="md:absolute w-full px-6 mt-12 md:bottom-24 pb-8 md:pb-0">
                <div class="flex justify-between">
                    <!-- Previous button -->
                    <a href="{{ route('form.step1') }}"
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

                <!-- Notification text -->
                <div class="flex justify-center w-full px-4 mt-6 space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                    <p class="font-sans text-xs text-center md:text-sm text-slate-400">
                        <strong>Please note, we only help you find jobs in the countries listed above.</strong>
                    </p>
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

    /* Country Selection Animations */
    .country-card {
        transition: all 0.3s ease-in-out;
    }

    .country-card:hover {
        transform: translateY(-2px);
    }

    .country-image {
        transition: all 0.3s ease-in-out;
    }

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
