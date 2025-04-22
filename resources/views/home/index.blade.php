@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Main Banner -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden mb-10">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center">
                <div class="p-10">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome to Our Online Store</h1>
                    <p class="text-gray-600 text-lg mb-6">
                        Discover the best products at the best prices, with fast and secure delivery to your doorstep.
                    </p>
                    <a href="{{ route('product.index') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition">Shop Now</a>
                </div>
                <div class="hidden md:block">
                    <img src="https://source.unsplash.com/600x400/?shopping,store" alt="store" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Store Features -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center mb-16">
            <div class="bg-white p-8 rounded-xl shadow hover:shadow-md transition">
                <div class="text-blue-500 text-4xl mb-4">
                    🛒
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Diverse Products</h3>
                <p class="text-gray-600">We offer a wide range of high-quality products at affordable prices for everyone.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow hover:shadow-md transition">
                <div class="text-green-500 text-4xl mb-4">
                    🚚
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Fast Delivery</h3>
                <p class="text-gray-600">We cover most regions with fast and secure delivery within just a few days.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow hover:shadow-md transition">
                <div class="text-yellow-500 text-4xl mb-4">
                    💳
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Multiple Payment Options</h3>
                <p class="text-gray-600">Choose what suits you: cash on delivery or secure online payment through our gateway.</p>
            </div>
        </div>

        <!-- Call to Register -->
        <div class="bg-blue-600 text-white text-center p-10 rounded-2xl">
            <h2 class="text-3xl font-bold mb-3">Join Now and Start Shopping Easily!</h2>
            <p class="text-lg mb-6">Register to get the best deals and easily track your orders.</p>
            <a href="{{ route('register') }}" class="inline-block bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg shadow hover:bg-gray-100 transition">Register Now</a>
        </div>

    </div>
</div>
@endsection