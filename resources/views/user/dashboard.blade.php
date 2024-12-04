@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-6">

     <!-- Success Message -->
    @if(session('success'))
    <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 rounded mt-8 ">
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

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
            <div class="bg-blue-500 text-white rounded-lg p-4 hover:bg-blue-600 transition-colors">
                <h3 class="text-lg font-semibold">Nursing Job Applications</h3>
                <p class="text-2xl font-bold">{{ $totalNurseApplcations }}</p>
            </div>

            <div class="bg-green-500 text-white rounded-lg p-4 hover:bg-green-600 transition-colors">
                <h3 class="text-lg font-semibold">Medical Employer</h3>
                <p class="text-2xl font-bold">{{ $totalMedicalEmployers }}</p>
            </div>

            <div class="bg-yellow-500 text-white rounded-lg p-4 hover:bg-yellow-600 transition-colors">
                <h3 class="text-lg font-semibold">Other Medical jobs</h3>
                <p class="text-2xl font-bold">{{ $totalOtherMedicalJob }}</p>
            </div>

            <div class="bg-green-500 text-white rounded-lg p-4 hover:bg-green-600 transition-colors">
                <h3 class="text-lg font-semibold">Other Professions Application</h3>
                <p class="text-2xl font-bold">{{ $totalOtherProffessionEmployee }}</p>
            </div>

            <div class="bg-[#1E90FF] text-white rounded-lg p-4 hover:bg-blue-600 transition-colors">
                <h3 class="text-lg font-semibold">Other Professions Employer</h3>
                <p class="text-2xl font-bold">{{ $totalOtherProffessionEmployer }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-700">Jobs Secured</h3>
                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">
                    Total: 345 Jobs
                </span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <!-- Rest of the table code remains the same -->
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            applicant name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            type of job
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            company name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Date
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($pageVisits ?? [] as $visit)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $visit->page }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ number_format($visit->visitors) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ number_format($visit->unique_users) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex items-center">
                                @if($visit->trend === 'up')
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                @endif
                                {{ number_format($visit->bounce_rate, 2) }}%
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
