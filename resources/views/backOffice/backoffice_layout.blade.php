<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Admin panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />



    <!-- bootstrap -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    @vite(['resources/assets/backoffice_asset/libs/jsvectormap/css/jsvectormap.min.css'])
    @vite(['resources/assets/backoffice_asset/libs/swiper/swiper-bundle.min.css'])
    @vite(['resources/assets/backoffice_asset/js/layout.js'])
    @vite(['resources/assets/backoffice_asset/css/bootstrap.min.css'])
    @vite(['resources/assets/backoffice_asset/css/icons.min.css'])
    @vite(['resources/assets/backoffice_asset/css/app.min.css'])
    @vite(['resources/assets/backoffice_asset/css/custom.min.css'])



</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ Vite::asset('resources/assets/backoffice_asset/images/logo-sm.png') }}"
                                        alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ Vite::asset('resources/assets/backoffice_asset/images/logo-dark.png') }}"
                                        alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ Vite::asset('resources/assets/backoffice_asset/images/logo-sm.png') }}"
                                        alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ Vite::asset('resources/assets/backoffice_asset/images/logo-light.png') }}"
                                        alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>


                    </div>
                    <div class="d-flex align-items-center">
                         {{-- full screen button  --}}
                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>
                        {{-- dark mode  --}}
                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>
                        {{-- user icon --}}
                        <div class=" header-item topbar-user">
                            <a href="#">
                                <span class="d-flex align-items-center px-3">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ Vite::asset('resources/assets/backoffice_asset/images/users/avatar-1.jpg') }}"
                                        alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                            {{ strtoupper(Auth::user()->name) }}
                                        </span>
                                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">
                                            {{ strtoupper(Auth::user()->usertype) }}
                                        </span>
                                    </span>
                                </span>
                            </a>


                        </div>


                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle" data-key="t-logout">Logout</span></a>


                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ Vite::asset('resources/assets/backoffice_asset/images/logo-sm.png') }}"
                            alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ Vite::asset('resources/assets/backoffice_asset/images/logo-dark.png') }}"
                            alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ Vite::asset('resources/assets/backoffice_asset/images/logo-sm.png') }}"
                            alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ Vite::asset('resources/assets/backoffice_asset/images/logo-light.png') }}"
                            alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('adminpanel')}}">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('services')}}" >
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Services</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('postsBack')}}" >
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Posts</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('tags')}}" >
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Tags</span>
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Tags</span>
                            </a>

                        </li> <!-- end Dashboard Menu -->

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('eventsBack')}}" >
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Events</span>
                            </a>

                        </li> <!-- end Dashboard Menu -->

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAuth">
                                <i class="ri-account-circle-line"></i> <span
                                    data-key="t-authentication">Authentication</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarPages">
                                <i class="ri-pages-line"></i> <span data-key="t-pages">Pages</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarLanding" >
                                <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
                            </a>

                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span
                                data-key="t-components">Components</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarUI">
                                <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-base-ui">Base UI</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAdvanceUI" >
                                <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Advance UI</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="widgets.html">
                                <i class="ri-honour-line"></i> <span data-key="t-widgets">Widgets</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarForms" >
                                <i class="ri-file-list-3-line"></i> <span data-key="t-forms">Forms</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarTables" >
                                <i class="ri-layout-grid-line"></i> <span data-key="t-tables">Tables</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="/adminpanel/chart">
                                <i class="ri-pie-chart-line"></i> <span data-key="t-charts">Projects Chart</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarIcons" >
                                <i class="ri-compasses-2-line"></i> <span data-key="t-icons">Icons</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarMaps" >
                                <i class="ri-map-pin-line"></i> <span data-key="t-maps">Maps</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarMultilevel">
                                <i class="ri-share-line"></i> <span data-key="t-multi-level">Multi Level</span>
                            </a>

                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    @yield('backoffice')

    <!-- JAVASCRIPT -->
    @vite(['resources/assets/backoffice_asset/libs/bootstrap/js/bootstrap.bundle.min.js'])
    @vite(['resources/assets/backoffice_asset/libs/simplebar/simplebar.min.js'])
    @vite(['resources/assets/backoffice_asset/libs/node-waves/waves.min.js'])
    @vite(['resources/assets/backoffice_asset/libs/feather-icons/feather.min.js'])
    @vite(['resources/assets/backoffice_asset/js/pages/plugins/lord-icon-2.1.0.js'])
    @vite(['resources/assets/backoffice_asset/js/plugins.js'])

    <!-- apexcharts -->
    @vite(['resources/assets/backoffice_asset/libs/apexcharts/apexcharts.min.js'])

    <!-- Vector map-->
    @vite(['resources/assets/backoffice_asset/libs/jsvectormap/js/jsvectormap.min.js'])
    @vite(['resources/assets/backoffice_asset/libs/jsvectormap/maps/world-merc.js'])

    <!--Swiper slider js-->
    @vite(['resources/assets/backoffice_asset/libs/swiper/swiper-bundle.min.js'])

    <!-- Dashboard init -->
    @vite(['resources/assets/backoffice_asset/js/pages/dashboard-ecommerce.init.js'])

    <!-- App js -->
    @vite(['resources/assets/backoffice_asset/js/app.js'])

</body>

</html>
