<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- Toastr CSS and JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    {{-- boostrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Vegitable e-comm</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- comman card header css --}}
    <link href="{{ asset('asset/css/card.min.css') }}" rel="stylesheet">


    {{-- sweetalert cdn --}}

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" class="overlay-menu">

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-content">
                <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">

                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3">Vegetable E-comm</div>
                    </a>

                    <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">

                        <!-- Divider -->
                        <hr class="sidebar-divider my-0">

                        <!-- Nav Item - Dashboard -->

                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span></a>
                        </li>

                        {{-- master --}}
                        @unless (Auth::user()->role === 'vendor')
                            <li
                                class="nav-item {{ request()->routeIs('city_master.*') || request()->routeIs('landmark.*') || request()->routeIs('unitmaster.*') || request()->routeIs('faq.*') || request()->routeIS('cms_master.*') || request()->routeIs('pointper.*') ? 'active' : '' }}">
                                <a class="nav-link {{ request()->routeIs('city_master.*') || request()->routeIs('landmark.*') || request()->routeIs('unitmaster.*') || request()->routeIs('faq.*') || request()->routeIS('cms_master.*') || request()->routeIs('pointper.*') ? '' : 'collapsed' }}"
                                    href="#" data-toggle="collapse" data-target="#collapseUtilities1"
                                    aria-expanded="true" aria-controls="collapseUtilities">
                                    {{-- <i class="fas fa-fw fa-wrench"></i> --}}
                                    <i class="fa-solid fa-server"></i>
                                    <span>Master</span>
                                </a>
                                <div id="collapseUtilities1"
                                    class="collapse {{ request()->routeIs('city_master.*') || request()->routeIs('landmark.*') || request()->routeIs('unitmaster.*') || request()->routeIs('faq.*') || request()->routeIS('cms_master.*') || request()->routeIs('pointper.*') ? 'show' : '' }}"
                                    aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        {{-- city --}}
                                        <a class="collapse-item {{ request()->routeIs('city_master.*') ? 'active' : '' }}"
                                            href="{{ route('city_master.index') }}">
                                            <i class="fa fa-location-pin mr-2"></i>
                                            <span>Cities</span></a>

                                        {{-- landmark --}}
                                        <a class="collapse-item {{ request()->routeIs('landmark.*') ? 'active' : '' }}"
                                            href="{{ route('landmark.index') }}">
                                            <i class="fa fa-street-view mr-2"></i>
                                            <span>Landmark</span></a>

                                        {{-- unit master --}}
                                        <a class="collapse-item {{ request()->routeIs('unitmaster.*') ? 'active' : '' }}"
                                            href="{{ Route('unitmaster.index') }}">
                                            <i class="fa fa-bookmark mr-2"></i>
                                            <span>Unit Master</span></a>

                                        {{-- faq --}}
                                        <a class="collapse-item {{ request()->routeIs('faq.*') ? 'active' : '' }}"
                                            href="{{ Route('faq.index') }}">
                                            <i class="fa fa-person-circle-question mr-2"></i>
                                            <span>FAQs</span></a>

                                        {{-- cms master --}}
                                        <a class="collapse-item {{ request()->routeIs('cms_master.*') ? 'active' : '' }}"
                                            href="{{ Route('cms_master.index') }}">
                                            <i class="fa fa-list-check mr-2"></i>
                                            <span>CMS Master</span></a>



                                        {{-- point per --}}
                                        <a class="collapse-item {{ request()->routeIs('pointper.*') ? 'active' : '' }}"
                                            href="{{ route('pointper.index') }}">
                                            <i class="fa fa-basket-shopping mr-2"></i>
                                            <span>Point Per</span></a>

                                    </div>
                                </div>
                                {{-- <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                                data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="{{ route('user.index') }}">User List</a>
                                </div>
                            </div> --}}
                            </li>
                        @endunless

                        {{-- product --}}
                        <li
                            class="nav-item {{ request()->routeIs('category.*') || request()->routeIs('brand.*') || request()->routeIs('product.*') || request()->routeIs('vendor.*') || request()->routeIs('unit.*') || request()->routeIs('stock.*') ? 'active' : '' }}">
                            <a class="nav-link {{ request()->routeIs('category.*') || request()->routeIs('brand.*') || request()->routeIs('product.*') || request()->routeIs('vendor.*') || request()->routeIs('unit.*') || request()->routeIs('stock.*') ? '' : 'collapsed' }}"
                                href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                                aria-expanded="true" aria-controls="collapseUtilities">
                                {{-- <i class="fas fa-fw fa-wrench"></i> --}}
                                <i class="fa-solid fa-warehouse"></i>
                                <span>Product</span>
                            </a>

                            @php
                                $isVendor = auth()->check() && auth()->user()->role === 'vendor';
                            @endphp
                            <div id="collapseUtilities2"
                                class="collapse {{ request()->routeIs('category.*') || request()->routeIs('brand.*') || request()->routeIs('product.*') || request()->routeIs('vendor.*') || request()->routeIs('unit.*') || request()->routeIs('stock.*') ? 'show' : '' }}"
                                aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    @unless ($isVendor)
                                        {{-- category --}}
                                        <a class="collapse-item {{ request()->routeIs('category.*') ? 'active' : '' }}"
                                            href="{{ route('category.index') }}">
                                            <i class="fa fa-list mr-2"></i>
                                            <span>Categories</span></a>

                                        {{-- brand --}}
                                        <a class="collapse-item {{ request()->routeIs('brand.*') ? 'active' : '' }}"
                                            href="{{ route('brand.index') }}">
                                            <i class="fa-brands fa-fort-awesome mr-2"></i>
                                            <span>Brands</span></a>




                                        {{-- price --}}
                                        <a class="collapse-item {{ request()->routeIs('unit.*') ? 'active' : '' }}"
                                            href="{{ route('unit.index') }}">
                                            <i class="fa-solid fa-tags mr-2"></i>
                                            <span>Price Update</span></a>
                                    @endunless

                                    {{-- product --}}
                                    <a class="collapse-item {{ request()->routeIs('product.*') ? 'active' : '' }}"
                                        href="{{ route('product.index') }}">
                                        <i class="fa fa-carrot mr-2"></i>
                                        <span>Products</span></a>
                                    {{-- stock update --}}
                                    <a class="collapse-item {{ request()->routeIs('stock.*') ? 'active' : '' }}"
                                        href="{{ route('stock.index') }}">
                                        <i class="fa-solid fa-cubes-stacked mr-2"></i>
                                        <span>Stock Update</span></a>

                                    {{-- purchases --}}
                                    <a class="collapse-item {{ request()->routeIs('purchase.*') ? 'active' : '' }}"
                                        href="{{ route('purchase.index') }}">
                                        <i class="fa fa-shopping-cart mr-2"></i>
                                        <span>Purchases</span></a>


                                    {{-- review --}}
                                    <a class="collapse-item {{ request()->routeIs('vendor.*') ? 'active' : '' }}"
                                        href="{{ route('vendor.reviews.index') }}">
                                        <i class="fa fa-comment mr-2"></i>
                                        <span>Vendor Reviews</span></a>
                                </div>
                            </div>
                        </li>

                        {{-- setting --}}
                        @unless (Auth::user()->role === 'vendor')
                            <li
                                class="nav-item {{ request()->routeIs('navigate.*') || request()->routeIs('slider.*') || request()->routeIs('notification.*') || request()->routeIs('deliveryslot.*') ? 'active' : '' }}">
                                <a class="nav-link {{ request()->routeIs('navigate.*') || request()->routeIs('slider.*') || request()->routeIs('notification.*') || request()->routeIs('deliveryslot.*') ? '' : 'collapsed' }}"
                                    href="#" data-toggle="collapse" data-target="#collapseUtilities3"
                                    aria-expanded="true" aria-controls="collapseUtilities">
                                    <i class="fa-solid fa-gears"></i> <span>Setting</span>
                                </a>

                                <div id="collapseUtilities3"
                                    class="collapse {{ request()->routeIs('navigate.*') || request()->routeIs('slider.*') || request()->routeIs('notification.*') || request()->routeIs('deliveryslot.*') ? 'show' : '' }}"
                                    aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        {{-- navigation --}}
                                        <a class="collapse-item {{ request()->routeIs('navigate.*') ? 'active' : '' }}"
                                            href="{{ route('navigate.index') }}">
                                            <i class="fa fa-location-dot mr-2"></i>
                                            <span>Navigate</span></a>

                                        {{-- slider --}}
                                        <a class="collapse-item {{ request()->routeIs('slider.*') ? 'active' : '' }}"
                                            href="{{ Route('slider.index') }}">
                                            <i class="fa fa-photo-film mr-2"></i>
                                            <span>Slider</span></a>

                                        {{-- notification --}}
                                        <a class="collapse-item {{ request()->routeIs('notification.*') ? 'active' : '' }}"
                                            href="{{ route('notification.index') }}">
                                            <i class="fa fa-bell mr-2"></i>
                                            <span>Notification</span></a>

                                        {{-- delivery slots --}}
                                        <a class="collapse-item {{ request()->routeIs('deliveryslot.*') ? 'active' : '' }}"
                                            href="{{ Route('deliveryslot.index') }}">
                                            <i class="fa fa-truck mr-2"></i>
                                            <span>Delivery Slots</span></a>
                                    </div>
                                </div>

                            </li>
                        @endunless

                        <li class="nav-item {{ request()->routeIs('order.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('order.index') }}"><i class="fa-solid fa-truck"></i>
                                <span>Order Management</span></a>
                        </li>

                        {{-- <li class="nav-item {{ request()->routeIs('category.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('category.index') }}">
                                <i class="fa fa-list"></i>
                                <span>Categories</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('brand.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('brand.index') }}">
                                <i class="fa-brands fa-fort-awesome"></i>
                                <span>Brands</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('product.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('product.index') }}">
                                <i class="fa fa-carrot"></i>
                                <span>Products</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('navigate.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('navigate.index') }}">
                                <i class="fa fa-location-dot"></i>
                                <span>Navigate</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('notification.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('notification.index') }}">
                                <i class="fa fa-bell"></i>
                                <span>Notification</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('pointper.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pointper.index') }}">
                                <i class="fa fa-basket-shopping"></i>
                                <span>Point Per</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('city_master.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('city_master.index') }}">
                                <i class="fa fa-location-pin"></i>
                                <span>Cities</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('landmark.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('landmark.index') }}">
                                <i class="fa fa-street-view"></i>
                                <span>Landmark</span></a>
                        </li> --}}

                        {{-- @if (Auth::user()->role == 'Admin') --}}
                        {{-- <li class="nav-item {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.reviews.index') }}">
                                <i class="fa fa-comment"></i>
                                <span>Admin Reviews</span></a>
                        </li> --}}
                        {{-- @endif --}}

                        {{-- <li class="nav-item {{ request()->routeIs('vendor.reviews.*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('vendor.reviews.index') }}">
                                <i class="fa fa-comment"></i>
                                <span>Vendor Reviews</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('deliveryslot.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ Route('deliveryslot.index') }}">
                                <i class="fa fa-truck"></i>
                                <span>Delivery Slots</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('cms_master.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ Route('cms_master.index') }}">
                                <i class="fa fa-list-check"></i>
                                <span>CMS Master</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('faq.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ Route('faq.index') }}">
                                <i class="fa fa-person-circle-question"></i>
                                <span>FAQs</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('unitmaster.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ Route('unitmaster.index') }}">
                                <i class="fa fa-bookmark"></i>
                                <span>Unit Master</span></a>
                        </li> --}}

                        {{-- <li class="nav-item {{ request()->routeIs('slider.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ Route('slider.index') }}">
                                <i class="fa fa-photo-film"></i>
                                <span>Slider</span></a>
                        </li> --}}
                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Heading -->
                        {{-- <div class="sidebar-heading">
                            Interface
                        </div> --}}
                        @unless (Auth::user()->role === 'vendor')
                            <li class="nav-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
                                <a class="pt-1 pb-2 nav-link {{ request()->routeIs('user.*') ? '' : 'collapsed' }}"
                                    href="#" data-toggle="collapse" data-target="#collapseUtilities"
                                    aria-expanded="true" aria-controls="collapseUtilities">
                                    {{-- <i class="fas fa-fw fa-wrench"></i> --}}
                                    <i class="  fa-solid fa-users"></i>
                                    <span class="">User Management</span>
                                </a>
                                <div id="collapseUtilities"
                                    class="collapse {{ request()->routeIs('user.*') ? 'show' : '' }}"
                                    aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <a class="collapse-item {{ request()->routeIs('user.*') ? 'active' : '' }}"
                                            href="{{ route('user.index') }}">
                                            <i class="fa-solid fa-user"></i>
                                            <span>User List</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endunless

                        <!-- Nav Item - Pages Collapse Menu -->
                        {{-- <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Role Management</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('roles.index') }}">Role List</a>
                </div>
                </div>
                </li> --}}
                        <!-- Reports -->
                        <li class="nav-item {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                            <a class="pt-3 pb-2 nav-link {{ request()->routeIs('reports.*') ? '' : 'collapsed' }}"
                                href="#" data-toggle="collapse" data-target="#collapseFour"
                                aria-expanded="true" aria-controls="collapseFour">
                                <i class="fa-solid fa-file"></i>
                                <span>Reports</span>
                            </a>
                            <div id="collapseFour"
                                class="collapse {{ request()->routeIs('reports.*') ? 'show' : '' }}"
                                aria-labelledby="headingFour" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item {{ request()->routeIs('reports.*') ? 'active' : '' }}"
                                        href="{{ route('reports.purchaseReport') }}">Purchase
                                        Report</a>
                                </div>
                                {{-- <div class="bg-white py-2 collapse-inner rounded"> --}}
                                {{-- <a class="collapse-item" href="{{ route('reports.purchaseDateWise') }}">Purchase Date Wise
                                Report</a> --}}
                                {{-- </div> --}}
                            </div>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>

                    </ul>
            </div>
        </div>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    {{--
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    {{-- <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> --}}

                    <!-- Nav Item - Alerts -->
                    {{-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                <!-- Nav Item - Alerts -->
                {{-- <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to
                                            download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                    Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy
                                            with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More
                                    Messages</a>
                            </div>
                        </li> --}}

                    <div class="topbar-divider d-none d-sm-block ml-auto"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow mb-4">
                        @auth
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('user_profile/' . Auth::user()->pro_pic) }}">
                            </a>
                        @endauth

                        {{-- <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle"
                                src="{{ asset('user_profile/' . Auth::user()->pro_pic) }}">
                        </a> --}}
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('change.password') }}"><i
                                    class="fa-solid fa-unlock-keyhole mr-2 text-gray-400"></i>Change Password</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ 'Logout' }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            {{--
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a> --}}
                        </div>
                    </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="background: ghostwhite;">

                    <!-- Page Heading -->
                    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div> --}}

                    <!-- Content Row -->
                    {{-- <div class="card-body p-0"> --}}
                    @yield('content')
                    {{-- </div> --}}
                    {{-- <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Page level custom scripts -->
                    <script src="{{ asset('asset/js/demo/chart-area-demo.js') }}"></script>
                    <script src="{{ asset('asset/js/demo/chart-pie-demo.js') }}"></script>
                    <!-- Content Row -->

                    {{-- <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Content Row -->
                    {{-- <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Color System -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div>

                        </div>
                    </div> --}}

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class=" sticky-footer  bg-white">
                <div class="container-fluid px-0 ">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    @if (session()->has('success'))
        <script>
            var message =
                '{{ session()->has('
                                                                                                                                                                                                                                                                                            success ')
                    ? session()->get('
                                                                                                                                                                                                                                                                                            success ')
                    : (session()->has('
                                                                                                                                                                                                                                                                                            error ')
                        ? session()->get('
                                                                                                                                                                                                                                                                                            error ')
                        : implode("\\n", $errors->all())) }}';

            // If there is a success message
            if (message) {
                toastr.success(message, 'Success', {
                    timeOut: 5000
                });
            }
        </script>
    @endif


    {{-- SweetAlert2 toast notification code --}}
    @if (Session::has('msg'))
        <script>
            Swal.fire({
                icon: "{{ Session::get('msg_type') ?? 'success' }}", // You can pass 'msg_type' to change the icon dynamically
                title: "{{ Session::get('msg') }}",
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        </script>
    @endif


    {{-- sweet alert deactive code --}}
    <script>
        function openDeactiveModal(url) {
            Swal.fire({
                title: 'Are you sure you want to deactive it?',
                text: "You will be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                // confirmButtonColor: '#d33',
                // cancelButtonColor: '#6e7881',
                confirmButtonText: 'Yes, Deactive it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the delete route
                    window.location.href = url;
                }
            });
        }
    </script>

    {{-- sweet alert delete code --}}
    <script>
        function openDeleteModal(url) {
            Swal.fire({
                title: 'Are you sure you want to delete it?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6e7881',
                confirmButtonText: 'Yes, Delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the delete route
                    window.location.href = url;
                }
            });
        }
    </script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::has('warning'))
        <script>
            Swal.fire({
                title: 'Action Required!',
                text: "{{ Session::get('warning') }}", // Get the warning message from the session
                icon: 'warning',
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Proceed to Products',
                // cancelButtonText: 'Cancel',
                // reverseButtons: true,
            });
        </script>
    @endif

    {{-- <script>
        var type =
            '{{ session()->get('success') ? 'success' : (session()->get('error') ? 'error' : ($errors->any() ? 'error' : '')) }}';
    var message =
    '{{ session()->get('success') ? session()->get('success')['message'] : (session()->get('error') ? session()->get('error')['message'] : implode("\\n", $errors->all())) }}';
    if (type) {
    toastr[type](message);
    }
    </script> --}}
    {{-- javascript cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
        < /scrip>

        <
        !--Core plugin JavaScript-- >
        <
        script
        script src = "{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}" >
    </script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('asset/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('asset/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('asset/js/demo/chart-pie-demo.js') }}"></script>

    {{-- ckeditor file path --}}
    <script src="{{ asset('asset/js/ckeditor/ckeditor.js') }}"></script>




</body>

</html>




{{--
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel 11 User Roles and Permissions Tutorial - ItSolutionStuff.com
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                        <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                        <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>
                        <li><a class="nav-link" href="{{ route('citymaster.index') }}">Manage cities</a></li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</body>

</html> --}}
