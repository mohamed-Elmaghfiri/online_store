@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
  <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-xl">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">{{ __('messages.create_account') }}</h2>
=======
<div class="flex items-center justify-center bg-gray-100 px-4 py-10">
  <div class="bg-white p-6 rounded-xl shadow-md w-full max-w-3xl">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create Account</h2>
>>>>>>> 1ff4348c8ffd4b3c013cb458ff5fc4c694310577

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
      @csrf

<<<<<<< HEAD
      {{-- Full Name --}}
      <div class="mb-6">
        <label for="name" class="block text-lg font-medium text-gray-700 mb-2">{{ __('messages.full_name') }}</label>
        <input id="name" type="text" name="name" required value="{{ old('name') }}"
          class="w-full px-6 py-4 text-lg border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
        @error('name')
        <p class="text-base text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Email --}}
      <div class="mb-6">
        <label for="email" class="block text-lg font-medium text-gray-700 mb-2">{{ __('messages.email') }}</label>
        <input id="email" type="email" name="email" required value="{{ old('email') }}"
          class="w-full px-6 py-4 text-lg border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
        @error('email')
        <p class="text-base text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Password --}}
      <div class="mb-6">
        <label for="password" class="block text-lg font-medium text-gray-700 mb-2">{{ __('messages.password') }}</label>
        <input id="password" type="password" name="password" required
          class="w-full px-6 py-4 text-lg border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
        @error('password')
        <p class="text-base text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Confirm Password --}}
      <div class="mb-10">
        <label for="password-confirm" class="block text-lg font-medium text-gray-700 mb-2">{{ __('messages.confirm_password') }}</label>
        <input id="password-confirm" type="password" name="password_confirmation" required
          class="w-full px-6 py-4 text-lg border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
=======
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Full Name --}}
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
          <input id="name" type="text" name="name" required value="{{ old('name') }}"
            class="w-full px-3 py-2 text-sm border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
          @error('name')
          <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Email --}}
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input id="email" type="email" name="email" required value="{{ old('email') }}"
            class="w-full px-3 py-2 text-sm border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
          @error('email')
          <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Password --}}
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input id="password" type="password" name="password" required
            class="w-full px-3 py-2 text-sm border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror">
          @error('password')
          <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Confirm Password --}}
        <div>
          <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
          <input id="password-confirm" type="password" name="password_confirmation" required
            class="w-full px-3 py-2 text-sm border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
>>>>>>> 1ff4348c8ffd4b3c013cb458ff5fc4c694310577
      </div>

      {{-- Register Button --}}
      <div class="text-center">
        <button type="submit"
<<<<<<< HEAD
          class="w-full bg-green-600 hover:bg-green-700 text-white text-xl font-semibold py-3 rounded-lg transition">
          {{ __('messages.register') }}
=======
          class="w-full md:w-auto bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 px-6 rounded-md transition">
          Register
>>>>>>> 1ff4348c8ffd4b3c013cb458ff5fc4c694310577
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
