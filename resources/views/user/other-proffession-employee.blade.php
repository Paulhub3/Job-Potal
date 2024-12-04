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

     <!-- Error Messages -->
     @if(session('error'))
     <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded mt-8">
         <div class="flex">
             <div class="flex-shrink-0">
                 <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                 </svg>
             </div>
             <div class="ml-3">
                 <ul class="text-sm text-red-600">
                     {{ session('error') }}
                 </ul>
             </div>
         </div>
     </div>
     @endif

    <div class="bg-white rounded-lg shadow-md">
        <div class="p-4 sm:flex sm:items-center sm:justify-between">
            <h1 class="text-xl font-semibold text-gray-900">Other Professions Applications</h1>
            <div class="mt-4 sm:mt-0 flex flex-col sm:flex-row gap-3">
                <input type="text" id="searchInput"  placeholder="Search applications..." class="rounded-lg border border-gray-300 p-2 text-sm">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 text-sm">
                    Export Data
                </button>
            </div>
        </div>

        <div class="p-4 border-t border-gray-200 bg-gray-50">
            <div class="text-sm text-blue-700 font-medium">Total Applications: {{ $totalApplications }}</div>
        </div>

        <div class="overflow-x-auto" id="searchResults">
            <x-other-proffession-employee-table
            :applications="$applications"
            :totalApplications="$totalApplications"/>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $applications->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
var searchTimer = null;
var searchInput = document.getElementById('searchInput');

if(searchInput) {
    searchInput.addEventListener('input', function() {
        if(searchTimer) {
            clearTimeout(searchTimer);
        }

        searchTimer = setTimeout(function() {
            var searchTerm = searchInput.value;
            var url = "{{ route('other-proffession-employee.index') }}?search=" + encodeURIComponent(searchTerm);

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(html) {
                document.getElementById('searchResults').innerHTML = html;
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
        }, 300);
    });
}
</script>
@endpush
@endsection
