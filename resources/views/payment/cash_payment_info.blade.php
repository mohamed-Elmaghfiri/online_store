@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-12">
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">{{ __('messages.delivery_information') }}</h2>

        <form action="{{ route('cart.purchase') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.name') }} </label>
                <input type="text" name="name" id="name"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.phone') }}</label>
                <input type="text" name="phone" id="phone"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.address') }} : </label>
                <textarea name="address" id="address" rows="4"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          required></textarea>
            </div>

            <div class="text-center">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
                    {{ __('messages.confirm_order') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
