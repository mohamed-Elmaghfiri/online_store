@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
  <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-xl">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">{{ __('messages.login') }}</h2>
=======
<div class="flex items-center justify-center bg-gray-100 px-4 py-10">
  <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>
>>>>>>> 1ff4348c8ffd4b3c013cb458ff5fc4c694310577

    <form method="POST" action="{{ route('login') }}">
      @csrf

      {{-- Email --}}
<<<<<<< HEAD
      <div class="mb-6">
        <label for="email" class="block text-lg font-medium text-gray-700 mb-2">{{ __('messages.email') }}</label>
=======
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
>>>>>>> 1ff4348c8ffd4b3c013cb458ff5fc4c694310577
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
          class="w-full px-3 py-2 text-sm border rounded-md focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
        @error('email')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Password --}}
<<<<<<< HEAD
      <div class="mb-6">
        <label for="password" class="block text-lg font-medium text-gray-700 mb-2">{{ __('messages.password') }}</label>
=======
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
>>>>>>> 1ff4348c8ffd4b3c013cb458ff5fc4c694310577
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
<<<<<<< HEAD
        <label for="remember" class="text-lg text-gray-700">{{ __('messages.remember_me') }}</label>
=======
        <label for="remember" class="text-sm text-gray-700">Remember Me</label>
>>>>>>> 1ff4348c8ffd4b3c013cb458ff5fc4c694310577
      </div>

      {{-- Submit & Forgot --}}
      <div class="flex flex-col gap-3">
        <button type="submit"
<<<<<<< HEAD
          class="w-full bg-blue-600 hover:bg-blue-700 text-white text-xl font-semibold py-3 rounded-lg transition">
          {{ __('messages.login') }}
        </button>

        @if (Route::has('password.request'))
        <a class="text-center text-base text-blue-600 hover:underline" href="{{ route('password.request') }}">
          {{ __('messages.forgot_password') }}
=======
          class="w-full bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 rounded-md transition">
          Login
        </button>

        @if (Route::has('password.request'))
        <a class="text-center text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
          Forgot Your Password?
>>>>>>> 1ff4348c8ffd4b3c013cb458ff5fc4c694310577
        </a>
        @endif
      </div>
    </form>
  </div>
</div>
@endsection
