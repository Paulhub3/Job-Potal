@props(['applications', 'totalApplications'])
<table class="min-w-full divide-y divide-gray-200 text-sm">
    <thead class="bg-gray-50">
        <tr class="divide-x divide-gray-200">
            <th scope="col" class="sticky left-0 z-10 bg-gray-50 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name & Contact</th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Demographics</th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Work Details</th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Training</th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Language</th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
    </thead>
    @if($applications->count() > 0)
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($applications as $application)
        <tr class="hover:bg-gray-50 divide-x divide-gray-200">
            <td class="sticky left-0 z-10 bg-white px-4 py-3 whitespace-nowrap space-y-2">
                <div class="text-sm font-medium text-gray-600">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->surname }}</div>
                <div class="text-sm text-gray-500">{{ $application->email }}</div>
                <div class="text-sm text-gray-500">{{ $application->phone_number }}</div>
                <div class="text-sm text-gray-500">{{ $application->gender }}</div>
                <div class="text-sm text-gray-500">{{ $application->phone }}</div>
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                <div class="text-sm text-gray-500">
                    <div><span class="text-gray-700 pr-2">Nationality:</span>{{ $application->nationality }}</div>
                    <div><span class="text-gray-700 pr-2">Country Residence:</span>{{ $application->country_residence }}</div>
                </div>
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                <div class="text-sm text-gray-500 space-y-2">
                    <div><span class="text-gray-700 pr-2">Work Country:</span> {{ $application->work_country }}</div>
                    <div><span class="text-gray-700 pr-2">Work State:</span> {{ $application->work_state }}</div>
                    <div><span class="text-gray-700 pr-2">Work State Postal code:</span> {{ $application->work_state_postal_code }}</div>
                </div>
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                <div class="text-sm text-gray-500 space-y-2">
                    <div><span class="text-gray-700 pr-2">Job Type:</span>{{ $application->work_type }}</div>
                    <div><span class="text-gray-700 pr-2">Future Work:</span>{{ $application->future_work }}</div>
                    <div><span class="text-gray-700 pr-2">Start Date:</span>{{ $application->start_date }}</div>
                </div>
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                <div class="text-sm text-gray-500 space-y-2">
                    <div><span class="text-gray-700 pr-2">Training Background:</span>{{ $application->training_type }}</div>
                    <div><span class="text-gray-700 pr-2">Additional Qualifications:</span>{{ $application->additional_qualifications }}</div>
                    <div class="mt-1">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $application->eu_license ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            <span class="text-gray-700 pr-2">EU License:</span>{{ $application->eu_license ? 'Yes' : 'No' }}
                        </span>
                    </div>
                </div>
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                <div class="text-sm text-gray-500 space-y-2">
                    <div>{{ $application->language }}</div>
                    <div><span class="text-gray-700 pr-2">Level:</span>{{ $application->language_level }}</div>
                </div>
            </td>
            <td class="px-4 py-3 text-sm text-gray-500">
                <form action="{{ route('medical-employer.destroy', $application->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this  application?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" title="Delete" class="text-red-600 hover:text-red-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                No applications found
            </td>
        </tr>
    </tbody>
    @endif
</table>
