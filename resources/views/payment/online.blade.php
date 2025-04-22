
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-12">
    <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-10 border border-gray-200">
        <h2 class="text-4xl font-extrabold text-center text-blue-700 mb-10">Secure Online Payment</h2>

        <form action="{{ route('cart.purchase') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Full Name -->
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" name="full_name" id="full_name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                    required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                    required>
            </div>

            <!-- Card Number -->
            <div>
                <label for="card_number" class="block text-sm font-medium text-gray-700 mb-1">Card Number</label>
                <input type="text" name="card_number" id="card_number"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                    placeholder="1234 5678 9012 3456" required>
            </div>

            <!-- Expiry Date and CVV -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="expiry_date" class="block text-sm font-medium text-gray-700 mb-1">Expiry Date</label>
                    <input type="text" name="expiry_date" id="expiry_date"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                        placeholder="MM / YY" required>
                </div>

                <div>
                    <label for="cvv" class="block text-sm font-medium text-gray-700 mb-1">CVV</label>
                    <input type="text" name="cvv" id="cvv"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                        placeholder="123" required>
                </div>
            </div>
            
            <!-- Payment Button -->
            <div class="text-center mt-6">
                <button type="submit"
                    class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300">
                    Complete Payment Now
                </button>
            </div>
            <input type="hidden" name="method" value="online">

            <!-- Alternative Payment Option -->
            <div class="text-center text-sm mt-4">
                <p class="text-gray-600">Or pay using</p>
                <button type="button"
                        class="mt-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold py-2 px-4 rounded-full transition duration-300">
                    PayPal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection