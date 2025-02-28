<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vegitable e-comm') }}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Toastr CSS and JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    {{-- boostrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Vegitable e-comm</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- comman card header css --}}
    <link href="{{ asset('asset/css/card.min.css') }}" rel="stylesheet">
    

    {{-- sweetalert cdn --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:  #19aa5c ">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center " href="index.html" style="background-color: #19aa5c  !important;">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="font-size:25px">Vegetable e-comm</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item navbar-hover mb-0">
                <a class="nav-link" href="{{ route('home') }}" title="Go to Dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span style="font-size:20px">Dashboard</span></a>
            </li>

            <li class="nav-item mb-0">
                <a class="nav-link" href="{{ route('category.index') }}" title="Manage Category ">
                    <i class="fas fa-th-list"></i>
                    <span style="font-size:20px">Categories</span></a>
            </li>

            <li class="nav-item mb-0">
                <a class="nav-link" href="{{ route('product.index') }}" title="View and Manage Products">
                    <i class="fas fa-box"></i>
                    <span style="font-size:20px">Products</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('navigate.index') }}">
                    <i class="fa fa-bookmark"></i>
                    <span>Navigate</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('notification.index') }}">
                    <i class="fa fa-bookmark"></i>
                    <span>Notification</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pointper.index') }}">
                    <i class="fa fa-bookmark"></i>
                    <span>Point Per</span></a>
            </li>

            {{-- <li class="nav-item"> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('module.index') }}">
                    <i class="fa fa-bookmark"></i>
                    <span>Modules</span></a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('module.index') }}">
            <i class="fa fa-bookmark"></i>
            <span>Modules</span></a>
            </li> --}}

            <li class="nav-item mb-0">
                <a class="nav-link" href="{{ route('image.index') }}" title="Manage Images">
                    <i class="fas fa-image"></i>
                    <span style="font-size:20px">Images</span></a>
            </li>

            <li class="nav-item mb-0">
                <a class="nav-link" href="{{ route('product.price.index') }}" title="Manage Product Pricing">
                    <i class="fas fa-tag"></i>
                    <span style="font-size:20px">Product-Price</span></a>
            </li>

            <li class="nav-item mb-0">
                <a class="nav-link" href="{{ route('city_master.index') }}" title="Manage Cities">
                    <i class="fas fa-city"></i>
                    <span style="font-size:20px">Cities</span></a>
            </li>

            <li class="nav-item mb-0">
                <a class="nav-link" href="{{ route('landmark.index') }}" title="Manage Landmarks">
                    <i class="fas fa-map-marker-alt"></i>
                    <span style="font-size:20px">Landmark</span></a>
            </li>

            @if(Auth::user()->role == "Admin")
            <li class="nav-item mb-0">
                <a class="nav-link" href="{{ route('admin.reviews.index') }}" title="View Admin Reviews">
                    <i class="fas fa-star"></i>
                    <span style="font-size:20px">Admin Reviews</span></a>
            </li>
            @endif

            <li class="nav-item mb-0">
                <a class="nav-link" href="{{ route('vendor.reviews.index') }}" title="View Vendor Reviews">
                    <i class="fas fa-user-check"></i>
                    <span style="font-size:20px">Vendor Reviews</span></a>
            </li>


            <li class="nav-item mb-0">
                <a class="nav-link" href="{{ Route('deliveryslot.index') }}" title="Manage Delivery Slots">
                    <i class="fas fa-clock"></i>
                    <span style="font-size:20px">DeliverySlot</span></a>
            </li>
            <li class="nav-item mb-0">
                <a class="nav-link" href="{{ Route('cms_master.index') }}" title="Manage CMS Pages">
                    <i class="fas fa-file-alt"></i>
                    <span style="font-size:20px">Cms_Master</span></a>
            </li>
            <li class="nav-item mb-0">
                <a class="nav-link" href="{{ Route('faq.index') }}" title="Manage FAQs">
                    <i class="fas fa-question-circle"></i>
                    <span style="font-size:20px">Faq</span></a>
            </li>
            <li class="nav-item mb-0">
                <a class="nav-link" href="{{Route('unitmaster.index')}}" title="Manage Units">
                    <i class="fas fa-ruler"></i>
                    <span style="font-size:20px">UnitMaster</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('slider.index')}}">
                    <i class="fa fa-bookmark"></i>
                    <span>Slider</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>User Management</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('users.index') }}">User List</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Role Management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('roles.index') }}">Role List</a>
                    </div>
                </div>
            </li>

            

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Permission Management</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('permission.index') }}">Pemission List</a>
                    </div>
                </div>
            </li>
            
            <!-- Reports -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fa-solid fa-file"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('reports.purchaseReport') }}">Purchase Report</a>
                    </div>
                </div>
            </li>
        
            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Divider -->
            {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow" style="background-color:  #19aa5c ">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('asset/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> --}}
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Logout') }}
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        {{-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> --}}
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>

                    <!-- Content Row -->
                    <div class="card-body">
                        @yield('content')
                    </div>

                    {{-- javascript cdn --}}
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>

                    <!-- Page level plugins -->
                    <script src="{{ asset('asset/vendor/chart.js/Chart.min.js') }}"></script>

                    <!-- Page level custom scripts -->
                    <script src="{{ asset('asset/js/demo/chart-area-demo.js') }}"></script>
                    <script src="{{ asset('asset/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
