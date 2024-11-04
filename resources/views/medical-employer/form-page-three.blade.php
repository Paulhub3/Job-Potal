@extends('layout.base-layout')

@section('content')
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 50%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="hidden md:block text-gray-600 font-medium">
                    Professional Details
                </div>

                <div class="text-gray-500 text-sm">
                    50% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('form.page2') }}">
        @csrf
        <div class="w-full pt-32 md:pt-36 overflow-y-auto h-[500px] md:h-[700px]">
            <div class="flex flex-col items-center justify-center">
                <!-- Heading Text -->
                <div class="px-6 text-center">
                    <h1 class="font-sans text-xl font-semibold md:text-2xl text-slate-600">
                        What professions are you looking for?
                    </h1>
                </div>

                <!-- Profession Selection -->
                <div class="flex flex-col w-full px-4 mx-auto mt-10 space-y-3 md:w-8/12 lg:w-5/12 md:space-y-4 md:mt-20">
                    <label for="profession" class="font-sans text-base font-medium text-gray-600 md:text-xl">Profession</label>
                    <div class="relative">
                        <select name="profession"
                                id="profession"
                                class="block w-full px-6 py-4 mt-4 text-gray-700 border-2 border-gray-400 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 appearance-none bg-white"
                                >
                            <option value="">Choose...</option>
                            <option value="Accident and Emergency Medicine" {{ old('profession', $profession) == 'Accident and Emergency Medicine' ? 'selected' : '' }}>Accident and Emergency Medicine</option>
                            <option value="Allergology and Immunology" {{ old('profession', $profession) == 'Allergology and Immunology' ? 'selected' : '' }}>Allergology and Immunology</option>
                            <option value="Anatomical Pathology" {{ old('profession', $profession) == 'Anatomical Pathology' ? 'selected' : '' }}>Anatomical Pathology</option>
                            <option value="Anesthesiology" {{ old('profession', $profession) == 'Anesthesiology' ? 'selected' : '' }}>Anesthesiology</option>
                            <option value="Audiology" {{ old('profession', $profession) == 'Audiology' ? 'selected' : '' }}>Audiology</option>
                            <option value="Biomedical Analyst" {{ old('profession', $profession) == 'Biomedical Analyst' ? 'selected' : '' }}>Biomedical Analyst</option>
                            <option value="Cardiology" {{ old('profession', $profession) == 'Cardiology' ? 'selected' : '' }}>Cardiology</option>
                            <option value="Cardio-Thoracic surgery" {{ old('profession', $profession) == 'Cardio-Thoracic surgery' ? 'selected' : '' }}>Cardio-Thoracic surgery</option>
                            <option value="Chemical Pathology" {{ old('profession', $profession) == 'Chemical Pathology' ? 'selected' : '' }}>Chemical Pathology</option>
                            <option value="Child and Adolescents psychiatry" {{ old('profession', $profession) == 'Child and Adolescents psychiatry' ? 'selected' : '' }}>Child and Adolescents psychiatry</option>
                            <option value="Child Neurology" {{ old('profession', $profession) == 'Child Neurology' ? 'selected' : '' }}>Child Neurology</option>
                            <option value="Clinical Neurophysiology" {{ old('profession', $profession) == 'Clinical Neurophysiology' ? 'selected' : '' }}>Clinical Neurophysiology</option>
                            <option value="Dentistry" {{ old('profession', $profession) == 'Dentistry' ? 'selected' : '' }}>Dentistry</option>
                            <option value="Dermatology and Venerology" {{ old('profession', $profession) == 'Dermatology and Venerology' ? 'selected' : '' }}>Dermatology and Venerology</option>
                            <option value="Emergency Medicine" {{ old('profession', $profession) == 'Emergency Medicine' ? 'selected' : '' }}>Emergency Medicine</option>
                            <option value="Endocrinology" {{ old('profession', $profession) == 'Endocrinology' ? 'selected' : '' }}>Endocrinology</option>
                            <option value="Family Medicine" {{ old('profession', $profession) == 'Family Medicine' ? 'selected' : '' }}>Family Medicine</option>
                            <option value="Forensic Psychiatry" {{ old('profession', $profession) == 'Forensic Psychiatry' ? 'selected' : '' }}>Forensic Psychiatry</option>
                            <option value="Gastroenterology" {{ old('profession', $profession) == 'Gastroenterology' ? 'selected' : '' }}>Gastroenterology</option>
                            <option value="Geriatrics" {{ old('profession', $profession) == 'Geriatrics' ? 'selected' : '' }}>Geriatrics</option>
                            <option value="Hematology" {{ old('profession', $profession) == 'Hematology' ? 'selected' : '' }}>Hematology</option>
                            <option value="Infectious Diseases" {{ old('profession', $profession) == 'Infectious Diseases' ? 'selected' : '' }}>Infectious Diseases</option>
                            <option value="Internal Medicine" {{ old('profession', $profession) == 'Internal Medicine' ? 'selected' : '' }}>Internal Medicine</option>
                            <option value="Laboratory Medicine" {{ old('profession', $profession) == 'Laboratory Medicine' ? 'selected' : '' }}>Laboratory Medicine</option>
                            <option value="Mamographer" {{ old('profession', $profession) == 'Mamographer' ? 'selected' : '' }}>Mamographer</option>
                            <option value="Medical Genetics" {{ old('profession', $profession) == 'Medical Genetics' ? 'selected' : '' }}>Medical Genetics</option>
                            <option value="Microbiology" {{ old('profession', $profession) == 'Microbiology' ? 'selected' : '' }}>Microbiology</option>
                            <option value="Midwife" {{ old('profession', $profession) == 'Midwife' ? 'selected' : '' }}>Midwife</option>
                            <option value="Neonatology" {{ old('profession', $profession) == 'Neonatology' ? 'selected' : '' }}>Neonatology</option>
                            <option value="Nephrology" {{ old('profession', $profession) == 'Nephrology' ? 'selected' : '' }}>Nephrology</option>
                            <option value="Neurology" {{ old('profession', $profession) == 'Neurology' ? 'selected' : '' }}>Neurology</option>
                            <option value="Neurosurgery" {{ old('profession', $profession) == 'Neurosurgery' ? 'selected' : '' }}>Neurosurgery</option>
                            <option value="Nuclear Medicine" {{ old('profession', $profession) == 'Nuclear Medicine' ? 'selected' : '' }}>Nuclear Medicine</option>
                            <option value="Nurse" {{ old('profession', $profession) == 'Nurse' ? 'selected' : '' }}>Nurse</option>
                            <option value="Obstetrics and Gynaecology" {{ old('profession', $profession) == 'Obstetrics and Gynaecology' ? 'selected' : '' }}>Obstetrics and Gynaecology</option>
                            <option value="Occupational Medicine" {{ old('profession', $profession) == 'Occupational Medicine' ? 'selected' : '' }}>Occupational Medicine</option>
                            <option value="Oncological Radiotherapy" {{ old('profession', $profession) == 'Oncological Radiotherapy' ? 'selected' : '' }}>Oncological Radiotherapy</option>
                            <option value="Oncology" {{ old('profession', $profession) == 'Oncology' ? 'selected' : '' }}>Oncology</option>
                            <option value="Ophtalmology" {{ old('profession', $profession) == 'Ophtalmology' ? 'selected' : '' }}>Ophtalmology</option>
                            <option value="Oral and Maxillofacial surgery" {{ old('profession', $profession) == 'Oral and Maxillofacial surgery' ? 'selected' : '' }}>Oral and Maxillofacial surgery</option>
                            <option value="Otorhinolaryngology" {{ old('profession', $profession) == 'Otorhinolaryngology' ? 'selected' : '' }}>Otorhinolaryngology</option>
                            <option value="Pathology" {{ old('profession', $profession) == 'Pathology' ? 'selected' : '' }}>Pathology</option>
                            <option value="Paediatric Cardiology" {{ old('profession', $profession) == 'Paediatric Cardiology' ? 'selected' : '' }}>Paediatric Cardiology</option>
                            <option value="Paediatric Gastroenterology" {{ old('profession', $profession) == 'Paediatric Gastroenterology' ? 'selected' : '' }}>Paediatric Gastroenterology</option>
                            <option value="Paediatric Oncology and Hematology" {{ old('profession', $profession) == 'Paediatric Oncology and Hematology' ? 'selected' : '' }}>Paediatric Oncology and Hematology</option>
                            <option value="Paediatric Surgery" {{ old('profession', $profession) == 'Paediatric Surgery' ? 'selected' : '' }}>Paediatric Surgery</option>
                            <option value="Paediatrics" {{ old('profession', $profession) == 'Paediatrics' ? 'selected' : '' }}>Paediatrics</option>
                            <option value="Pharmacist" {{ old('profession', $profession) == 'Pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                            <option value="Physiotherapist" {{ old('profession', $profession) == 'Physiotherapist' ? 'selected' : '' }}>Physiotherapist</option>
                            <option value="Plastic Surgery" {{ old('profession', $profession) == 'Plastic Surgery' ? 'selected' : '' }}>Plastic Surgery</option>
                            <option value="Psychiatry" {{ old('profession', $profession) == 'Psychiatry' ? 'selected' : '' }}>Psychiatry</option>
                            <option value="Public Health and Preventive Medicine" {{ old('profession', $profession) == 'Public Health and Preventive Medicine' ? 'selected' : '' }}>Public Health and Preventive Medicine</option>
                            <option value="Pulmonology" {{ old('profession', $profession) == 'Pulmonology' ? 'selected' : '' }}>Pulmonology</option>
                            <option value="Radiology" {{ old('profession', $profession) == 'Radiology' ? 'selected' : '' }}>Radiology</option>
                            <option value="Radiology technician/ Radiographer" {{ old('profession', $profession) == 'Radiology technician/ Radiographer' ? 'selected' : '' }}>Radiology technician/ Radiographer</option>
                            <option value="Rehabilitation Medicine" {{ old('profession', $profession) == 'Rehabilitation Medicine' ? 'selected' : '' }}>Rehabilitation Medicine</option>
                            <option value="Rheumatology" {{ old('profession', $profession) == 'Rheumatology' ? 'selected' : '' }}>Rheumatology</option>
                            <option value="Sport Medicine" {{ old('profession', $profession) == 'Sport Medicine' ? 'selected' : '' }}>Sport Medicine</option>
                            <option value="Surgery-General" {{ old('profession', $profession) == 'Surgery-General' ? 'selected' : '' }}>Surgery-General</option>
                            <option value="Toxicology" {{ old('profession', $profession) == 'Toxicology' ? 'selected' : '' }}>Toxicology</option>
                            <option value="Transfusion Medicine" {{ old('profession', $profession) == 'Transfusion Medicine' ? 'selected' : '' }}>Transfusion Medicine</option>
                            <option value="Trauma and Orthopedics" {{ old('profession', $profession) == 'Trauma and Orthopedics' ? 'selected' : '' }}>Trauma and Orthopedics</option>
                            <option value="Tropical Medicine" {{ old('profession', $profession) == 'Tropical Medicine' ? 'selected' : '' }}>Tropical Medicine</option>
                            <option value="Urology" {{ old('profession', $profession) == 'Urology' ? 'selected' : '' }}>Urology</option>
                            <option value="Vascular Surgery" {{ old('profession', $profession) == 'Vascular Surgery' ? 'selected' : '' }}>Vascular Surgery</option>
                            <option value="Other" {{ old('profession', $profession) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>

                        <!-- Custom Select Arrow -->
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none top-4">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    @error('profession')
                        <div class="text-red-600 text-sm animate-shake">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="absolute w-full px-4 bottom-24">
                <div class="flex justify-between">
                    <!-- Previous button -->
                    <a href="{{ route('form.page1') }}"
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

    /* Error Animation */
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    .animate-shake {
        animation: shake 0.5s ease-in-out;
    }

    /* Select Input Focus */
    select:focus {
        outline: none;
    }

    /* Remove default select styling */
    select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: none;
    }
</style>
@endpush

@endsection
