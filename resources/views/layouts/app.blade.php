<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
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

      <!-- Navbar links -->
   

    
     

      

          <div class="hidden lg:flex items-center space-x-6" id="navbarNavAltMarkup">
        <a class="text-white hover:text-primary-200 transition-colors font-medium" href="{{ route('home.index') }}">{{ __('messages.home') ?? 'Home' }}</a>
        <a class="text-white hover:text-primary-200 transition-colors font-medium" href="{{ route('product.index') }}">{{ __('messages.products') ?? 'Products' }}</a>
        <a class="text-white hover:text-primary-200 transition-colors font-medium relative group" href="{{ route('cart.index') }}">
          <div class="flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span>{{ __('messages.cart') ?? 'Cart' }}</span>
            <!-- Cart Count Badge - You would populate this with actual cart count -->
            
          </div>
        </a>
        <a class="text-white hover:text-primary-200 transition-colors font-medium" href="{{ route('home.about') }}">{{ __('messages.about') ?? 'About' }}</a>

        @guest
          <a class="text-white hover:text-primary-200 transition-colors font-medium" href="{{ route('login') }}">{{ __('messages.login') ?? 'Login' }}</a>
          <a class="bg-yellow-400 hover:bg-yellow-300 text-primary-800 px-4 py-2 rounded-md transition-colors font-medium" href="{{ route('register') }}">{{ __('messages.register') ?? 'Register' }}</a>
        @else
          <a class="text-white hover:text-primary-200 transition-colors font-medium" href="{{ route('orders.index') }}">{{ __('messages.my_orders') ?? 'My Orders' }}</a>
          <form id="logout" action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-white hover:text-primary-200 transition-colors font-medium">{{ __('messages.logout') ?? 'Logout' }}</button>
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
        
        <!-- About Us -->
        <div>
          <h4 class="text-lg font-bold mb-4">{{ __('messages.about_us') }}</h4>
          <p class="text-gray-400 text-sm">
            {{ __('messages.about_us_description') }}
          </p>
        </div>
  
        <!-- Quick Links -->
        <div>
          <h4 class="text-lg font-bold mb-4">{{ __('messages.quick_links') }}</h4>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-gray-400 hover:text-white">{{ __('messages.home') }}</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">{{ __('messages.products') }}</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">{{ __('messages.about_us') }}</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">{{ __('messages.contact') }}</a></li>
          </ul>
        </div>
  
        <!-- Customer Service -->
        <div>
          <h4 class="text-lg font-bold mb-4">{{ __('messages.customer_service') }}</h4>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-gray-400 hover:text-white">{{ __('messages.faq') }}</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">{{ __('messages.shipping_policy') }}</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">{{ __('messages.returns_refunds') }}</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">{{ __('messages.privacy_policy') }}</a></li>
          </ul>
        </div>
  
        <!-- Contact Us -->
        <div>
          <h4 class="text-lg font-bold mb-4">{{ __('messages.contact_us') }}</h4>
          <ul class="space-y-2 text-sm text-gray-400">
            <li class="flex items-start gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <span>{{ __('messages.address_detail') }}</span>
            </li>
            <li class="flex items-start gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              <span>{{ __('messages.support_email') }}</span>
            </li>
            <li class="flex items-start gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
              <span>{{ __('messages.phone_number') }}</span>
            </li>
          </ul>
        </div>
      </div>
  
      <!-- Copyright -->
      <div class="border-t border-gray-700 pt-6 text-center">
        <small class="text-gray-400">
          {{ __('messages.copyright') }} © {{ date('Y') }} - 
          <a class="text-primary-300 hover:underline" target="_blank" href="https://twitter.com/danielgarax">
            Daniel Correa
          </a> - <b>Paola Vallejo</b>
        </small>
      </div>
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

