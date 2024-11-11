@extends('layout.admin')

@section('content')
<div class="container mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Example Dashboard Cards -->
            <div class="bg-blue-500 text-white rounded-lg p-4">
                <h3 class="text-lg font-semibold">Total Users</h3>
                <p class="text-2xl font-bold">{{ $totalUsers ?? '1,234' }}</p>
            </div>

            <div class="bg-green-500 text-white rounded-lg p-4">
                <h3 class="text-lg font-semibold">Revenue</h3>
                <p class="text-2xl font-bold">${{ $revenue ?? '45,678' }}</p>
            </div>

            <div class="bg-yellow-500 text-white rounded-lg p-4">
                <h3 class="text-lg font-semibold">Orders</h3>
                <p class="text-2xl font-bold">{{ $orders ?? '890' }}</p>
            </div>

            <div class="bg-purple-500 text-white rounded-lg p-4">
                <h3 class="text-lg font-semibold">Products</h3>
                <p class="text-2xl font-bold">{{ $products ?? '234' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
