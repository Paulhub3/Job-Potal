@extends('layout.app-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 16.66%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm mt-0 lg:mt-5">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-blue-600 font-semibold">Step 2</span>
                    <span class="text-gray-500">of 12</span>
                </div>

                <div class="hidden md:block text-gray-600 font-medium">
                    Country of Residence
                </div>

                <div class="text-gray-500 text-sm">
                    17% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('form.step1') }}">
        @csrf
        <div class="w-full pt-32 md:pt-40 overflow-y-auto h-[520px]">
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-xl font-semibold md:text-4xl text-slate-600">
                        What country do you live in at the moment?<span class="text-red-600">*</span>
                    </h1>
                </div>

                <!-- Select Country Form Section -->
                <div class="flex justify-center w-full px-6 mt-10 md:mt-20">
                    <div class="w-full lg:w-4/12">
                        <select id="countries"
                                name="country_residence"
                                class="block w-full px-6 py-4 text-gray-500 border-2 border-gray-400 focus:outline-none custom-select2"
                                required>
                            <option value="" disabled selected>Choose Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}"
                                        {{ Session::get('form.step1.country_residence') == $country ? 'selected' : '' }}>
                                    {{ $country }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_residence')
                            <div class="font-sans text-sm text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="absolute w-full px-6 bottom-24">
                <div class="flex justify-between">
                    <!-- Previous button -->
                    <a href="{{ route('form.step') }}"
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
                        <strong>Please note, you must be living in the above listed countries before you can be able to apply for this job application.</strong>
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
    @if(Session::has('form.step1.country_residence'))
        $('#countries').val('{{ Session::get('form.step1.country_residence') }}').trigger('change');
    @endif

    // Add loading state to form submission
    $('form').on('submit', function() {
        $(this).find('button[type="submit"]').prop('disabled', true)
            .addClass('opacity-75 cursor-wait');
    });
});
</script>
@endpush

@endsection
