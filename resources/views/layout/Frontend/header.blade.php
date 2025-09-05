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

    <!-- Header Section Begin -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light align-items-center shadow-sm">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="Logo" height="60">
            </a>

            <!-- Toggle for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search with Category (centered) -->
                <form class="d-flex flex-grow-1 border border-primary" style="width: 600px; height:50px;">
                    <input class="form-control border border-primary" type="search"
                        style="max-width: 900px; height:50px;" placeholder="Search products..." aria-label="Search">
                    <select class="form-select w-auto">
                        <option selected>All Category</option>
                        @foreach ($category as $cat)
                            <option value="{{ $cat->cat_id }}">{{{ $cat->cat_title }}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary rounded-left" type="submit">Search</button>
                </form>

                <!-- Right Side Nav Items -->
                <ul class="navbar-nav ml-5 mb-2 mb-lg-0 align-items-center">

                    <li class="nav-item text-center mx-2">
                        <a class="nav-link" href="#">
                            <i class="fa fa-comments fa-lg"></i>
                            <div class="large">Messages</div>
                        </a>
                    </li>

                    <li class="nav-item text-center mx-2">
                        <a class="nav-link" href="#">
                            <i class="fa fa-first-order" aria-hidden="true"></i>
                            <div class="large">Orders</div>
                        </a>
                    </li>

                    <li class="nav-item text-center mx-2">
                        <a class="nav-link position-relative" href="#">
                            <i class="fa fa-shopping-cart fa-lg"></i>
                            <div class="large">Cart</div>
                            <!-- Badge -->
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </a>
                    </li>


                    <li class="nav-item dropdown text-center mx-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i><br> Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('signup') }}">Register</a></li>
                                 <li><a class="dropdown-item" href="{{ route('login') }}">login</a></li>
                                 <li><a class="dropdown-item" href="{{ route('signup') }}">logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- navabar items -->

    <nav class="navbar navbar-expand-lg bg-white shadow-sm m-3">
        <div class="container">
            <!-- Left side -->
            <div class="d-flex align-items-center">
                <!-- All Categories Dropdown -->
                <div class="dropdown me-3">
                    <a class="dropdown-item" class="dropdown-toggle" id="allCategoriesDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bars me-2"></i> All Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="allCategoriesDropdown">
                        @foreach ($category as $cat)
                            <li><a class="dropdown-item" href="#">{{{ $cat->cat_title }}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Navbar Links -->
                <ul class="navbar-nav">
                   @foreach ($brand as $brands)
                                <li><a class="dropdown-item" href="#">{{ $brands->brand_name }}</a></li>
                    @endforeach
                      <a class="dropdown-item" href="#">Help<span class="arrow_carrot-down"></span></a></li>
                </ul>
            </div>

            <!-- Right side -->
            <div class="humberger__menu__widget">
                <div class="header__top__right__language">English ,USD
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="#">Spanis</a></li>
                        <li><a href="#">English</a></li>
                    </ul>
                </div>

                <div class="header__top__right__language">Ship to
                    <img src="{{ asset('assets/img/language.png') }}">
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="#">Spanis</a></li>
                        <li><a href="#">English</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- second nava bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm m-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#news">Home ></a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">clothing ></a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">main wears ></a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Suimmer clothings</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end second navabar -->

    <!-- navabar item end --->
    <!-- Bootstrap 5 JS & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Header Section End -->

    <!-- Hero Section Begin -->