<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'primary': {
              50: '#f0fdf4',
              100: '#dcfce7',
              200: '#bbf7d0',
              300: '#86efac',
              400: '#4ade80',
              500: '#22c55e',
              600: '#16a34a',
              700: '#15803d',
              800: '#166534',
              900: '#14532d',
              950: '#052e16',
            },
          }
        }
      }
    }
  </script>
  <title>@yield('title', 'Online Store') - Best Deals Online</title>
  <meta name="description" content="Shop the best products at unbeatable prices. Free shipping on orders over $50!">
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">


  <!-- Header -->
  <nav class="bg-primary-700 text-white py-4 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 flex justify-between items-center">
      <a class="text-2xl font-bold hover:text-primary-200 transition-colors flex items-center gap-2" href="{{ route('home.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <span>Online Store</span>
      </a>



          <div class="hidden lg:flex items-center space-x-6" id="navbarNavAltMarkup">
        <a class="text-white hover:text-primary-200 transition-colors font-medium" href="{{ route('home.index') }}">Home</a>
        <a class="text-white hover:text-primary-200 transition-colors font-medium" href="{{ route('product.index') }}">Products</a>
        <a class="text-white hover:text-primary-200 transition-colors font-medium relative group" href="{{ route('cart.index') }}">
          <div class="flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span>Cart</span>
            <!-- Cart Count Badge - You would populate this with actual cart count -->
            
          </div>
        </a>
        <a class="text-white hover:text-primary-200 transition-colors font-medium" href="{{ route('home.about') }}">About</a>

        @guest
          <a class="text-white hover:text-primary-200 transition-colors font-medium" href="{{ route('login') }}">Login</a>
          <a class="bg-yellow-400 hover:bg-yellow-300 text-primary-800 px-4 py-2 rounded-md transition-colors font-medium" href="{{ route('register') }}">Register</a>
        @else
          <a class="text-white hover:text-primary-200 transition-colors font-medium" href="{{ route('orders.index') }}">My Orders</a>
          <form id="logout" action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-white hover:text-primary-200 transition-colors font-medium">Logout</button>
          </form>
        @endguest
      </div>
    </div>
    
   
  </nav>


  <!-- Main content -->
  <div class="container mx-auto px-4 py-8 flex-grow">
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
      <p>{{ session('success') }}</p>
    </div>
    @endif
    
    @if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
      <p>{{ session('error') }}</p>
    </div>
    @endif
    
    @yield('content')
  </div>

 
  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-10">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
        <div>
          <h4 class="text-lg font-bold mb-4">About Us</h4>
          <p class="text-gray-400 text-sm">We offer the best products at competitive prices. Shop with confidence with our 30-day money-back guarantee.</p>
        </div>
        
        <div>
          <h4 class="text-lg font-bold mb-4">Quick Links</h4>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Products</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="text-lg font-bold mb-4">Customer Service</h4>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Shipping Policy</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Returns & Refunds</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="text-lg font-bold mb-4">Contact Us</h4>
          <ul class="space-y-2 text-sm text-gray-400">
            <li class="flex items-start gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <span>123 Commerce St, City, Country</span>
            </li>
            <li class="flex items-start gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              <span>support@onlinestore.com</span>
            </li>
            <li class="flex items-start gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
              <span>+1 234 567 890</span>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="border-t border-gray-700 pt-6 text-center">
        <small class="text-gray-400">
          Copyright © {{ date('Y') }} - <a class="text-primary-300 hover:underline" target="_blank"
            href="https://twitter.com/danielgarax">
            Daniel Correa
          </a> - <b>Paola Vallejo</b>
        </small>
      </div>
    </div>
  </footer>

  <!-- JavaScript for toggle menu -->
  <script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
      const menu = document.getElementById('navbarNavAltMarkup');
      const mobileMenu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
      mobileMenu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
