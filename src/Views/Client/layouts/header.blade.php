<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title') - ZenBlog</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    {{-- * Login CSS --}}
    <link href="/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
    {{-- * Login CSS --}}

    <!-- Favicons -->
    <link href="/assets/client/assets/img/favicon.png" rel="icon">
    <link href="/assets/client/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/client/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/client/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/client/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/assets/client/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/client/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="/assets/client/assets/css/variables.css" rel="stylesheet">
    <link href="/assets/client/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: ZenBlog
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/#" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="/assets/client/assets/img/logo.png" alt=""> -->
                <h1>ZenBlog</h1>
            </a>

            @php
                $categories = (new \Admin\Mvcoop2\Models\Category())->getForDropMenu();
            @endphp

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/#">Trang Chủ</a></li>
                    <li class="dropdown"><a href="#"><span>Danh Mục</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="/category/{{ $category['id'] }}">{{ $category['name'] }}</a></li>
                            @endforeach
                            {{-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </li>

                    <li><a href="about.html">Giới Thiệu</a></li>
                    <li><a href="contact.html">Liên Hệ</a></li>
                </ul>
            </nav><!-- .navbar -->

            <div class="position-relative">
                {{-- * Nếu chưa có dữ liệu người dùng đăng nhập ($_SESSION['user']), tức là chưa đăng nhập thành công thì sẽ hiển thị ra trang login --}}
                @if (empty($_SESSION['user']))
                    <a href="/auth/login" class="mx-2"><span class="bi-person"></span></a>
                @endif

                {{-- * Nếu đăng nhập thành công thì sẽ hiển thị xin chào, đăng xuất và check role để hiển thị admin --}}
                @if (!empty($_SESSION['user']))
                    <label for="">Xin Chào {{ $_SESSION['user']['name'] }}!</label>
                    @if ($_SESSION['user']['role'] == 1)
                        <a href="/admin" class="mx-2"><span class="bi-gear"></span></a>
                    @endif

                    <a href="/logout" class="mx-2"><span class="bi-door-open"></span></a>
                @endif

                {{-- <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
                <a href="#" class="mx-2"><span class="bi-instagram"></span></a> --}}

                <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
                <i class="bi bi-list mobile-nav-toggle"></i>

                <!-- ======= Search Form ======= -->
                <div class="search-form-wrap js-search-form-wrap">
                    <form action="" class="search-form" method="GET">
                        <span class="icon bi-search"></span>
                        <input type="text" name="search" placeholder="Tìm Kiếm..." class="form-control">
                        <button class="btn js-search-close"><span class="bi-x"></span></button>
                    </form>
                </div><!-- End Search Form -->

            </div>

        </div>

    </header>
    <!-- End Header -->

    <!-- ======= Main ======= -->
    <main id="main">
