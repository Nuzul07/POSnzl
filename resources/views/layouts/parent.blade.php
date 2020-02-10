<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include("layouts.components.head")

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <img src="{{ asset('image/upload/toko/logo.png') }}" alt="homepage" style="width: 30%; height: 30%; border-radius:50%;">
                            &nbsp;
                            <span class="page-title text-truncate text-dark font-weight-medium mb-1">NzlPOS</span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (!empty(Auth::user()->photo))
                                <img src="{{ asset('image/upload/user/'.Auth::user()->photo) }}" alt="user" class="rounded-circle" width="35">
                                @else
                                <img src="{{ asset('image/upload/user/avatar.png') }}" alt="user" class="rounded-circle" width="40">
                                @endif
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">{{Auth::user()->name}}</span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="{{ route('profile.index') }}"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('home') }}" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                        @if (Auth::user()->level_id == 1)
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Management</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('informasiToko.index') }}" aria-expanded="false"><i class="fas fa-info"></i><span class="hide-menu">Store Information
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('users.index') }}" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu">Users</span></a></li>
                        @endif

                        @if (Auth::user()->level_id == 2 || \Auth::user()->level_id == 1)
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Master Data</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('currencies.index') }}" aria-expanded="false"><i class="fas fa-dollar-sign"></i><span class="hide-menu">Currencies</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('ppn.index') }}" aria-expanded="false"><i class="far fa-money-bill-alt"></i><span class="hide-menu">PPN</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('units.index') }}" aria-expanded="false"><i class="fab fa-mizuni"></i><span class="hide-menu">Units</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('profit.index') }}" aria-expanded="false"><i class="fas fa-percent"></i><span class="hide-menu">Profit Percentage</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('category.index') }}" aria-expanded="false"><i class="fas fa-th-list"></i><span class="hide-menu">Category</span></a></li>



                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Inventory</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span class="hide-menu">Product</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{ route('product.index') }}" class="sidebar-link"><span class="hide-menu">All Product
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{ route('productIn.index') }}" class="sidebar-link"><span class="hide-menu">Report Product IN</span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{ route('emptyProduct.index') }}" class="sidebar-link"><span class="hide-menu">Empty stock</span></a></li>
                            </ul>
                        </li>
                        @endif

                        @if (Auth::user()->level_id == 3 || \Auth::user()->level_id == 1)
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Transaction</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('transaction.index') }}" aria-expanded="false"><i class="fas fa-shopping-cart"></i><span class="hide-menu">Transaction
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('invoice.index') }}" aria-expanded="false"><i class="fas fa-history"></i><span class="hide-menu">Transaction History
                                </span></a>
                        </li>
                        @endif
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <main class="py-4">
            @yield('content')
        </main>
        @include("layouts.components.modalDestroy")
        <div class="page-wrapper">

            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
    </div>
    @include("layouts.components.script")
</body>

</html>