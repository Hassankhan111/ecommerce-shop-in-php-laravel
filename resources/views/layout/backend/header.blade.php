<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('assets/css1/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/fontawesome-7.0.1/css/all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('assets/vendor/bootstrap-5.3.8.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('assets/css1/aos.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/css1/swiper-bundle-11.2.10.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendor/perfect-scrollbar/perfect-scrollbar-1.5.6.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('assets/css1/theme.css')}}" rel="stylesheet" media="all">


</head>

<body>



    <div class="page-wrapper">
        <!-- HEADER -->
        <header class="header-desktop bg-white shadow-sm p-2">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <!-- Mobile Toggle Button -->
                <button class="btn btn-outline-dark d-lg-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Search -->
                <form class="d-flex flex-grow-1 mx-3">
                    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-dark" type="submit"><i class="zmdi zmdi-search"></i></button>
                </form>

                <!-- Account -->
                <div class="dropdown">
                    <a class="btn btn-danger btn-link btn btn-danger dropdown-toggle" href="#" role="button"
                        id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <h7><i class="fa fa-user-circle"></i> {{ session()->get('name') }}</h7>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                        <li><a class="dropdown-item" href="{{ route('admin.password') }}"><i
                                    class="zmdi zmdi-settings"></i> Change Password</a></li>
                        <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('admin.signup') }}" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger" type="submit">
                                    <i class="zmdi zmdi-power"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- END HEADER -->

        <!-- SIDEBAR (Desktop) -->
        <aside class="menu-sidebar d-none d-lg-block bg-light border-end vh-100">
            <div class="logo p-3 text-center">
                <a href="#"><img src="{{ asset('assets/img/logo.svg') }}" alt="Logo" width="150"></a>
            </div>
            <div class="p-3">
                <ul class="list-unstyled sidebar-menu">
                    <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>

                    <li class="{{ Request::is('categorys') ? 'active' : '' }}">
                        <a href="{{ route('categorys.index') }}"><i class="fas fa-chart-bar me-2"></i> Category</a>
                    </li>

                    <li class="{{ Request::routeIs('product.index') ? 'active' : '' }}">
                        <a href="{{ route('product.index') }}"><i class="fas fa-table me-2"></i> Products</a>
                    </li>

                    <li class="{{ Request::is('brands.index') ? 'active' : '' }}">
                        <a href="{{route('brands.index')}}"><i class="far fa-check-square me-2"></i> Brands</a>
                    </li>

                    <li class="{{ Request::is('order.index') ? 'active' : '' }}">
                        <a href="{{route('order.index')}}"><i class="fas fa-table me-2"></i> Orders</a>
                    </li>

                    <li class="{{ Request::is('subcategorys') ? 'active' : '' }}">
                        <a href="{{route('subcategorys.index')}}"><i class="fas fa-calendar-alt me-2"></i>
                            SubCategory</a>
                    </li>

                    <li class="{{ Request::is('users') ? 'active' : '' }}">
                        <a href="{{route('users.index')}}"><i class="fas fa-user me-2"></i> Users</a>
                    </li>

                    <li class="{{ Request::is('settings') ? 'active' : '' }}">
                        <a href="{{ route('settings.index') }}"><i class="fas fa-cog me-2"></i> Settings</a>
                    </li>

                    <li>
                        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#userSubmenu" role="button"
                            aria-expanded="false" aria-controls="userSubmenu">
                            @if (Auth::guard('web')->check())
                                <i class="fas fa-user me-2"></i> {{ Auth::guard('web')->user()->fullname }}
                            @else
                                <i class="fas fa-user me-2"></i> Account
                            @endif
                        </a>

                        <ul class="collapse list-unstyled ms-3" id="userSubmenu">
                            <li><a href="#">Login</a></li>
                            <li><a href="">Register</a></li>
                            <li><a href="#">Forget Password</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </aside>

        <!-- SIDEBAR (Mobile Offcanvas) -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>

                        <li class="{{ Request::is('categorys') ? 'active' : '' }}">
                            <a href="{{ route('categorys.index') }}"><i class="fas fa-chart-bar me-2"></i> Category</a>
                        </li>

                        <li class="{{ Request::routeIs('product.index') ? 'active' : '' }}">
                            <a href="{{ route('product.index') }}"><i class="fas fa-table me-2"></i> Products</a>
                        </li>

                        <li class="{{ Request::is('brands.index') ? 'active' : '' }}">
                            <a href="{{route('brands.index')}}"><i class="far fa-check-square me-2"></i> Brands</a>
                        </li>

                        <li class="{{ Request::is('order.index') ? 'active' : '' }}">
                            <a href="{{route('order.index')}}"><i class="fas fa-table me-2"></i> Orders</a>
                        </li>

                        <li class="{{ Request::is('subcategorys') ? 'active' : '' }}">
                            <a href="{{route('subcategorys.index')}}"><i class="fas fa-calendar-alt me-2"></i>
                                SubCategory</a>
                        </li>

                        <li class="{{ Request::is('users') ? 'active' : '' }}">
                            <a href="{{route('users.index')}}"><i class="fa-solid fa-users"></i> Users</a>
                        </li>

                        <li class="{{ Request::is('settings') ? 'active' : '' }}">
                            <a href="{{ route('settings.index') }}"><i class="fas fa-cog me-2"></i> Settings</a>
                        </li>

                        <li>
                            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#userSubmenu" role="button"
                                aria-expanded="false" aria-controls="userSubmenu">
                                @if (Auth::guard('web')->check())
                                    <i class="fas fa-user me-2"></i> {{ Auth::guard('web')->user()->fullname }}
                                @else
                                    <i class="fas fa-user me-2"></i> Account
                                @endif
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <!-- END MENU SIDEBAR-->