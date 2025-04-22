@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center bg-gray-100 px-4 py-12 min-h-screen">
  <div class="bg-white w-full max-w-md p-8 rounded-xl shadow-lg border border-gray-200">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Reset Your Password</h2>

    @if (session('status'))
      <div class="bg-green-100 text-green-700 text-sm p-3 rounded-md mb-4 text-center">
        {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
      @csrf

      {{-- Email --}}
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
          class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
        @error('email')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Submit Button --}}
      <div>
        <button type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md transition">
          Send Password Reset Link
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
