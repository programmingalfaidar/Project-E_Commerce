<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    <!-- cdn bostrap -->
    @stack('prepand-style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ url('style/main.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">


    <style>

    </style>
    @stack('addon-style')

    <!-- fonts googel -->

</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" data-aos="fade-right" id="wrapper">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="/images/admin.png" alt="" class="my-4" style="max-width: 130px;">
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('dashboard-admin') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin\dashboard-admin') ? 'active' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('product.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin\product*') ? 'active' : '' }}">
                        Product
                    </a>
                    <a href="{{ route('product-gallery.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin\product-gallery*') ? 'active' : '' }}">
                        Galleries
                    </a>
                    <a href="{{ route('category.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin\category*') ? 'active' : '' }}">
                        Category
                    </a>
                    <a href="{{ route('dashboard-setting') }}" class="list-group-item list-group-item-action">
                        Transaksi
                    </a>
                    <a href="{{ route('user.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('admin\user*') ? 'active' : '' }}">
                        User
                    </a>
                    <a href="" class="list-group-item list-group-item-action">
                        Sign Out
                    </a>
                </div>
            </div>
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
                    <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                        &laquo; Menu
                    </button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarResponsive" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Sekstop Menu -->
                        <ul class="navbar-nav d-none d-lg-flex ml-auto">
                            <li class="nav-item dropdown">
                                <a href="" class="nav-link" id="navbarDropdown" role="button"
                                    data-toggle="dropdown">
                                    <img src="/images/icon-user.png" alt=""
                                        class="rounded-circle mr-2 profile-picture">Hi Alfaidar
                                </a>
                                <div class="dropdown-menu">
                                    <a href="/" class="dropdown-item">Logout</a>
                                </div>
                            </li>

                        </ul>
                        <ul class="navbar-nav d-block d-lg-none">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    Hi' Idar
                                </a>
                            </li>

                        </ul>
                    </div>

                </nav>
                <!-- section Content -->
                @yield('content')
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    @stack('prepand-script')
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $('#menu-toggle').click(function(e) {
            e.preventDefault();
            $('#wrapper').toggleClass('toggled')
        })
    </script>
    @stack('addon-script')
</body>

</html>
