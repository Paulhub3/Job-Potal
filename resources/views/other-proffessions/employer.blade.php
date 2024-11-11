@extends('layout.app-layout')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-7xl mx-auto mt-24 p-3 md:p-6">
        <!-- Header -->
        <h2 class="text-2xl md:text-5xl font-bold mb-4 text-center text-blue-500">Employer Registration Form</h2>

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

        <form action="{{ route('other-proffessions.storeEmployer') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6 bg-white rounded-lg shadow-md p-4 md:p-8 mt-10 pb-16">
            @csrf

            <!-- Company Information Section -->
            <div class="space-y-6">
                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Company Information</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-2" for="company_name">Company Name</label>
                        <input type="text"
                               id="company_name"
                               name="company_name"
                               value="{{ old('company_name') }}"
                               class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('company_name') border-red-500 @enderror"
                               >
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2" for="email">Company Email</label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('email') border-red-500 @enderror"
                               >
                    </div>

                </div>

                <div>
                    <label class="block text-gray-700 mb-2" for="phone">Company Phone</label>
                    <input type="tel"
                           id="phone"
                           name="phone_number"
                           value="{{ old('phone_number') }}"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('phone_number') border-red-500 @enderror"
                           >
                </div>

                <div>
                    <label class="block text-gray-700 mb-2" for="industry">Industry</label>
                    <input type="text"
                           id="industry"
                           name="industry"
                           value="{{ old('industry') }}"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('industry') border-red-500 @enderror"
                           >
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Is your company registered in Europe?</label>
                    <div class="space-y-2">
                        <label class="inline-flex items-center">
                            <input type="radio"
                                   name="is_registered_in_europe"
                                   value="yes"
                                   {{ old('is_registered_in_europe') == 'yes' ? 'checked' : '' }}
                                   class="form-radio"
                                   >
                            <span class="ml-2">Yes, it is registered</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio"
                                   name="is_registered_in_europe"
                                   value="no"
                                   {{ old('is_registered_in_europe') == 'no' ? 'checked' : '' }}
                                   class="form-radio">
                            <span class="ml-2">No, it is not registered</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Company Type</label>
                    <select name="company_type"
                            class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('company_type') border-red-500 @enderror"
                            >
                        <option value="" disabled selected>Select company type</option>
                        <option value="startup" {{ old('company_type') == 'startup' ? 'selected' : '' }}>Start up</option>
                        <option value="established" {{ old('company_type') == 'established' ? 'selected' : '' }}>Not start up</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Company Size</label>
                    <select name="company_size"
                            class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('company_size') border-red-500 @enderror"
                            >
                        <option value="" disabled selected>Select company size</option>
                        <option value="1-10" {{ old('company_size') == '1-10' ? 'selected' : '' }}>1-10 employees</option>
                        <option value="11-50" {{ old('company_size') == '11-50' ? 'selected' : '' }}>11-50 employees</option>
                        <option value="51-200" {{ old('company_size') == '51-200' ? 'selected' : '' }}>51-200 employees</option>
                        <option value="201-500" {{ old('company_size') == '201-500' ? 'selected' : '' }}>201-500 employees</option>
                        <option value="501+" {{ old('company_size') == '501+' ? 'selected' : '' }}>501+ employees</option>
                    </select>
                </div>
            </div>

            <!-- Job Requirements Section -->
            <div class="space-y-6">
                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Job Requirements</h3>

                <div>
                    <label class="block text-gray-700 mb-2">Available Positions</label>
                    <p class="text-sm text-gray-500 mb-2">If available positions are multiple, separate with commas.</p>
                    <input type="text"
                           name="available_positions"
                           value="{{ old('available_positions') }}"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('available_positions') border-red-500 @enderror"
                           >
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Number of Openings</label>
                    <input type="number"
                           name="number_of_openings"
                           value="{{ old('number_of_openings') }}"
                           min="1"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('number_of_openings') border-red-500 @enderror"
                           >
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Job Type</label>
                    <select name="job_type"
                            class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('job_type') border-red-500 @enderror"
                            >
                        <option value="" disabled selected>Select job type</option>
                        <option value="Full-time" {{ old('job_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="Part-time" {{ old('job_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">How soon should employee begin?</label>
                    <select name="start_availability"
                            class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('start_availability') border-red-500 @enderror"
                            >
                        <option value="Immediately" {{ old('start_availability') == 'Immediately' ? 'selected' : '' }}>Immediately</option>
                        <option value="Later" {{ old('start_availability') == 'Later' ? 'selected' : '' }}>Soon</option>
                    </select>
                </div>
            </div>

            <!-- Location Information -->
            <div class="space-y-6">
                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Location Information</h3>

                <div>
                    <label class="block text-gray-700 mb-2">Company's Country</label>
                    <p class="text-sm text-gray-500 mb-2">Your company must be among these countries</p>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach(['Germany', 'Switzerland', 'Luxembourg', 'Austria', 'Belgium'] as $country)
                            <label class="inline-flex items-center">
                                <input type="checkbox"
                                       name="company_country[]"
                                       value="{{ $country }}"
                                       {{ (is_array(old('company_country')) && in_array($country, old('company_country'))) ? 'checked' : '' }}
                                       class="form-checkbox">
                                <span class="ml-2">{{ $country }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Company Address</label>
                    <input type="text"
                           name="address"
                           value="{{ old('address') }}"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('address') border-red-500 @enderror"
                           >
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">ZIP Code</label>
                    <input type="text"
                           name="zip_code"
                           value="{{ old('zip_code') }}"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('zip_code') border-red-500 @enderror"
                           >
                </div>
            </div>

            <!-- Requirements Section -->
            <div class="space-y-6">
                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Employee Requirements</h3>

                <div>
                    <label class="block text-gray-700 mb-2"> Degree Levels</label>
                    <p class="text-sm text-gray-500 mb-2">If choices are multiple, separate with commas.</p>
                    <input type="text"
                           name="required_degrees"
                           value="{{ old('required_degrees') }}"
                           class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('_degrees') border-red-500 @enderror"
                           >
                </div>

                <!--  Languages (continued) -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2"> Languages</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach(['German', 'French', 'Italian', 'English', 'Luxembourgian', 'Dutch'] as $language)
                            <label class="inline-flex items-center">
                                <input type="checkbox"
                                       name="languages[]"
                                       value="{{ $language }}"
                                       {{ (is_array(old('languages')) && in_array($language, old('languages'))) ? 'checked' : '' }}
                                       class="form-checkbox text-blue-500 rounded">
                                <span class="ml-2">{{ $language }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('languages')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Language Proficiency Requirements -->
                <div id="languageProficiency" class="mb-4 {{ old('languages') ? '' : 'hidden' }}">
                    <label class="block text-gray-700 mb-2"> Language Proficiency Levels</label>
                    <!-- JavaScript will populate this section -->
                </div>

                <!-- Job Description -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Job Description</label>
                    <p class="text-sm text-gray-500 mb-2">
                        <span class="text-red-500 text-xl">*</span>
                        Provide job description and salary rate.
                    </p>
                    <textarea name="job_description"
                              class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('job_description') border-red-500 @enderror"
                              style="height: 150px;">{{ old('job_description') }}</textarea>
                    @error('job_description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contact Preference -->
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">How do we contact you?</label>
                    <select name="contact_method"
                            class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none @error('contact_method') border-red-500 @enderror"
                            >
                        <option value="Email Address" {{ old('contact_method') == 'Email Address' ? 'selected' : '' }}>via Email Address</option>
                        <option value="Whatsapp" {{ old('contact_method') == 'Whatsapp' ? 'selected' : '' }}>via Whatsapp</option>
                    </select>
                    @error('contact_method')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Consent Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Terms and Consent</h3>

                    <!-- Contact Consent -->
                    <div class="flex items-start">
                        <input type="checkbox"
                               name="contact_consent"
                               class="mt-1 form-checkbox text-blue-500"
                               {{ old('contact_consent') ? 'checked' : '' }}
                               >
                        <p class="ml-4 text-sm">
                            I consent to have GPNz contact me regarding potential candidates and recruitment services.
                            <span class="text-red-500">*</span>
                        </p>
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
                        <p class="ml-4 text-sm">
                            I agree to the
                            <a href="#" class="text-blue-500 hover:underline">terms and conditions</a>
                            and acknowledge that I have read the
                            <a href="#" class="text-blue-500 hover:underline">privacy policy</a>.
                            <span class="text-red-500">*</span>
                        </p>
                    </div>
                    @error('privacy_consent')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white p-4 rounded-md transition duration-200">
                        Submit Registration
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


@push('scripts')
<script type="text/javascript">
    // Language Proficiency Toggle
    document.querySelectorAll('input[name="languages[]"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const selectedLanguages = Array.from(document.querySelectorAll('input[name="languages[]"]:checked')).map(cb => cb.value);
            const proficiencyContainer = document.getElementById('languageProficiency');
            const oldProficiencies = @json(old('language_proficiency', []));

            proficiencyContainer.innerHTML = '';

            if (selectedLanguages.length > 0) {
                proficiencyContainer.classList.remove('hidden');
                selectedLanguages.forEach(function(language) {
                    const div = document.createElement('div');
                    div.classList.add('mb-4');
                    const oldValue = oldProficiencies[language] || '';

                    div.innerHTML = `
                        <label class="block text-gray-700 mb-2">${language}  Level</label>
                        <select name="language_proficiency[${language}]"
                                class="w-full p-4 border-2 border-gray-400 rounded-md focus:border-gray-300 focus:ring-1 focus:ring-gray-300 outline-none">
                            <option value="">Select  Level</option>
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
@endpush

@endsection
