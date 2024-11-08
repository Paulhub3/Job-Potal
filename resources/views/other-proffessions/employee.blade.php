<!-- resources/views/registration/form.blade.php -->
@extends('layout.app-layout')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-7xl mx-auto mt-24 p-3 md:p-6">
        <!-- Header -->
        <h2 class="text-2xl md:text-5xl font-bold mb-4 text-center text-blue-500">Employee Registration Form</h2>

        <!-- Error Messages -->
        @if ($errors->any())
        <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 rounded">
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

        <form id="employeeForm"
              action="{{ route('other-proffessions.storeEmployee') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6 bg-white rounded-lg shadow-md p-4 md:p-8 mt-10 pb-16">
            @csrf

            <!-- Personal Information Section -->
            <div class="space-y-6">
                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Personal Information</h3>
                <div class="flex w-full">
                    <input type="text"
                           id="fullName"
                           name="full_name"
                           value="{{ old('full_name') }}"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('full_name') border-red-500 @enderror"
                           placeholder="Full Name"
                           >
                </div>

                <div>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('email') border-red-500 @enderror"
                           placeholder="Email Address"
                           >
                </div>

                <div>
                    <input type="date"
                           id="dobForm"
                           name="dob"
                           value="{{ old('dob') }}"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('dob') border-red-500 @enderror"
                           placeholder="Date of Birth"
                           >
                </div>
            </div>

            <!-- Professional Information Section -->
            <div class="space-y-6">
                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Professional Information</h3>

                <!-- Contact Information -->
                <div>
                    <label class="block text-gray-700 mb-2" for="phone">Mobile Phone Number</label>
                    <input type="tel"
                           id="phone"
                           name="phone_number"
                           value="{{ old('phone_number') }}"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('phone_number') border-red-500 @enderror"
                           >
                </div>

                <!-- Gender Selection -->
                <div class="space-y-2">
                    <label class="block text-gray-700">Gender</label>
                    <div class="flex flex-col md:flex md:flex-row md:gap-6">
                        @foreach(['Male', 'Female', 'Non-disclosure'] as $gender)
                            <label class="inline-flex items-center">
                                <input type="radio"
                                       name="gender"
                                       value="{{ $gender }}"
                                       {{ old('gender') == $gender ? 'checked' : '' }}
                                       class="form-radio text-blue-500"
                                       >
                                <span class="ml-2">{{ $gender }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Profession -->
                <div>
                    <label class="block text-gray-700 mb-2" for="license">What is your profession?</label>
                    <input type="text"
                           id="profession"
                           name="profession"
                           value="{{ old('profession') }}"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('profession') border-red-500 @enderror"
                           >
                </div>

                <!-- Degree Level -->
                <div class="mb-4">
                    <label for="degree" class="block text-gray-700 mb-2 ">
                        Degree Level
                    </label>

                    <select id="degree"
                            name="degree_level"
                            class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none text-gray-700 @error('degree_level') border-red-500 @enderror"
                            >
                        <option value="" disabled {{ old('degree_level') ? '' : 'selected' }}>Select your degree level</option>
                        <option value="Bachelors Degree" {{ old('degree_level') == "Bachelor's Degree" ? 'selected' : '' }}>
                            Bachelors Degree
                        </option>
                        <option value="Master's Degree" {{ old('degree_level') == "Master's Degree" ? 'selected' : '' }}>
                            Masters Degree
                        </option>
                        <option value="Doctorate (Ph.D.)" {{ old('degree_level') == "Doctorate (Ph.D.)" ? 'selected' : '' }}>
                            Doctorate (Ph.D.)
                        </option>
                        <option value="Professional Degrees" {{ old('degree_level') == "Professional Degrees" ? 'selected' : '' }}>
                            Professional Degrees
                        </option>
                        <option value="Vocational Training and Diplomas" {{ old('degree_level') == "Vocational Training and Diplomas" ? 'selected' : '' }}>
                            Vocational Training and Diplomas
                        </option>
                    </select>

                    @error('degree_level')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="jobExperience" class="block text-gray-700 mb-2 ">Job Experience</label>
                    <p class="flex text-sm text-gray-500 mb-2">
                        <span class="text-red-500 text-xl mr-1">*</span>
                        Specify your years of experience
                    </p>

                    <select id="jobExperience"
                            name="job_experience"
                            class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none text-gray-700 @error('job_experience') border-red-500 @enderror"
                            >
                        <option value="" disabled {{ old('job_experience') ? '' : 'selected' }}>Select Job Experience</option>
                        <option value="Less than 1 year" {{ old('job_experience') == "Less than 1 year" ? 'selected' : '' }}>
                            Less than 1 year
                        </option>
                        <option value="1 - 2 years" {{ old('job_experience') == "1 - 2 years" ? 'selected' : '' }}>
                            1 - 2 years
                        </option>
                        <option value="3 - 5 years" {{ old('job_experience') == "3 - 5 years" ? 'selected' : '' }}>
                            3 - 5 years
                        </option>
                        <option value="5 - 10 years" {{ old('job_experience') == "5 - 10 years" ? 'selected' : '' }}>
                            5 - 10 years
                        </option>
                        <option value="10+ years" {{ old('job_experience') == "10+ years" ? 'selected' : '' }}>
                            10+ years
                        </option>
                    </select>

                    @error('job_experience')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Previous Employment Section -->
                <div class="space-y-6">
                    <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Previous Employment</h3>

                    <!-- Previous Employer -->
                    <div class="mb-4">
                        <label for="previous_employer" class="block text-gray-700 mb-2">
                            Previous Employer
                            <span class="text-gray-500 text-sm ml-1">(Optional)</span>
                        </label>
                        <input type="text"
                            id="previous_employer"
                            name="previous_employer"
                            value="{{ old('previous_employer') }}"
                            placeholder="Enter your previous employer's name"
                            class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none transition-colors
                                    @error('previous_employer') border-red-500 @enderror">
                        @error('previous_employer')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Previous Position -->
                    <div class="mb-4">
                        <label for="previous_position" class="block text-gray-700 mb-2">
                            Previous Position Held
                            <span class="text-gray-500 text-sm ml-1">(Optional)</span>
                        </label>
                        <input type="text"
                            id="previous_position"
                            name="previous_position"
                            value="{{ old('previous_position') }}"
                            placeholder="Enter your previous job title"
                            class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none transition-colors
                                    @error('previous_position') border-red-500 @enderror">
                        @error('previous_position')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- CV Upload -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2" for="cv">Upload Your Curriculum Vitae</label>
                    <input type="file"
                           id="cv"
                           name="cv"
                           class="w-full p-3 border rounded @error('cv') border-red-500 @enderror"
                           accept=".pdf,.doc,.docx"
                           >
                    <p class="text-sm text-gray-500 mt-1">Accepted formats: PDF, DOC, DOCX (Max 2MB)</p>
                </div>
            </div>

           <!-- Location Information Section -->
           <div class="space-y-6">
            <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Location Information</h3>

            <!-- Country of Origin -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="originCountry">Country of Origin</label>
                <input type="text"
                       id="originCountry"
                       name="country_of_origin"
                       value="{{ old('country_of_origin') }}"
                       class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('country_of_origin') border-red-500 @enderror"
                       >
                @error('country_of_origin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Present Country -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="presentCountry">Present Country</label>
                <p class="flex text-sm text-blue-300">
                    <span class="text-red-500 text-2xl">*</span>
                    You must be living in these countries
                </p>
                <select id="presentCountry"
                        name="present_country"
                        class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring-1 focus:ring-gray-300 outline-none text-gray-700 @error('present_country') border-red-500 @enderror"
                        >
                    <option value="" disabled {{ old('present_country') ? '' : 'selected' }}>Select your present country</option>
                    @foreach(['Austria', 'Belgium', 'Bulgaria', 'Croatia', 'Cyprus', 'Czech Republic', 'Denmark', 'Estonia',
                    'Finland', 'France', 'Germany', 'Greece', 'Hungary', 'Ireland', 'Italy', 'Latvia', 'Lithuania',
                    'Luxembourg', 'Malta', 'Netherlands', 'Poland', 'Portugal', 'Romania', 'Slovakia', 'Slovenia', 'Spain', 'Sweden',
                    'Israel', 'Canada', 'United States of America',
                    'England', 'Scotland', 'Wales', 'Northern Ireland'] as $country)
                    <option value="{{ $country }}" {{ old('present_country') == $country ? 'selected' : '' }}>
                        {{ $country }}
                    </option>
                    @endforeach
                </select>
                @error('present_country')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Preferred Countries -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Preferred Country of Work</label>
                <p class="flex text-sm text-blue-300">
                    <span class="text-red-500 text-2xl">*</span>
                    We only provide jobs in these countries
                </p>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-2">
                    @foreach(['Germany', 'Switzerland', 'Luxembourg', 'Austria', 'Belgium'] as $country)
                        <label class="inline-flex items-center">
                            <input type="checkbox"
                                   name="preferred_countries[]"
                                   value="{{ $country }}"
                                   {{ (old('preferred_countries') && in_array($country, old('preferred_countries'))) ? 'checked' : '' }}
                                   class="form-checkbox text-blue-500 rounded">
                            <span class="ml-2">{{ $country }}</span>
                        </label>
                    @endforeach
                </div>
                @error('preferred_countries')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Availability Section -->
        <div class="space-y-6">
            <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Availability & Contact Details</h3>

            <!-- Start Date -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="startDate">When can you start?</label>
                <select name="start_availability"
                        class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring-1 focus:ring-gray-300 outline-none text-gray-700 @error('start_availability') border-red-500 @enderror"
                        >
                    <option value="Immediately" {{ old('start_availability') == 'Immediately' ? 'selected' : '' }}>Immediately</option>
                    <option value="Later" {{ old('start_availability') == 'Later' ? 'selected' : '' }}>Later</option>
                </select>
                @error('start_availability')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="address">Address</label>
                <input type="text"
                       name="address"
                       value="{{ old('address') }}"
                       class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('address') border-red-500 @enderror"
                       >
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- ZIP Code -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="zip">ZIP Code</label>
                <input type="text"
                       name="zip_code"
                       value="{{ old('zip_code') }}"
                       class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('zip_code') border-red-500 @enderror"
                       >
                @error('zip_code')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Language Section -->
        <div class="space-y-6">
            <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Language Skills</h3>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Languages Spoken</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach(['German', 'French', 'Italian', 'English', 'Luxembourgian', 'Dutch'] as $language)
                        <label class="inline-flex items-center">
                            <input type="checkbox"
                                   name="languages[]"
                                   value="{{ $language }}"
                                   {{ (old('languages') && in_array($language, old('languages'))) ? 'checked' : '' }}
                                   class="form-checkbox text-blue-500 rounded">
                            <span class="ml-2">{{ $language }}</span>
                        </label>
                    @endforeach
                </div>
                @error('languages')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Language Proficiency (dynamically generated) -->
            <div id="languageProficiency" class="mb-4 {{ old('languages') ? '' : 'hidden' }}">
                <label class="block text-gray-700 mb-2">Language Proficiency Levels</label>
                <!-- JavaScript will populate this section -->
            </div>
        </div>

        <!-- Employment Preferences -->
        <div class="space-y-6">
            <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Employment Preferences</h3>

            <!-- Job Type -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Job Type</label>
                <select name="job_type"
                        class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring-1 focus:ring-gray-300 outline-none text-gray-700 @error('job_type') border-red-500 @enderror"
                        >
                    <option value="" disabled {{ old('job_type') ? '' : 'selected' }}>Select job type</option>
                    <option value="Full-time" {{ old('job_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ old('job_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                </select>
                @error('job_type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contact Method -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">How do we contact you?</label>
                <select name="contact_method"
                        class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring-1 focus:ring-gray-300 outline-none text-gray-700 @error('contact_method') border-red-500 @enderror"
                        >
                    <option value="Email Address" {{ old('contact_method') == 'Email Address' ? 'selected' : '' }}>via Email Address</option>
                    <option value="Whatsapp" {{ old('contact_method') == 'Whatsapp' ? 'selected' : '' }}>via Whatsapp</option>
                </select>
                @error('contact_method')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Additional Information -->
        <div class="space-y-6">
            <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Additional Information</h3>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Additional Personal Information</label>
                <textarea name="additional_info"
                          class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring-1 focus:ring-gray-300 outline-none @error('additional_info') border-red-500 @enderror"
                          style="height: 150px;">{{ old('additional_info') }}</textarea>
                @error('additional_info')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Consent Section -->
        <div class="space-y-6">
            <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Consent</h3>

            <div class="space-y-4">
                <!-- Contact Consent -->
                <div class="flex items-start">
                    <input type="checkbox"
                           name="contact_consent"
                           class="mt-1 form-checkbox text-blue-500"
                           {{ old('contact_consent') ? 'checked' : '' }}
                           >
                    <p class="ml-4 text-sm">I consent to have GPNz contact me by phone or email with relevant job offers and useful information about working in Europe. <span class="text-red-500">*</span></p>
                </div>
                @error('contact_consent')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <!-- Privacy Policy Consent -->
                <div class="flex items-start">
                    <input type="checkbox"
                           name="privacy_consent"
                           class="mt-1 form-checkbox text-blue-500"
                           {{ old('privacy_consent') ? 'checked' : '' }}
                           >
                    <p class="ml-4 text-sm">By submitting this form, you consent to have GPNz collect your basic details. We will treat your data with respect and you can find the details in our <a href="#" class="text-blue-600 hover:underline">Privacy Policy.</a> <span class="text-red-500">*</span></p>
                </div>
                @error('privacy_consent')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>


            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white p-4 rounded-md transition duration-200">
                    Submit Registration
                </button>
            </div>
        </form>
    </div>
</div>


<script>
// Language Proficiency Toggle
document.querySelectorAll('input[name="languages[]"]').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        const selectedLanguages = Array.from(document.querySelectorAll('input[name="languages[]"]:checked')).map(cb => cb.value);
        const proficiencyContainer = document.getElementById('languageProficiency');
        const oldProficiencies = @json(old('language_proficiency', [])); // Get old input if any

        proficiencyContainer.innerHTML = '';

        if (selectedLanguages.length > 0) {
            proficiencyContainer.classList.remove('hidden');
            selectedLanguages.forEach(function(language) {
                const div = document.createElement('div');
                div.classList.add('mb-4');

                // Get old value for this language if it exists
                const oldValue = oldProficiencies[language] || '';

                div.innerHTML = `
                    <label class="block text-gray-700 mb-2">${language} Proficiency Level</label>
                    <select name="language_proficiency[${language}]"
                            class="w-full p-3 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none"
                            >
                        <option value="">Select Proficiency Level</option>
                        <option value="A1" ${oldValue === 'A1' ? 'selected' : ''}>A1 - Beginner</option>
                        <option value="A2" ${oldValue === 'A2' ? 'selected' : ''}>A2 - Elementary</option>
                        <option value="B1" ${oldValue === 'B1' ? 'selected' : ''}>B1 - Intermediate</option>
                        <option value="B2" ${oldValue === 'B2' ? 'selected' : ''}>B2 - Upper Intermediate</option>
                        <option value="C1" ${oldValue === 'C1' ? 'selected' : ''}>C1 - Advanced</option>
                        <option value="C2" ${oldValue === 'C2' ? 'selected' : ''}>C2 - Mastery</option>
                    </select>
                `;
                proficiencyContainer.appendChild(div);
            });
        } else {
            proficiencyContainer.classList.add('hidden');
        }
    });
});

// Trigger change event on page load for pre-selected languages
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('input[name="languages[]"]:checked').forEach(function(checkbox) {
        checkbox.dispatchEvent(new Event('change'));
    });
});
</script>
@endsection
