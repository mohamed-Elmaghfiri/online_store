<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>@yield('title', 'Online Store')</title>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <nav class="bg-gray-800 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
      <a class="text-2xl font-bold" href="{{ route('home.index') }}">Online Store</a>

      <!-- Mobile menu button -->
      <button class="block lg:hidden text-white focus:outline-none" id="menu-toggle">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>

      <!-- Navbar links -->
      <div class="hidden lg:flex space-x-4 items-center" id="navbarNavAltMarkup">
        <a class="text-white hover:text-gray-300" href="{{ route('home.index') }}">{{ __('messages.home') ?? 'Home' }}</a>
        <a class="text-white hover:text-gray-300" href="{{ route('product.index') }}">{{ __('messages.products') ?? 'Products' }}</a>
        <a class="text-white hover:text-gray-300" href="{{ route('cart.index') }}">{{ __('messages.cart') ?? 'Cart' }}</a>
        <a class="text-white hover:text-gray-300" href="{{ route('home.about') }}">{{ __('messages.about') ?? 'About' }}</a>

        @guest
          <a class="text-white hover:text-gray-300" href="{{ route('login') }}">{{ __('messages.login') ?? 'Login' }}</a>
          <a class="text-white hover:text-gray-300" href="{{ route('register') }}">{{ __('messages.register') ?? 'Register' }}</a>
        @else
          <a class="text-white hover:text-gray-300" href="{{ route('orders.index') }}">{{ __('messages.my_orders') ?? 'My Orders' }}</a>
          <form id="logout" action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <a role="button" class="text-white hover:text-gray-300"
               onclick="document.getElementById('logout').submit();">{{ __('messages.logout') ?? 'Logout' }}</a>
          </form>
        @endguest

        <!-- Language Dropdown -->
        <div class="relative inline-block text-left ml-4">
          <button id="lang-toggle" type="button"
            class="inline-flex justify-center w-full px-3 py-2 bg-gray-700 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none">
            🌐 {{ strtoupper(app()->getLocale()) }}
          </button>
        
          <div id="lang-menu" class="hidden absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
            <div class="py-1 text-gray-700">
              <a href="{{ route('lang.switch', 'en') }}" class="block px-4 py-2 hover:bg-gray-100">🇺🇸 English</a>
              <a href="{{ route('lang.switch', 'fr') }}" class="block px-4 py-2 hover:bg-gray-100">🇫🇷 Français</a>
              <a href="{{ route('lang.switch', 'ar') }}" class="block px-4 py-2 hover:bg-gray-100">AR العربية</a>
            </div>
          </div>
        </div>
        <!-- End Language Dropdown -->

      </div>
    </div>
  </nav>
  <!-- End Header -->

  <header class="text-gray-800 text-left py-8">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold">@yield('subtitle', 'A Laravel Online Store')</h2>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container min-h-screen mx-auto my-8">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
        <small>
            {{ __('messages.copyright', ['namedev' => 'TeamTawainaDev', 'developer' => 'TawainaDev']) }}
        </small>
    </div>
</footer>

  <!-- Mobile menu toggle script -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const langToggle = document.getElementById("lang-toggle");
      const langMenu = document.getElementById("lang-menu");
  
      langToggle.addEventListener("click", function () {
        langMenu.classList.toggle("hidden");
      });
  
      // Optional: close dropdown if you click outside
      document.addEventListener("click", function (event) {
        if (!langToggle.contains(event.target) && !langMenu.contains(event.target)) {
          langMenu.classList.add("hidden");
        }
      });
    });
  </script>

</body>
</html>
