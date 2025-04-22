@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-12">
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Delivery Information - Cash on Delivery</h2>

        <form action="{{ route('cart.purchase') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name </label>
                <input type="text" name="name" id="name"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Number Phone</label>
                <input type="text" name="phone" id="phone"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address : </label>
                <textarea name="address" id="address" rows="4"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          required></textarea>
            </div>

            <div class="text-center">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Confirm Order
                </button>
            </div>
            <input type="hidden" name="method" value="Cash on Delivery">
        </form>
    </div>
</div>
@endsection
