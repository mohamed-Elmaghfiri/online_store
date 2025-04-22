@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center bg-gray-100 px-4 py-10">
  <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      {{-- Email --}}
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
          class="w-full px-3 py-2 text-sm border rounded-md focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
        @error('email')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Password --}}
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input id="password" type="password" name="password" required
          class="w-full px-3 py-2 text-sm border rounded-md focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
        @error('password')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Remember Me --}}
      <div class="mb-4 flex items-center gap-2">
        <input type="checkbox" name="remember" id="remember" class="h-4 w-4"
          {{ old('remember') ? 'checked' : '' }}>
        <label for="remember" class="text-sm text-gray-700">Remember Me</label>
      </div>

      {{-- Submit & Forgot --}}
      <div class="flex flex-col gap-3">
        <button type="submit"
          class="w-full bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 rounded-md transition">
          Login
        </button>

        @if (Route::has('password.request'))
        <a class="text-center text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
          Forgot Your Password?
        </a>
        @endif
      </div>
    </form>
  </div>
</div>
@endsection
