@extends('layout.app-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 8.33%"></div>
        </div>
    </div>

    <!-- Progress Info -->
    <div class="bg-white shadow-sm mt-20 lg:mt-24">
        <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
            <!-- Step Counter -->
            <div class="flex items-center gap-2 text-sm">
                <span class="text-blue-600 font-semibold">Step 1</span>
                <span class="text-gray-500">of 12</span>
            </div>

            <!-- Current Step Name (Hidden on mobile) -->
            <div class="hidden md:block text-gray-600 font-medium">
                Nationality
            </div>

            <!-- Progress Percentage -->
            <div class="text-gray-500 text-sm">
                8% Complete
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('form.step') }}">
        @csrf
        <div class="w-full pt-10 md:pt-32"> <!-- Adjusted padding to account for progress bar -->
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-xl font-semibold md:text-4xl text-center text-slate-600">
                        What is your country of Nationality?
                    </h1>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 rounded mt-8">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Select Country Form Section -->
                <div class="flex justify-center w-full px-6 mt-5 md:mt-20">
                    <div class="w-full lg:w-4/12">
                        <select id="countries"
                                name="nationality"
                                class="block w-full px-6 py-4 text-gray-500 border-2 border-gray-400 focus:outline-none custom-select2"
                                required>
                            <option value="" disabled selected>Choose Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}"
                                        {{ Session::get('form.step.nationality') == $country ? 'selected' : '' }}>
                                    {{ $country }}
                                </option>
                            @endforeach
                        </select>
                        @error('nationality')
                            <div class="font-sans text-sm text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="absolute w-full px-6 md:bottom-24 bottom-16 pb-4">
                <div class="flex justify-end">
                    <button type="submit"
                            class="lg:w-44 w-24 px-2 py-2 lg:px-4 lg:py-4 border-none bg-[#0693e3] text-base lg:text-xl font-medium transition duration-300 hover:bg-[#2ea3f2] text-white flex items-center justify-between">
                        <span class="mx-auto">Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor"
                             class="lg:w-7 lg:h-7 w-5 h-5">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
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

    /* Select2 Custom Styles */
    .custom-select2 + .select2-container .select2-selection--single {
        height: 60px !important;
        display: flex;
        align-items: center;
        padding-left: 10px;
        padding-right: 10px;
        border: 2px solid #9ca3af;
        border-radius: 4px;
    }

    .custom-select2 + .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 60px !important;
        padding-left: 1.25rem;
        padding-right: 1.25rem;
        color: #6b7280;
        font-size: 1rem;
    }

    .custom-select2 + .select2-container .select2-selection--single .select2-selection__arrow {
        height: 60px !important;
        width: 40px;
    }

    .select2-container .select2-dropdown {
        border: 2px solid #9ca3af;
        border-radius: 4px;
        margin-top: 4px;
    }

    .select2-container .select2-results__option {
        padding: 10px 15px;
        font-size: 1rem;
    }

    .select2-container .select2-results__option--highlighted[aria-selected] {
        background-color: #0693e3;
    }

    .select2-search--dropdown .select2-search__field {
        padding: 8px;
        border: 1px solid #9ca3af;
        border-radius: 4px;
        margin: 5px;
        width: calc(100% - 10px);
    }

    .select2-search--dropdown .select2-search__field:focus {
        outline: none;
        border-color: #0693e3;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    $('#countries').select2({
        placeholder: 'Choose Country',
        allowClear: true,
        width: '100%',
        minimumResultsForSearch: 5,
        templateResult: formatCountry,
        templateSelection: formatCountry
    });

    function formatCountry(country) {
        if (!country.id) return country.text;
        return $('<span class="flex items-center">' +
                '<span>' + country.text + '</span>' +
                '</span>');
    }

    // Restore selected value from session
    @if(Session::has('form.step.nationality'))
        $('#countries').val('{{ Session::get('form.step.nationality') }}').trigger('change');
    @endif

    // Add loading state to form submission
    $('form').on('submit', function() {
        $(this).find('button[type="submit"]').prop('disabled', true)
            .addClass('opacity-75 cursor-wait');
    });
});
</script>
@endpush

@include('sweetalert::alert')
@endsection
