@extends('layout.app-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 100%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm mt-0 lg:mt-5">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-blue-600 font-semibold">Step 12</span>
                    <span class="text-gray-500">of 12</span>
                </div>

                <div class="hidden md:block text-gray-600 font-medium">
                    Contact Information
                </div>

                <div class="text-gray-500 text-sm">
                    100% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('form.complete') }}">
        @csrf
        <div class="w-full pt-32 md:pt-40 h-[1200px] md:h-[1250px]">
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-2xl font-semibold md:text-4xl text-slate-600">
                        How can we contact you?
                    </h1>
                </div>

                   <!-- Error Messages -->
                   @if(session('error'))
                   <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded mt-8">
                       <div class="flex">
                           <div class="flex-shrink-0">
                               <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                   <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                               </svg>
                           </div>
                           <div class="ml-3">
                               <ul class="text-sm text-red-600">
                                   {{ session('error') }}
                               </ul>
                           </div>
                       </div>
                   </div>
                   @endif

                <!-- Form Fields -->
                <div class="w-full px-6 mt-10 space-y-5 md:justify-center md:flex md:flex-col md:mt-20">
                    <!-- Gender Selection -->
                    <div class="flex flex-col mx-auto space-y-4 md:w-8/12 lg:w-5/12">
                        <div class="flex flex-col space-y-3 md:flex md:flex-row md:space-x-9 md:space-y-0">
                            <label class="flex items-center space-x-2 cursor-pointer hover:text-blue-600 transition-colors">
                                <input type="checkbox" name="gender" value="female" class="w-4 h-4 text-blue-600 border-2 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500">
                                <span class="font-sans text-base font-medium text-gray-600 md:text-xl">Female</span>
                            </label>

                            <label class="flex items-center space-x-2 cursor-pointer hover:text-blue-600 transition-colors">
                                <input type="checkbox" name="gender" value="male" class="w-4 h-4 text-blue-600 border-2 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500">
                                <span class="font-sans text-base font-medium text-gray-600 md:text-xl">Male</span>
                            </label>

                            <label class="flex items-center space-x-2 cursor-pointer hover:text-blue-600 transition-colors">
                                <input type="checkbox" name="gender" value="prefer not to say" class="w-4 h-4 text-blue-600 border-2 border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500">
                                <span class="font-sans text-base font-medium text-gray-600 md:text-xl">Prefer not to say</span>
                            </label>
                        </div>
                        @error('gender')
                            <div class="text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Name Fields -->
                    <div class="flex flex-col mx-auto space-y-3 md:w-8/12 lg:w-5/12">
                        <label for="firstname" class="font-sans text-base font-medium text-gray-600 md:text-xl">First name</label>
                        <input type="text"
                               name="first_name"
                               class="block w-full px-4 py-3 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                        @error('first_name')
                            <div class="mt-2 text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col mx-auto space-y-3 md:w-8/12 lg:w-5/12">
                        <label for="middle_name" class="font-sans text-base font-medium text-gray-600 md:text-xl">Middle name</label>
                        <input type="text"
                               name="middle_name"
                               class="block w-full px-4 py-3 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                        @error('middle_name')
                            <div class="mt-2 text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col mx-auto space-y-3 md:w-8/12 lg:w-5/12">
                        <label for="surname" class="font-sans text-base font-medium text-gray-600 md:text-xl">Surname</label>
                        <input type="text"
                               name="surname"
                               class="block w-full px-4 py-3 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                        @error('surname')
                            <div class="mt-2 text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Contact Fields -->
                    <div class="flex flex-col mx-auto space-y-3 md:w-8/12 lg:w-5/12">
                        <label for="email" class="font-sans text-base font-medium text-gray-600 md:text-xl">Email</label>
                        <input type="email"
                               name="email"
                               class="block w-full px-4 py-3 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                        @error('email')
                            <div class="mt-2 text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col mx-auto space-y-3 md:w-8/12 lg:w-5/12">
                        <label for="phone_number" class="font-sans text-base font-medium text-gray-600 md:text-xl">Mobile phone number</label>
                        <input type="tel"
                               name="phone_number"
                                pattern="^([+]?[\s0-9]+)?(\d{3}|[(]?[0-9]+[)])?([-]?[\s]?[0-9])+$"
                               title="Please enter a valid phone number (e.g., +1234567890 or 1234567890)"
                               class="block w-full px-4 py-3 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                        @error('phone_number')
                            <div class="mt-2 text-red-600 text-sm animate-shake">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="absolute w-full px-6 mt-12 bottom-24">
                <div class="flex justify-between md:px-6">
                    <!-- Previous button -->
                    <a href="{{ route('form.step10') }}" class="w-32 md:w-44 px-2 py-2 md:px-4 md:py-4 border-none bg-[#0693e3] text-base md:text-xl font-medium transition duration-300 hover:bg-[#2ea3f2] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 md:w-7 md:h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                        </svg>
                        <span>Previous</span>
                    </a>

                    <!-- Submit button -->
                    <button type="submit" class="w-24 md:w-44 px-2 py-2 md:px-4 md:py-4 border-none bg-[#0693e3] text-base md:text-xl font-medium transition duration-300 hover:bg-[#2ea3f2] text-white flex items-center justify-center">
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

    /* Input Focus Effects */
    input:focus {
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

    /* Checkbox Custom Styling */
    input[type="checkbox"] {
        transition: all 0.2s ease-in-out;
    }

    input[type="checkbox"]:checked {
        background-color: #2563eb;
        border-color: #2563eb;
    }

    /* Input Transition */
    .transition-colors {
        transition: all 0.3s ease-in-out;
    }
</style>
@endpush

@endsection
