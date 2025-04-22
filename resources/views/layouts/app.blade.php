<!doctype html>
<html lang="en">
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

      <!-- زر القائمة للهاتف -->
      <button class="block lg:hidden text-white focus:outline-none" id="menu-toggle">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>

      <!-- القائمة -->
      <div class="hidden lg:flex space-x-4" id="navbarNavAltMarkup">
        <a class="text-white hover:text-gray-300" href="{{ route('home.index') }}">Home</a>
        <a class="text-white hover:text-gray-300" href="{{ route('product.index') }}">Products</a>
        <a class="text-white hover:text-gray-300" href="{{ route('cart.index') }}">Cart</a>

        <a class="text-white hover:text-gray-300" href="{{ route('home.about') }}">About</a>

        @guest
          <a class="text-white hover:text-gray-300" href="{{ route('login') }}">Login</a>
          <a class="text-white hover:text-gray-300" href="{{ route('register') }}">Register</a>
        @else
          <a class="text-white hover:text-gray-300" href="{{ route('orders.index') }}">My Orders</a>
          <form id="logout" action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <a role="button" class="text-white hover:text-gray-300"
               onclick="document.getElementById('logout').submit();">Logout</a>
          </form>
        @endguest
      </div>
    </div>
  </nav>
  <!-- End Header -->

  <header class="text-gray-800 text-left py-8">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold">@yield('subtitle', 'A Laravel Online Store')</h2>
    </div>
  </header>

  <!-- المحتوى الرئيسي -->
  <div class="container min-h-screen mx-auto my-8">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
      <small>
        Copyright - <a class="text-blue-400 hover:underline" target="_blank"
          href="https://twitter.com/danielgarax">
          Daniel Correa
        </a> - <b>Paola Vallejo</b>
      </small>
    </div>
  </footer>

  <!-- جافاسكربت لتبديل القائمة -->
  <script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
      const menu = document.getElementById('navbarNavAltMarkup');
      menu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
