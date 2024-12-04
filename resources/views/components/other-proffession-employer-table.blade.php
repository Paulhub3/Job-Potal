@props(['employers', 'totalEmployers'])
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Company Details
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Job Information
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Requirements
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Location & Contact
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    @if($employers->count() > 0)
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($employers as $employer)
        <tr class="hover:bg-gray-50">
            <!-- Company Details -->
            <td class="px-6 py-4">
                <div class="flex flex-col space-y-2">
                    <div class="text-sm font-medium text-gray-700">{{ $employer->company_name }}</div>
                    <div class="text-sm text-gray-500">{{ $employer->industry }}</div>
                    <div class="flex gap-2 mt-2">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 flex-col space-y-2">
                            <span class="text-gray-600 pr-1">Company Type:</span>
                            {{ $employer->company_type }}
                        </span>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 flex-col space-y-2">
                            <span class="text-gray-600 pr-1">Company Size:</span>
                            {{ $employer->company_size }} employees
                        </span>
                    </div>
                    <div class="mt-2 text-sm">
                        <span class="text-gray-600 pr-1">Company is registered?:</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ">
                            {{ $employer->is_registered_in_europe ? 'EU Registered' : 'Non-EU Registered' }}
                        </span>
                    </div>
                </div>
            </td>

            <!-- Job Information -->
            <td class="px-6 py-4">
                <div class="text-sm space-y-2">
                    <div class="font-medium text-gray-900"><span class="text-gray-600 pr-1">Available Position:</span>{{ $employer->available_positions }}</div>
                    <div class="text-gray-500"><span class="text-gray-600 pr-1">Openings:</span>{{ $employer->number_of_openings }}</div>
                    <div class="mt-2">
                        <span class="text-gray-600 pr-1">Job Type:</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            {{ $employer->job_type }}
                        </span>
                    </div>
                    <div class="mt-2 text-gray-500">
                        <span class="text-gray-600 pr-1">Start Availability:</span>
                         {{ $employer->start_availability }}
                    </div>
                </div>
            </td>

            <!-- Requirements -->
            <td class="px-6 py-4">
                <div class="text-sm">
                    <div class="mt-2">
                        <span class="text-gray-600 pr-1">Job Description:</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            {{ $employer->job_description }}
                        </span>
                    </div>
                    <div class="text-gray-500 mt-2"><span class="text-gray-600 pr-1">Required Degrees:</span>{{ $employer->required_degrees }}</div>
                    <div class="mt-2">
                        <div class="text-gray-500"><span class="text-gray-600 pr-1">Languages:</span> {{ implode(', ', $employer->languages) }}</div>
                        <div class="text-gray-500"><span class="text-gray-600 pr-1 mt-1">Languages Level:</span> {{ $employer->language_proficiency }}</div>
                    </div>
                    <div class="mt-2 text-gray-500">
                        <span class="text-gray-600 pr-1">Contact Via:</span>
                         {{ $employer->contact_method }}
                    </div>
                </div>
            </td>

            <!-- Location & Contact -->
            <td class="px-6 py-4">
                <div class="text-sm">
                    <div class="text-gray-700"><span class="text-gray-600 pr-1">Company Location:</span>{{ $employer->company_country }}</div>
                    <div class="text-gray-500"><span class="text-gray-600 pr-1">Company Address:</span>{{ $employer->address }}</div>
                    <div class="text-gray-500"><span class="text-gray-600 pr-1">Company zip_cod:</span>{{ $employer->zip_code }}</div>

                    <div class="mt-2">
                        <div class="text-gray-700 mb-1 font-medium">Contact info</div>
                        <div class="text-gray-600">{{ $employer->email }}</div>
                        <div class="text-gray-600">{{ $employer->phone_number }}</div>
                    </div>
                    <div class="mt-4 flex flex-col gap-1">
                        @if($employer->contact_consent)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Contact Consent ✓
                            </span>
                        @endif
                        @if($employer->privacy_consent)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Privacy Consent ✓
                            </span>
                        @endif
                    </div>
                </div>
            </td>

            <!-- Actions -->
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <form action="{{ route('other-proffession-employer.destroy', $employer->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this Request?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:text-red-900 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                No employers found
            </td>
        </tr>
    </tbody>
    @endif
</table>
