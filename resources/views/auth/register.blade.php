@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create a New Account</h2>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      {{-- Name --}}
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
        <input id="name" type="text" name="name" required value="{{ old('name') }}"
          class="w-full px-4 py-2 border rounded-md @error('name') border-red-500 @enderror focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('name')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Email --}}
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
        <input id="email" type="email" name="email" required value="{{ old('email') }}"
          class="w-full px-4 py-2 border rounded-md @error('email') border-red-500 @enderror focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('email')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Password --}}
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input id="password" type="password" name="password" required
          class="w-full px-4 py-2 border rounded-md @error('password') border-red-500 @enderror focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('password')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Confirm Password --}}
      <div class="mb-6">
        <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
        <input id="password-confirm" type="password" name="password_confirmation" required
          class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      {{-- Register Button --}}
      <div class="text-center">
        <button type="submit"
          class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-md transition">
          Register
        </button>
      </div>
    </form>
  </div>
</div>
@endsection