@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md">
        <div class="p-4 sm:flex sm:items-center sm:justify-between">
            <h1 class="text-xl font-semibold text-gray-900">Other Professions Employers</h1>
            <div class="mt-4 sm:mt-0">
                <input type="text" id="searchInput"  placeholder="Search applications..." class="rounded-lg border border-gray-300 p-2 text-sm">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 text-sm">
                    Export Data
                </button>
            </div>
        </div>

        <div class="p-4 border-t border-gray-200 bg-gray-50">
            <div class="text-sm text-blue-700 font-medium">Total Companies:{{ $totalEmployers }}</div>
        </div>

        <div class="overflow-x-auto" id="searchResults">
            <x-other-proffession-employer-table
            :employers="$employers"
            :totalEmployers="$totalEmployers"/>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $employers->links() }}
        </div>
    </div>

    <!-- Modal for Job Description -->
    <div id="jobDescriptionModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Job Description</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500" id="jobDescriptionText"></p>
                </div>
                <div class="mt-4">
                    <button onclick="closeJobDescription()" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function viewJobDescription(description) {
    document.getElementById('jobDescriptionText').textContent = description;
    document.getElementById('jobDescriptionModal').classList.remove('hidden');
}

function closeJobDescription() {
    document.getElementById('jobDescriptionModal').classList.add('hidden');
}
</script>



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
            var url = "{{ route('other-proffession-employer.index') }}?search=" + encodeURIComponent(searchTerm);

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
