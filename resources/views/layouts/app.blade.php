<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM8d7xj1z5l5c5e5e5e5e5e5e5e5e5e5e5e5" crossorigin="anonymous" />
  <title>@yield('title', 'Online Store')</title>
</head>
<body class="bg-gray-100 text-gray-800">
  <!-- header -->
  <nav class="bg-gray-800 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
      <a class="text-2xl font-bold" href="{{ route('home.index') }}">Online Store</a>
      <button class="block lg:hidden text-white focus:outline-none" id="menu-toggle">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
          <a class="nav-link active" href="{{ route('product.index') }}">Products</a>
          <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
          <a class="nav-link active" href="{{ route('orders.index') }}">Orders</a>
          <a class="nav-link active" href="{{ route('home.about') }}">About</a>
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active" href="{{ route('login') }}">Login</a>
          <a class="nav-link active" href="{{ route('register') }}">Register</a>
          @else
          <a class="nav-link active" href="{{ route('myaccount.orders') }}">My Orders</a>
          <form id="logout" action="{{ route('logout') }}" method="POST">
            <a role="button" class="nav-link active"
               onclick="document.getElementById('logout').submit();">Logout</a>
            @csrf
          </form>
          @endguest
        </div>
      </div>
    </div>
  </nav>

  <header class="text-gray-800 text-left py-8">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold">@yield('subtitle', 'A Laravel Online Store')</h2>
    </div>
  </header>
  <!-- header -->

  <div class="container min-h-screen mx-auto my-8">
    @yield('content')
  </div>

  <!-- footer -->
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
  <!-- footer -->

  <script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
      const menu = document.getElementById('menu');
      menu.classList.toggle('hidden');
    });
  </script>
</body>
</html>