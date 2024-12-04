@props(['applications', 'totalApplications'])
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Personal Information
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Specialties
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Location Details
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Qualifications
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
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
            <!-- Personal Information -->
            <td class="px-6 py-4">
                <div class="flex flex-col space-y-2">
                    <div class="text-sm font-medium text-gray-900">
                        {{ $application->first_name }} {{ $application->last_name }}
                    </div>
                    <div class="text-sm text-gray-500">{{ $application->email }}</div>
                    <div class="text-sm text-gray-500">{{ $application->phone_number }}</div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        {{ $application->gender }}
                    </span>
                </div>
            </td>

            <!-- Specialties -->
            <td class="px-6 py-4 space-y-2">
                <div class="text-sm text-gray-600"><span class="text-gray-600 pr-1">Primary Specialty:</span>{{ $application->primary_specialty }}</div>
                @if($application->secondary_specialty)
                    <div class="text-sm text-gray-500">
                        <span class="text-gray-600 pr-1">Secondary Specialty:</span>{{ $application->secondary_specialty }}</div>
                @endif
                <div class="mt-2 text-sm">
                    <span class="text-gray-600 pr-1">Job Type:</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $application->job_type === 'Full Time' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $application->job_type }}
                    </span>
                </div>
            </td>

            <!-- Location Details -->
            <td class="px-6 py-4">
                <div class="text-sm text-gray-600 space-y-2">
                    <div><span class="text-gray-600 pr-1">Country Of Origin:</span>{{ $application->country_of_origin }}</div>
                    <div class="text-gray-500"><span class="text-gray-600 pr-1">Present Country:</span>{{ $application->present_country }}</div>
                    <div class="text-sm text-gray-500 mt-1">
                        <span class="text-gray-600 pr-1">Preferred Countries:</span>
                        {{ $application->preferred_countries }}
                    </div>
                </div>
            </td>

            <!-- Qualifications -->
            <td class="px-6 py-4">
                <div class="text-sm text-gray-600 space-y-2">
                    <div class="mt-2">
                        <div><span class="text-gray-600 pr-1">Language:</span>{{ $application->languages }}</div>
                        <div class="text-gray-500"><span class="text-gray-600 pr-1">Language Level:</span> {{ $application->language_proficiency }}</div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $application->eu_license ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            EU License: {{ $application->eu_license ? 'Yes' : 'No' }}
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

            <!-- Status -->
            <td class="px-6 py-4">
                <div class="text-sm space-y-2">
                    <div><span class="text-gray-600 pr-1">Start Date:</span>{{ $application->start_availability }}</div>
                    <div class="text-gray-500 "><span class="text-gray-700 pr-1">Contact via:</span>{{ $application->contact_method }}</div>
                    <div class="flex flex-col gap-1 mt-2">
                        @if($application->contact_consent)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Contact Consent
                            </span>
                        @endif
                        @if($application->privacy_consent)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Privacy Consent
                            </span>
                        @endif
                    </div>
                </div>
            </td>

            <!-- Actions -->
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <form action="{{ route('other-medical-job.destroy', $application->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this application?');">
                    @csrf
                    @method('DELETE')
                    <div class="flex flex-col space-y-2">
                        <button class="text-red-600 hover:text-red-900" title="Delete">Delete</button>
                    </div>
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
