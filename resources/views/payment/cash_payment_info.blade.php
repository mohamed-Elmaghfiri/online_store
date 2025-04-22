@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-6">Delivery Information - Cash on Delivery</h2>
    <form action="{{ route('payments.processOnline') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name:</label>
            <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number:</label>
            <input type="text" name="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address:</label>
            <textarea name="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Confirm Order</button>
    </form>
</div>
@endsection