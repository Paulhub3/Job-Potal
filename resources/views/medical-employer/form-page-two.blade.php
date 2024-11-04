@extends('layout.base-layout')

@section('content')
<!-- Add this at the top of your content section, right after the form opening tag -->
<div class="w-full">
    <!-- Progress Bar Container -->
    <div class="fixed top-[72px] w-full z-20">
        <!-- Main Progress Bar -->
        <div class="w-full bg-gray-200 h-1.5">
            <div class="bg-blue-600 h-1.5 transition-all duration-500" style="width: 33.33%"></div>
        </div>

        <!-- Progress Info -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
                <div class="hidden md:block text-gray-600 font-medium">
                    Company Location Details
                </div>

                <div class="text-gray-500 text-sm">
                    33% Complete
                </div>
            </div>
        </div>
    </div>

    <!-- Rest of your form content, adjusted for the progress bar -->
    <form method="POST" action="{{ route('form.page1') }}">
    @csrf
    <div class="w-full pt-32 md:pt-36 overflow-y-auto h-[700px] md:h-[800px]">
        <!-- Your existing content here -->
        <div class="flex flex-col items-center justify-center">
            <!-- Heading Text -->
            <div class="px-6 text-center">
                <h1 class="font-sans text-xl font-semibold md:text-2xl text-slate-600">
                    In which of these city is your company located?
                </h1>
            </div>

            <div class="block w-full px-6 mt-10 md:justify-center md:flex md:mt-20">
                @php
                    $companyLocation = session('form.page.company_location', []);
                @endphp

                @foreach($companyLocation as $index => $country)
                <div class="grid grid-cols-1 md:gap-4 lg:gap-1 lg:w-4/12">
                    <div class="flex flex-col mb-4">
                        <div class="w-full px-8 mb-4">
                            <h3 class="font-sans text-xl font-semibold md:text-2xl text-slate-600">{{ $country }}</h3>
                        </div>

                        <input type="hidden" name="countries[]" value="{{ $country }}">

                        <div class="flex flex-col w-full px-8 mb-4 md:space-y-2">
                            <label for="states-{{ $index }}" class="block font-sans text-base font-semibold text-black md:text-lg">States</label>
                            <select id="states-{{ $index }}"
                                    name="states[{{ $index }}][]"
                                    class="block w-full px-6 py-3 text-gray-500 border-2 border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all duration-200"
                                    multiple="multiple">
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col w-full px-8 mb-4 md:space-y-2">
                        <label for="postal-codes-{{ $index }}" class="block font-sans text-base font-semibold text-black md:text-lg">Postal Codes</label>
                        <input type="text"
                               id="postal-codes-{{ $index }}"
                               name="postal_codes[{{ $index }}]"
                               class="block w-full px-6 py-3 text-gray-500 border-2 border-gray-400 rounded-md focus:outline-none bg-gray-50"
                               readonly>
                    </div>
                </div>
                @endforeach
            </div>
            @if($errors->any())
                <div class="mt-2 font-sans text-base text-red-600 mb-3 animate-shake">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Buttons Section -->
        <div class="absolute w-full px-6 bottom-24">
            <div class="flex justify-between">
                <!-- Previous button -->
                <a href="{{ route('form.page') }}"
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

            <!-- Notification text -->
            <div class="flex justify-center w-full px-4 mt-6 space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <p class="font-sans text-xs text-center md:text-sm text-slate-400">
                    <strong>Please note, we only help you find jobs in the countries listed above.</strong>
                </p>
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

    /* Select2 Custom Styling */
    .select2-container .select2-selection--multiple {
        min-height: 48px;
        border: 2px solid #9ca3af;
        border-radius: 0.375rem;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #e5e7eb;
        border: none;
        border-radius: 4px;
        padding: 4px 8px;
        margin: 4px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #4b5563;
        margin-right: 4px;
    }

    .select2-dropdown {
        border: 2px solid #9ca3af;
        border-radius: 0.375rem;
    }
</style>
@endpush

<script>
    $(document).ready(function() {
        const data = {
            'Germany': {
                'Baden-Württemberg': '70173',
                'Bavaria': '80331',
                'Berlin': '10115',
                'Brandenburg': '14467',
                'Bremen': '28195',
                'Hamburg': '20095',
                'Hesse': '60313',
                'Lower Saxony': '30159',
                'Mecklenburg-Vorpommern': '19053',
                'North Rhine-Westphalia': '50667',
                'Rhineland-Palatinate': '55116',
                'Saarland': '66111',
                'Saxony': '01067',
                'Saxony-Anhalt': '39104',
                'Schleswig-Holstein': '24103',
                'Thuringia': '99084'
            },
            'Austria': {
                'Burgenland': '7000',
                'Carinthia': '9020',
                'Lower Austria': '3100',
                'Upper Austria': '4020',
                'Salzburg': '5020',
                'Styria': '8010',
                'Tyrol': '6020',
                'Vorarlberg': '6850',
                'Vienna': '1010'
            },
            'Luxembourg': {
                'Clervaux': '9700',
                'Diekirch': '9201',
                'Echternach': '6401',
                'Esch-sur-Alzette': '4001',
                'Luxembourg': '1009',
                'Remich': '5501',
                'Wiltz': '9501',
                'Grevenmacher': '5000',
                'Capellen': '8000',
                'Mersch': '7300',
                'Redange': '8500',
                'Vianden':'9401',

            },
            'Switzerland': {
                'Aargau': '5000',
                'Appenzell Ausserrhoden': '9050',
                'Appenzell Innerrhoden': '9050',
                'Basel-Landschaft': '4410',
                'Basel-Stadt': '4001',
                'Bern': '3000',
                'Fribourg': '1700',
                'Geneva': '1201',
                'Glarus': '8750',
                'Graubünden': '7000',
                'Jura': '2900',
                'Lucerne': '6000',
                'Neuchâtel': '2000',
                'Nidwalden': '6370',
                'Obwalden': '6060',
                'Schaffhausen': '8200',
                'Schwyz': '6430',
                'Solothurn': '4500',
                'St. Gallen': '9000',
                'Thurgau': '8500',
                'Ticino': '6500',
                'Uri': '6460',
                'Valais': '1950',
                'Vaud': '1000',
                'Zug': '6300',
                'Zurich': '8001'
            },
             'Belgium': {

                    'Brussels': '1000',
                    'Etterbeek': '1040',
                    'Ixelles': '1050',
                    'Schaerbeek': '1030',
                    'Anderlecht': '1070',
                    'Uccle': '1180',
                   ' Woluwe-Saint-Lambert': '1200',
                   ' Woluwe-Saint-Pierre': '1150',
                    'Antwerp (Antwerpen)': '2000',
                    'Mechelen': '2800',
                    'Turnhout': '2300',
                    'Lier': '2500',
                    'Geel': '2440',
                    'Ghent (Gent)': '9000',
                    'Aalst': '9300',
                    'Sint-Niklaas': '9100',
                    'Dendermonde': '9200',
                    'Lokeren': '9160',
                    'Eeklo': '9900',
                    'Leuven': '3000',
                    'Vilvoorde': '1800',
                    'Tienen': '3300',
                    'Halle': '1500',
                    'Zaventem': '1930',
                    'Hasselt': '3500',
                    'Genk': '3600',
                    'Sint-Truiden': '3800',
                    'Maaseik': '3680',
                    'Tongeren': '3700',
                    'Bruges (Brugge)': '8000',
                    'Kortrijk': '8500',
                    'Ostend (Oostende)': '8400',
                    'Roeselare': '8800',
                    'Ypres (Ieper)': '8900',
                    'Mons': '7000',
                    'Charleroi': '6000',
                    'Tournai': '7500',
                    'La Louvière': '7100',
                    'Chimay': '6460',
                    'Liège': '4000',
                    'Verviers': '4800',
                    'Seraing': '4100',
                    'Huy': '4500',
                    'Eupen': '4700',
                    'Arlon': '6700',
                    'Bastogne': '6600',
                    'Marche-en-Famenne': '6900',
                    'Neufchâteau': '6840',
                    'Virton': '6760',
                    'Namur': '5000',
                    'Dinant': '5500',
                    'Andenne': '5300',
                    'Philippeville': '5600',
                    'Gembloux': '5030',
                    'Wavre': '1300',
                    'Nivelles': '1400',
                    'Ottignies-Louvain-la-Neuve': '1340',
                    'Braine-l Alleud': '1420',
                    'Waterloo': '1410'
            }
        };

        @foreach($companyLocation as $index => $country)
            (function(index, country) {
                $('#states-' + index).select2();

                if (country && data[country]) {
                    var states = Object.keys(data[country]);
                    states.forEach(state => {
                        var newOption = new Option(state, state, false, false);
                        $('#states-' + index).append(newOption).trigger('change');
                    });
                }

                $('#states-' + index).on('change', function() {
                    updatePostalCodes(index, country, data);
                });
            })('{{ $index }}', '{{ $country }}');
        @endforeach

        function updatePostalCodes(index, country, data) {
            var selectedStates = $('#states-' + index).val();
            var postalCodes = [];

            if (country && data[country]) {
                selectedStates.forEach(state => {
                    if (data[country][state]) {
                        postalCodes.push(data[country][state]);
                    }
                });
            }

            $('#postal-codes-' + index).val(postalCodes.join(', '));
        }
    });
</script>
@endsection
