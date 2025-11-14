<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ogani Template">
  <meta name="keywords" content="Ogani, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')Home</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css')}}" type="text/css" -->
  <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css')}}" type="text/css" -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" type="text/css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3 sticky-top">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand fw-bold text-primary" href="/">
        <img src="{{ asset('storage/' . $seeting_option->site_logo) }}" alt="{{ asset('storage/' . $seeting_option->site_logo) }}" height="50" class="me-2">
      </a>

      <!-- Toggle Button (Mobile) -->
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fa fa-bars text-primary"></i>
      </button>

      <!-- Navbar Content -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Center Search Bar with Category -->
        <form class="d-flex mx-auto border rounded-pill overflow-hidden shadow-sm"
          style="max-width: 700px; min-width: 700px; height: 48px;">
          <input class="form-control border-0 px-3" type="search" placeholder="Search for products..."
            aria-label="Search">
          <button class="btn btn-primary px-4 rounded-end" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </form>

        <!-- Right Side Nav Messages order card etc Items -->
        <ul class="navbar-nav ms-auto align-items-center gap-2">
          <li class="nav-item">
            <a class="nav-link text-dark d-flex flex-column align-items-center hover-effect" href="#">
              <i class="fa fa-comments fa-lg mb-1"></i>
              <small>Messages</small>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-dark d-flex flex-column align-items-center hover-effect" href="#">
              <i class="fa fa-first-order fa-lg mb-1"></i>
              <small>Orders</small>
            </a>
          </li>

          <li class="nav-item position-relative">
            <a class="nav-link text-dark d-flex flex-column align-items-center hover-effect" href="{{ url('cart',$products->product_id) }}">
              <i class="fa fa-shopping-cart fa-lg mb-1"></i>
              <small>Cart</small>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger shadow-sm">
                3
              </span>
            </a>
          </li>
        
         
          <!-- User Dropdown -->
          @if(Auth::check())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-dark d-flex flex-column align-items-center hover-effect" href="#"
                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user fa-lg mb-1"></i>
                <small>{{ Auth::user()->fullname }}</small>
              </a>

              <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="{{ route('register.save',Auth::id()) }}">My Profile</a></li>
                <li><a class="dropdown-item" href="#">My Orders</a></li>

                {{-- Logout Form (POST for security) --}}
                <li>
                  <a class="dropdown-item text-danger" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                </li>

                <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
                  @csrf
                </form>
              </ul>
            </li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-dark d-flex flex-column align-items-center hover-effect" href="#"
                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user fa-lg mb-1"></i>
                <small>Account</small>
              </a>

              <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item text-primary" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                  </a>
                </li>
                <li><a class="dropdown-item" href="{{ route('form.show') }}">Register</a></li>
              </ul>
            </li>
          @endif
          <!-----end ul tag---------->
          @if(session('success'))
         <div class="alert alert-danger" role="alert">
           {{ session('success') }}
        </div>
          @endif

         @if(session('error'))
         <div class="alert alert-danger" role="alert">
           {{ session('error') }}
        </div>
        @endif
        </ul>
      </div>
    </div>
  </nav>

  <!-- navabar items -->

  <!-- ===================== CATEGORY NAVBAR ===================== -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary align-items-center shadow-sm">
  <div class="container">

    <!-- 🔹 Mobile Toggle Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#categoryNavbar"
      aria-controls="categoryNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- 🔹 Collapsible Content -->
    <div class="collapse navbar-collapse" id="categoryNavbar">

      <!-- Left Section -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center">

        <!-- 🏠 Home Link Added -->
        <li class="nav-item me-lg-3 mb-2 mb-lg-0">
          <a class="nav-link text-white fw-semibold hover-link px-3 py-1" href="{{ route('home') }}">
            <i class="fa fa-home me-2"></i> Home
          </a>
        </li>

        <!-- All Brands Dropdown -->
        <li class="nav-item dropdown me-lg-3 mb-2 mb-lg-0">
          <a class="nav-link dropdown-toggle px-3 py-1" href="#" id="allCategoriesDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bars me-2"></i> All Brands
          </a>
          <ul class="dropdown-menu" aria-labelledby="allCategoriesDropdown">
            @foreach ($brand as $brands)
              <li>
                <a class="dropdown-item" href="{{ route('brand.show',$brands->brand_id) }}">
                  {{ $brands->brand_name }}
                </a>
              </li>
            @endforeach
          </ul>
        </li>
      </ul>

      <!-- Right Section -->
      <ul class="nav navbar-nav ms-auto align-items-center mb-2 mb-lg-0 py-2 shadow-sm">

        <!-- All Categories Button -->
        <li class="nav-item mx-1">
          <a class="nav-link text-white px-3 hover-link" href="#">
            <i class="fa fa-tags me-1"></i> All Categories
          </a>
        </li>

        <!-- Dynamic Categories -->
        @foreach ($category as $cat)
          <li class="nav-item mx-1">
            <a class="nav-link text-white fw-semibold hover-link" href="{{ route('category.show',$cat->cat_id) }}">
              {{ $cat->cat_title }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>

 <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-light">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="exampleModalLabel">LOGIN HERE</h4>
          <button type="bg-dark" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
       
        <!-- Form -->
        <form class="signup_form" method="POST" action="{{ route('login.user') }}" autocomplete="off">
          @csrf

          <div class="form-group p-1">
            <label>Email</label>
            <input type="text" name="email" class="form-control first_name" placeholder="Full Name" requried />
          </div>
          <div class="form-group p-1">
            <label>Password</label>
            <input type="password" name="password" class="form-control city" placeholder="username" requried>
          </div>
          <input type="submit" name="lOGIN" class="btn m-1" value="Login" />
        </form>
        <!-- /Form -->
          <p> Don't Have an Account <a href="{{ route('form.show')}}" class="text-danger text-decoration-none"> Register</p></a>
        </div>
    </div>
  </div>
  <!-- End Modal -->


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>