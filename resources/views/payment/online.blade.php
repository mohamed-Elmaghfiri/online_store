@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-10">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-xl p-6 border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Online Payment</h2>

        <form action="{{ route('cart.purchase') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Full Name -->
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" name="full_name" id="full_name"
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Card Number -->
            <div>
                <label for="card_number" class="block text-sm font-medium text-gray-700 mb-1">Card Number</label>
                <input type="text" name="card_number" id="card_number"
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                    placeholder="1234 5678 9012 3456" required>
            </div>

            <!-- Expiry and CVV -->
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="expiry_date" class="block text-sm font-medium text-gray-700 mb-1">Expiry</label>
                    <input type="text" name="expiry_date" id="expiry_date"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="MM / YY" required>
                </div>
                <div>
                    <label for="cvv" class="block text-sm font-medium text-gray-700 mb-1">CVV</label>
                    <input type="text" name="cvv" id="cvv"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="123" required>
                </div>
            </div>

            <input type="hidden" name="method" value="online">

            <!-- Pay Button -->
            <div class="text-center mt-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 rounded-md transition">
                    Pay Now
                </button>
            </div>

            <!-- Alt Payment -->
            <div class="text-center text-xs mt-3">
                <p class="text-gray-500">Or pay using</p>
                <button type="button"
                    class="mt-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold py-1.5 px-4 rounded-full transition">
                    PayPal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
