<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <!-- رابط ملف CSS الخاص بك إن وجد -->
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />

  <!-- رابط Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <title>@yield('title', 'Admin - Online Store')</title>
</head>

<body class="bg-light">

  <div class="d-flex">
    <!-- Sidebar -->
    <nav class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
      <a href="{{ route('admin.home.index') }}" class="text-white fs-4 fw-bold d-block mb-3 text-decoration-none">
        Admin Panel
      </a>
      <hr class="border-secondary" />
      <ul class="nav flex-column">
        <li class="nav-item">
          <a href="{{ route('admin.home.index') }}" class="nav-link text-white-50 hover-white">- Admin - Home</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.product.index') }}" class="nav-link text-white-50 hover-white">- Admin - Products</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.categorie.index') }}" class="nav-link text-white-50 hover-white">- Admin - Categories</a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/fournisseurs') }}" class="nav-link text-white-50 hover-white">- Admin - Fournisseurs</a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/statistics') }}" class="nav-link text-white-50 hover-white">- Admin - Statistics</a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/orders') }}" class="nav-link text-white-50 hover-white">- Admin - Orders</a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/discounts/create') }}" class="nav-link text-white-50 hover-white">- Admin - Discounts</a>
        </li>
        <li class="nav-item mt-4">
          <a href="{{ route('home.index') }}" class="btn btn-primary w-100">
            Go back to the home page
          </a>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar -->

    <!-- Main Content -->
    <div class="flex-fill">
      <!-- Navbar -->
      <nav class="navbar navbar-light bg-white shadow-sm px-4 d-flex justify-content-end align-items-center">
        <span class="text-muted me-3">Admin</span>
        <img src="{{ asset('/img/undraw_profile.svg') }}" alt="Profile" class="rounded-circle" width="40" height="40">
      </nav>

      <!-- Content Area -->
      <main class="p-4">
        @yield('content')
      </main>
    </div>
    <!-- End Main Content -->
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white py-3 text-center mt-auto">
    <div class="container">
      <small>
        &copy; <a class="text-info text-decoration-none" target="_blank" href="https://twitter.com/danielgarax">
          Daniel Correa
        </a> - <strong>Paola Vallejo</strong>
      </small>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
