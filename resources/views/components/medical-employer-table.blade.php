@props(['employers', 'totalEmployers'])
<table class="min-w-full divide-y divide-gray-200 text-sm">
    <thead class="bg-gray-50">
        <tr class="divide-x divide-gray-200">
            <th scope="col" class="sticky left-0 z-10 bg-gray-50 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Company Info
            </th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Location Details
            </th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Job Details
            </th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Contact Info
            </th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    @if($employers->count() > 0)
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($employers as $employer)
        <tr class="hover:bg-gray-50 divide-x divide-gray-200">
            <!-- Company Info -->
            <td class="sticky left-0 z-10 bg-white px-4 py-3 space-y-2">
                <div class="text-sm font-medium text-gray-600">{{ $employer->company_name }}</div>
                <div class="text-sm text-gray-500 mt-1">{{ $employer->company_address }}</div>
            </td>

            <!-- Location Details -->
            <td class="px-4 py-3">
                <div class="text-sm text-gray-500 space-y-2">
                    <div><span class="text-gray-600 pr-2">Company Location:</span> {{ $employer->company_location }}</div>
                    <div><span class="text-gray-600 pr-2">Company State:</span> {{ $employer->company_state }}</div>
                    <div><span class="text-gray-600 pr-2">Postal Code:</span>{{ $employer->company_state_postal_code }}</div>
                </div>
            </td>

            <!-- Job Details -->
            <td class="px-4 py-3">
                <div class="text-sm text-gray-500 space-y-2">
                    <div class="text-sm font-medium text-gray-600">{{ $employer->profession }}</div>
                    <div><span class="text-gray-600 pr-2">Work Start:</span> {{ $employer->start_date }}</div>
                    <div class="mt-2 text-xs text-gray-500">
                        {{ $employer->job_description }}
                    </div>
                    <div class="mt-1">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded">
                            {{ $employer->salary_range }} {{ $employer->currency }}
                        </span>
                    </div>
                </div>
            </td>

            <!-- Contact Info -->
            <td class="px-4 py-3">
                <div class="text-sm text-gray-500">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        {{ $employer->email }}
                    </div>
                    <div class="flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        {{ $employer->phone_number }}
                    </div>
                </div>
            </td>

            <!-- Actions -->
            <td class="px-4 py-3 whitespace-nowrap">
                <form action="{{ route('medical-employer.destroy', $employer->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this worker request?');">
                    @csrf
                    @method('DELETE')
                    <div class="flex items-center">
                        <button type="submit" title="Delete" class="text-red-600 hover:text-red-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                No employer listings found
            </td>
        </tr>
    </tbody>
    @endif
</table>
