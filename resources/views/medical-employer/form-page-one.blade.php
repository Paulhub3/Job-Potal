@extends('layout.base-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1">
            <div class="bg-blue-600 h-1 transition-all duration-500" style="width: 16.67%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="hidden md:block text-gray-600 font-medium">
                    Company Location
                </div>

                <div class="text-gray-500 text-sm">
                    17% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('form.page') }}">
        @csrf
        <div class="w-full pt-32 md:pt-36 overflow-y-auto h-[1150px] md:h-[800px]">
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-xl font-semibold md:text-2xl text-slate-600">
                        In which of these countries is your company located at?
                    </h1>
                </div>

                <!-- Select box grid -->
                <div x-data="{ company_location: {{ json_encode(old('company_location', $formData['company_location'] ?? [])) }} }"
                     class="w-full px-6 mt-10 md:justify-center md:flex">
                    <div class="grid grid-cols-1 gap-4 lg:grid lg:grid-cols-3 lg:gap-4 md:grid md:grid-cols-2 md:gap-4">
                        <template x-for="country in ['Switzerland','Germany', 'Austria', 'Luxembourg', 'Belgium']" :key="country">
                            <div :class="{ 'shadow-blue-300 scale-105': company_location.includes(country), 'opacity-80': !company_location.includes(country) }"
                                 class="flex flex-col justify-center w-44 px-6 py-3 mx-auto space-y-3 text-lg font-semibold bg-white rounded-md shadow-xl cursor-pointer md:px-3 md:py-4 hover:shadow-md hover:shadow-blue-200 transition-all duration-300"
                                 @click="company_location = [country]">
                                <input type="radio"
                                       x-model="company_location[0]"
                                       name="company_location[]"
                                       :value="country"
                                       class="hidden">
                                <img :src="`/images/${country.toLowerCase()}.png`"
                                     :alt="`${country} flag`"
                                     class="w-16 mx-auto transition-all duration-300"
                                     :class="{ 'opacity-50': !company_location.includes(country) }">
                                <p class="text-center" x-text="country"></p>
                            </div>
                        </template>
                    </div>
                </div>
                @error('company_location')
                    <div class="mt-6 font-sans text-base text-red-600 animate-shake">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons Section -->
            <div class="absolute w-full px-6 bottom-24">
                <div class="flex justify-end">
                    <button type="submit"
                            class="w-24 md:w-44 px-2 py-2 md:px-4 md:py-4 border-none bg-[#0693e3] text-base md:text-xl font-medium transition duration-300 hover:bg-[#2ea3f2] text-white flex items-center justify-center">
                        <span>Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2 md:w-7 md:h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </form>

    @include('sweetalert::alert')
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

    /* Selection Animation */
    .scale-105 {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }
</style>
@endpush

@endsection
