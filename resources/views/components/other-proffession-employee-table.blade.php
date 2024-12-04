@props(['applications', 'totalApplications'])
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Applicant Info
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Professional Details
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Experience
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Location & Availability
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Languages & Preferences
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    @if($applications->count() > 0)
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($applications as $application)
        <tr class="hover:bg-gray-50">
            <!-- Applicant Info -->
            <td class="px-6 py-4">
                <div class="flex flex-col space-y-2">
                    <div class="text-sm font-medium text-gray-700">{{ $application->full_name }}</div>
                    <div class="text-sm text-gray-500">{{ $application->email }}</div>
                    <div class="text-sm text-gray-500">{{ $application->phone_number }}</div>
                    <div class>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            {{ $application->gender }}
                        </span>
                    </div>
                    <div>
                        <span class="text-gray-600 pr-1 text-sm">Date Birth:</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            {{ $application->dob }}
                        </span>
                    </div>
                </div>
            </td>

            <!-- Professional Details -->
            <td class="px-6 py-4">
                <div class="text-sm space-y-2">
                    <div class="font-medium text-gray-600"><span class="text-gray-600 pr-1 text-sm">Profession:</span>{{ $application->profession }}</div>
                    <div class="text-gray-500"><span class="text-gray-600 pr-1 text-sm">Degree Level:</span>{{ $application->degree_level }}</div>
                    <div class="mt-2">
                        <span class="text-gray-600 pr-1 text-sm">Job Type:</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $application->job_type === 'Full Time' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $application->job_type }}
                        </span>
                    </div>
                    @if($application->cv_path)
                        <div class="flex gap-4">
                            {{-- View CV in new tab --}}
                            <a href="{{ Storage::url($application->cv_path) }}"
                            target="_blank"
                            class="text-blue-600 hover:text-blue-900 text-sm mt-2 inline-block">
                                View CV
                            </a>

                            {{-- Download CV --}}
                            <a href="{{ Storage::url($application->cv_path) }}"
                            download
                            class="text-blue-600 hover:text-blue-900 text-sm mt-2 inline-block">
                                Download CV
                            </a>
                        </div>
                    @endif
                </div>
            </td>

            <!-- Experience -->
            <td class="px-6 py-4">
                <div class="text-sm">
                    <div><span class="text-gray-600 pr-1 text-sm">Job Experience:</span><span class="font-medium">{{ $application->job_experience }}</span> years exp.</div>
                    @if($application->previous_employer)
                        <div class="text-gray-500 mt-1">
                            <div><span class="text-gray-600 pr-1 text-sm">Previous Employer:</span>{{ $application->previous_employer }}</div>
                            <div class="text-gray-500"><span class="text-gray-600 pr-1 text-sm">Previous Position:</span>{{ $application->previous_position }}</div>
                        </div>
                    @endif
                </div>
            </td>

            <!-- Location & Availability -->
            <td class="px-6 py-4">
                <div class="text-sm">
                    <div>
                        <span class="text-gray-600 pr-1">Country Of Origin:</span>
                        <span>{{ $application->country_of_origin }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600 pr-1">Present Current:</span>
                        <span>{{ $application->present_country }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600 pr-1">Preferred Countries:</span>
                        <span>{{ $application->preferred_countries }}</span>
                    </div>
                    <div class="mt-2 text-gray-900 pr-1">
                        Available from: {{ $application->start_availability }}
                    </div>
                </div>
            </td>

            <!-- Languages & Preferences -->
            <td class="px-6 py-4">
                <div class="text-sm">
                    <div class="font-medium"><span class="text-gray-600 pr-1">Languages:</span>{{ $application->languages }}</div>
                    <div class="text-gray-500"><span class="text-gray-600 pr-1">Languages Level:</span>{{ $application->language_proficiency }}</div>
                    <div class="mt-2 text-gray-500"><span class="text-gray-600 pr-1">Contact Via:</span>{{ $application->contact_method }}</div>
                    <div class="flex flex-col gap-1 mt-2">
                        @if($application->contact_consent)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Contact Consent ✓
                            </span>
                        @endif
                        @if($application->privacy_consent)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Privacy Consent ✓
                            </span>
                        @endif
                    </div>
                </div>
            </td>

            <!-- Actions -->
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <form action="{{ route('other-proffession-employee.destroy', $application->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this application?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:text-red-900 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                No applications found
            </td>
        </tr>
    </tbody>
    @endif
</table>
