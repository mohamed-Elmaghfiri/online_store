@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      {{-- Email --}}
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
        <input id="email" type="email" name="email" required autofocus value="{{ old('email') }}"
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

      {{-- Remember Me --}}
      <div class="mb-4 flex items-center">
        <input type="checkbox" name="remember" id="remember" class="mr-2"
          {{ old('remember') ? 'checked' : '' }}>
        <label for="remember" class="text-sm text-gray-700">Remember Me</label>
      </div>

      {{-- Login Button --}}
      <div class="flex justify-between items-center">
        <button type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition">
          Login
        </button>

        @if (Route::has('password.request'))
        <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
          Forgot Your Password?
        </a>
        @endif
      </div>
    </form>
  </div>
</div>
@endsection