<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.css">
</head>
@yield('styles')

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('index') }}" class="text-nowrap logo-img">
                        <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-6"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link{{ Route::is('index') ? ' active' : '' }}" href="{{ route('index') }}">
                                <i class="ti ti-atom"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Dashboard -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between{{ Route::is('suppliers.index') ? ' active' : '' }}" href="{{ route('suppliers.index') }}">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="d-flex">
                                        <i class="ti ti-aperture"></i>
                                    </span>
                                    <span class="hide-menu">Suppliers</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <span class="sidebar-divider lg"></span>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Apps</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                               >
                                <div class="d-flex align-items-center gap-2">
                                    <span class="d-flex">
                                        <i class="ti ti-basket"></i>
                                    </span>
                                    <span class="hide-menu">Ecommerce</span>
                                </div>

                            </a>
                            <ul class="collapse first-level">
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between" href="#">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-badge-right"></i>
                                            </div>
                                            <span class="hide-menu">Shop</span>
                                        </div>

                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between" href="#">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-badge-right"></i>
                                            </div>
                                            <span class="hide-menu">Details</span>
                                        </div>

                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between" href="#">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-badge-right"></i>
                                            </div>
                                            <span class="hide-menu">List</span>
                                        </div>

                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between" href="#">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-badge-right"></i>
                                            </div>
                                            <span class="hide-menu">Checkout</span>
                                        </div>

                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between" href="#">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-badge-right"></i>
                                            </div>
                                            <span class="hide-menu">Add Product</span>
                                        </div>

                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between" href="#">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-badge-right"></i>
                                            </div>
                                            <span class="hide-menu">Edit Product</span>
                                        </div>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                               >
                                <div class="d-flex align-items-center gap-2">
                                    <span class="d-flex">
                                        <i class="ti ti-chart-donut-3"></i>
                                    </span>
                                    <span class="hide-menu">Blog</span>
                                </div>

                            </a>
                            <ul class="collapse first-level">
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between" href="#">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-badge-right"></i>
                                            </div>
                                            <span class="hide-menu">Blog Posts</span>
                                        </div>

                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between" href="#">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-badge-right"></i>
                                            </div>
                                            <span class="hide-menu">Blog Details</span>
                                        </div>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="#">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="d-flex">
                                        <i class="ti ti-user-circle"></i>
                                    </span>
                                    <span class="hide-menu">User Profile</span>
                                </div>

                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./sample-page.html">
                                <i class="ti ti-file"></i>
                                <span class="hide-menu">Sample Page</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                               >
                                <i class="ti ti-bell"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                                <div class="message-body">
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        Item 1
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        Item 2
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item d-flex align-items-center mx-3" id="mini-weather">
                                <img id="mini-weather-icon" src="" alt="weather" width="60" height="60" class="me-1">
                                <div class="me-2">
                                    <span id="mini-temp" class="text-primary fs-9">--°C</span>
                                </div>
                                <div class="d-flex flex-column text-dark">
                                    <span id="mini-day">--</span>
                                    <span id="mini-location">--</span>
                                </div>
                                <div class="d-flex flex-column ms-2">
                                    <span class="ms-2" id="mini-date">--/--</span>
                                    <span class="ms-2" id="mini-time">--:--</span>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                   >
                                    <img src="./assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                                        class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="./authentication-login.html"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="body-wrapper-inner">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js')}}"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
@yield('scripts')

<script>
  async function loadMiniWeather() {
    const apiKey = "cbb589cfee1d493998b61809250310";
    const city = "Karachi";
    const url = `https://api.weatherapi.com/v1/current.json?key=${apiKey}&q=${city}&aqi=no`;

    try {
      const res = await fetch(url);
      const data = await res.json();

      // Update weather info
      document.getElementById("mini-temp").innerHTML = data.current.temp_c + "<sup>°C</sup>";
      document.getElementById("mini-location").innerText = data.location.name;
      document.getElementById("mini-day").innerText = new Date().toLocaleDateString("en-US", { weekday: 'long' });
      document.getElementById("mini-weather-icon").src = "https:" + data.current.condition.icon;
    } catch (err) {
      console.error("Mini Weather API error:", err);
    }
  }

  function updateMiniClock() {
    const d = new Date();
    const date = String(d.getDate()).padStart(2, "0");
    const month = String(d.getMonth() + 1).padStart(2, "0");
    const hours = String(d.getHours()).padStart(2, "0");
    const minutes = String(d.getMinutes()).padStart(2, "0");
    document.getElementById("mini-date").innerText = `${date}/${month}`;
    document.getElementById("mini-time").innerText = `${hours}:${minutes}`;
  }

  // Initial load
  loadMiniWeather();
  updateMiniClock();

  // Update weather every 5 mins (quota bachane ke liye)
  setInterval(loadMiniWeather, 300000);

  // Update clock every 1 sec
  setInterval(updateMiniClock, 1000);
</script>