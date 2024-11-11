@extends('layout.home-layout')

@section('content')
<div class="w-full min-h-screen">
    <div class="grid md:grid-cols-2 grid-cols-1 gap-0">
        <!-- Medical Jobs Section -->
        <div class="relative h-[750px] md:h-screen">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 bg-black/80">
                <img
                    src="/images/medical.bg.jpg"
                    alt="Medical Professionals"
                    class="w-full h-full object-cover mix-blend-overlay"
                >
            </div>

            <!-- Content -->
            <div class="relative z-10 p-8 md:p-12 flex flex-col h-full justify-center">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    <span class="block">Gesundheit</span>
                    <span class="text-blue-400">Medical</span>
                    <span class="block">Jobs</span>
                </h2>

                <p class="text-white text-lg mb-6 max-w-lg">
                    Looking to take the next step in your medical career or find the perfect candidate for your healthcare team?
                </p>

                <p class="text-white mb-8">
                    You've come to the right place!
                </p>

                <ul class="text-white space-y-3 mb-8">
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        <span>Connect with top medical job opportunities across Europe</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        <span>Find roles that match your skills and aspirations</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        <span>Post job listings and request workers tailored to your needs</span>
                    </li>
                </ul>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('form.step') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-md transition duration-300">
                        Find Nursing Jobs
                    </a>
                    <a href="{{ route('form.page') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-md transition duration-300">
                        Employer
                    </a>
                    <a href="{{ route('other.store') }}" class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-md transition duration-300">
                        Other Medical Jobs
                    </a>
                </div>
            </div>
        </div>

        <!-- Other Professions Section -->
        <div class="relative h-[700px] md:h-screen">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 bg-black/80">
                <img
                    src="/images/other-jobs.jpg"
                    alt="Business Professionals"
                    class="w-full h-full object-cover mix-blend-overlay"
                >
            </div>

            <!-- Content -->
            <div class="relative z-10 p-8 md:p-12 flex flex-col h-full justify-center">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    <span class="block">Other</span>
                    <span class="text-blue-400">Professions</span>
                </h2>

                <p class="text-white text-lg mb-8 max-w-lg">
                    Explore a variety of professional opportunities across different fields and industries. Find your next career move or the perfect candidate for your organization here.
                </p>

                <ul class="text-white space-y-3 mb-8">
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        <span>Connect with diverse job opportunities</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        <span>Match your skills with the right roles</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        <span>Post job listings and find tailored candidates</span>
                    </li>
                </ul>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('other-proffessions.employee') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-md transition duration-300">
                        Find Job
                    </a>
                    <a href="{{ route('other-proffessions.employer') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-md transition duration-300">
                        Employer
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Industries Section -->
<section class="py-16 px-4 md:px-12 bg-gray-50" data-aos="fade-up">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl font-bold text-center mb-12">Explore Job Categories</h2>

        <div class="grid md:grid-cols-2 gap-6 max-w-6xl mx-auto">
            <!-- Healthcare Card -->
            <div class="bg-white rounded-lg shadow-md p-8 transform transition duration-300 hover:shadow-xl hover:-translate-y-1" data-aos="fade-right">
                <h3 class="text-2xl font-semibold mb-3">Healthcare Jobs</h3>
                <p class="text-gray-600">Doctors, Nurses, Healthcare Technicians</p>
            </div>

            <!-- IT Card -->
            <div class="bg-white rounded-lg shadow-md p-8 transform transition duration-300 hover:shadow-xl hover:-translate-y-1" data-aos="fade-left">
                <h3 class="text-2xl font-semibold mb-3">IT and Engineering</h3>
                <p class="text-gray-600">Developers, Engineers, Technicians</p>
            </div>

            <!-- Logistics Card -->
            <div class="bg-white rounded-lg shadow-md p-8 transform transition duration-300 hover:shadow-xl hover:-translate-y-1" data-aos="fade-right">
                <h3 class="text-2xl font-semibold mb-3">Logistics and Industrial</h3>
                <p class="text-gray-600">Warehouse, Transport, Production Workers</p>
            </div>

            <!-- Hospitality Card -->
            <div class="bg-white rounded-lg shadow-md p-8 transform transition duration-300 hover:shadow-xl hover:-translate-y-1" data-aos="fade-left">
                <h3 class="text-2xl font-semibold mb-3">Hospitality and Services</h3>
                <p class="text-gray-600">Chefs, Gardeners, Cleaning Staff</p>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="py-8 sm:py-12 md:py-16 px-4 sm:px-6 md:px-12 bg-white opacity-100">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-8 md:mb-12"
            data-aos="fade-down"
            data-aos-offset="0">
            Trusted by Top Companies
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-6 md:gap-8 max-w-6xl mx-auto">
            <!-- Partner 1 -->
            <div class="flex items-center justify-center p-3 sm:p-4 hover:shadow-lg rounded-lg transition-all duration-300"
                 data-aos="fade-right"
                 data-aos-offset="0"
                 data-aos-delay="50"
                 data-aos-once="true">
                <img
                    src="images/partner1.svg"
                    alt="Partner 1"
                    loading="lazy"
                    class="h-10 sm:h-12 md:h-16 w-auto object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:-translate-y-1"
                >
            </div>

            <!-- Partner 2 -->
            <div class="flex items-center justify-center p-3 sm:p-4 hover:shadow-lg rounded-lg transition-all duration-300"
                 data-aos="fade-left"
                 data-aos-offset="0"
                 data-aos-delay="100"
                 data-aos-once="true">
                <img
                    src="images/partner2.svg"
                    alt="Partner 2"
                    loading="lazy"
                    class="h-10 sm:h-12 md:h-16 w-auto object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:-translate-y-1"
                >
            </div>

            <!-- Partner 3 -->
            <div class="flex items-center justify-center p-3 sm:p-4 hover:shadow-lg rounded-lg transition-all duration-300"
                 data-aos="fade-right"
                 data-aos-offset="0"
                 data-aos-delay="150"
                 data-aos-once="true">
                <img
                    src="images/partner3.svg"
                    alt="Partner 3"
                    loading="lazy"
                    class="h-10 sm:h-12 md:h-16 w-auto object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:-translate-y-1"
                >
            </div>

            <!-- Partner 4 -->
            <div class="flex items-center justify-center p-3 sm:p-4 hover:shadow-lg rounded-lg transition-all duration-300"
                 data-aos="fade-left"
                 data-aos-offset="0"
                 data-aos-delay="200"
                 data-aos-once="true">
                <img
                    src="images/partner4.svg"
                    alt="Partner 4"
                    loading="lazy"
                    class="h-10 sm:h-12 md:h-16 w-auto object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:-translate-y-1"
                >
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-8 px-4">
    <div class="max-w-7xl mx-auto flex flex-col items-center">
        <div class="flex space-x-6 mb-4">
            <a href="#" class="text-2xl hover:text-blue-400 transition duration-300">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="#" class="text-2xl hover:text-blue-400 transition duration-300">
                <i class="fab fa-facebook"></i>
            </a>
        </div>
        <p class="text-center text-gray-400">
            &copy; 2024 Gesundheit Personal Netz. All Rights Reserved.
        </p>
    </div>
</footer>
@endsection
