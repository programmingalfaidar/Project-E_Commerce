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
                    <img src="images/dashboard-store-logo.svg" alt="" class="my-4">
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">
                        Dashboard
                    </a>
                    <a href="{{ route('dashboard-product') }}" class="list-group-item list-group-item-action">
                        My Product
                    </a>
                    <a href="{{ route('dashboard-transaksi') }}" class="list-group-item list-group-item-action">
                        Transaksi
                    </a>
                    <a href="{{ route('dashboard-setting') }}" class="list-group-item list-group-item-action">
                        Setting
                    </a>
                    <a href="{{ route('dashboard-account') }}" class="list-group-item list-group-item-action">
                        My Account
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
                                    <img src="images/icon-user.png" alt=""
                                        class="rounded-circle mr-2 profile-picture">Hi
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                                    <a href="{{ route('dashboard-setting') }}" class="dropdown-item">Settings</a>
                                    <div class="dropdown-divider">

                                    </div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                            class="text-dark">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link d-inline-block d-flex mt-2">
                                    @php
                                        $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                                    @endphp
                                    @if ($carts > 0)
                                        <div class="history d-flex">
                                            <img src="/images/icon-cart-filled.svg" alt="">
                                            <div class="cart-badge">{{ $carts }}</div>
                                        </div>
                                    @else
                                        <img src="images/icon-cart-empty.svg" alt="">
                                    @endif
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav d-block d-lg-none">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link d-inline-block">
                                    Cart
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
    <script src="{{ url('vendor/jquery/jquery.slim.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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
