@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="bg-white min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-6">
        
        <!-- Title -->
        <div class="text-center mb-12">
            <h1 class="text-4xl f text-gray-800 ">{{ $viewData["title"] }}</h1>
            <p class="text-gray-600 text-lg">{{ $viewData["subtitle"] }}</p>
        </div>

        <!-- About the Project -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center mb-16">
            <div>
                <h2 class="text-2xl font-semibold text-blue-700 mb-4">Who Are We?</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    {{ $viewData["description"] }}
                </p>
            </div>
            <div>
           
            <img src="https://cdn.prod.website-files.com/62196607bf1b46c300301846/6568ada0ea9d4603d85a24df_ojszptselv3sfysmejml.webp" alt="About us" class="w-full h-auto rounded-xl shadow-lg">
            </div>
        </div>

        <!-- Developer / Team Information -->
        <div class="bg-gray-100 rounded-xl p-10 shadow-md mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Developer / Team</h2>
            <p class="text-gray-700 text-lg">
                {{ $viewData["author"] }}
            </p>
        </div>

        <!-- Project Features -->
        <div class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">What Makes Our Project Unique?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <div class="text-4xl mb-3 text-blue-500">⚡</div>
                    <h3 class="font-semibold text-xl mb-2">Fast and Easy Interface</h3>
                    <p class="text-gray-600">Easy navigation and a simplified user experience.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <div class="text-4xl mb-3 text-green-500">🔒</div>
                    <h3 class="font-semibold text-xl mb-2">Security and Privacy</h3>
                    <p class="text-gray-600">We respect your privacy and provide a secure and reliable payment system.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <div class="text-4xl mb-3 text-purple-500">🌍</div>
                    <h3 class="font-semibold text-xl mb-2">Comprehensive Support</h3>
                    <p class="text-gray-600">Customer service and order tracking from purchase to delivery.</p>
                </div>
            </div>
        </div>

        <!-- Call to Contact -->
        <div class="text-center mt-16">
            <h2 class="text-2xl font-semibold text-gray-800 mb-3">Do You Have Any Questions?</h2>
            <p class="text-gray-600 mb-4">We are here to assist you anytime.</p>
          
        </div>
    </div>
</div>
@endsection