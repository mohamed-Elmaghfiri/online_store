<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Admin - Online Store')</title>
</head>

<body class="bg-gray-100">
  <div class="flex">
    <!-- sidebar -->
    <div class="w-64 bg-gray-800 text-white min-h-screen p-4">
      <a href="{{ route('admin.home.index') }}" class="text-white text-xl font-bold block mb-4">
        Admin Panel
      </a>
      <hr class="border-gray-600 mb-4" />
      <ul class="space-y-2">
        <li><a href="{{ route('admin.home.index') }}" class="block text-gray-300 hover:text-white">- Admin - Home</a></li>
        <li><a href="{{ route('admin.product.index') }}" class="block text-gray-300 hover:text-white">- Admin - Products</a></li>
        <li><a href="{{ route('admin.categorie.index') }}" class="block text-gray-300 hover:text-white">- Admin - Categories</a></li>
        <li><a href="{{ url('admin/fournisseurs') }}" class="block text-gray-300 hover:text-white">- Admin - Fournisseurs</a></li>
        <li><a href="{{ url('admin/statistics') }}" class="block text-gray-300 hover:text-white">- Admin - Statistics</a></li>
        <li><a href="{{ url('admin/orders') }}" class="block text-gray-300 hover:text-white">- Admin - Orders</a></li>
        <li><a href="{{ url('admin/discounts/create') }}" class="block text-gray-300 hover:text-white">- Admin - Discounts</a></li>
        <li>
          <a href="{{ route('home.index') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Go back to the home page
          </a>
        </li>
      </ul>
    </div>
    <!-- sidebar -->

    <div class="flex-1">
      <nav class="bg-white shadow p-4 flex justify-end items-center">
        <span class="text-gray-700 font-medium mr-4">Admin</span>
        <img class="w-10 h-10 rounded-full" src="{{ asset('/img/undraw_profile.svg') }}" alt="Profile">
      </nav>

      <div class="p-6">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- footer -->
  <footer class="bg-gray-800 text-white py-4 text-center">
    <div class="container mx-auto">
      <small>
        Copyright - <a class="text-blue-400 hover:underline" target="_blank"
          href="https://twitter.com/danielgarax">
          Daniel Correa
        </a> - <b>Paola Vallejo</b>
      </small>
    </div>
  </footer>
  <!-- footer -->
</body>

</html>