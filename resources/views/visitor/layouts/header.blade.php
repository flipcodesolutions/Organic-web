<header class="header">
    <style>
        .dropdown-toggle::after {
            display: none !important;
        }
    </style>
    <div class="container-fluid">
        <div class="row py-3 border-bottom">

            <div
                class="col-sm-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
                <div class="d-flex align-items-center my-3 my-sm-0">
                    <a href="{{ route('visitor.index') }}">
                        <img src="{{ asset('visitor/images/logo.svg') }}" alt="logo" class="img-fluid" height="100px"
                            width="100px">
                    </a>
                </div>
                {{-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Enable body
                    scrolling</button> --}}
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Offcanvas with body scrolling</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <p>Try scrolling the rest of the page to see this option in action.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-6">
                <div class="search-bar row bg-light p-2 rounded-4">
                    <div class="col-md-4 d-none d-md-block">
                        <select class="form-select border-0 bg-transparent">
                            <option>All Categories</option>
                            @foreach ($category as $allCategoryData)
                                <option><a href="">{{ $allCategoryData->categoryName }}</a></option>
                            @endforeach
                            {{-- <option>Drinks</option>
                            <option>Chocolates</option> --}}
                        </select>
                    </div>
                    <div class="col-11 col-md-7">
                        <form id="search-form" class="text-center" action="index.html" method="post">
                            <input type="text" class="form-control border-0 bg-transparent"
                                placeholder="Search for more than 20,000 products">
                        </form>
                    </div>
                    <div class="col-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <ul
                    class="navbar-nav list-unstyled d-flex flex-row gap-3 gap-lg-5 justify-content-center flex-wrap align-items-center mb-0 fw-bold text-uppercase text-dark">
                    <li class="nav-item active">
                        <a href="{{ route('visitor.index') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle pe-3" role="button" id="pages" data-bs-toggle="dropdown"
                            aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu border-0 p-3 rounded-0 shadow" aria-labelledby="pages">
                            <li><a href="index.html" class="dropdown-item">About Us </a></li>
                            <li><a href="index.html" class="dropdown-item">Shop </a></li>
                            <li><a href="index.html" class="dropdown-item">Single Product </a></li>
                            <li><a href="index.html" class="dropdown-item">Cart </a></li>
                            <li><a href="index.html" class="dropdown-item">Checkout </a></li>
                            <li><a href="index.html" class="dropdown-item">Blog </a></li>
                            <li><a href="index.html" class="dropdown-item">Single Post </a></li>
                            <li><a href="index.html" class="dropdown-item">Styles </a></li>
                            <li><a href="index.html" class="dropdown-item">Contact </a></li>
                            <li><a href="index.html" class="dropdown-item">Thank You </a></li>
                            <li><a href="index.html" class="dropdown-item">My Account </a></li>
                            <li><a href="index.html" class="dropdown-item">404 Error </a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-sm-8 col-lg-1 d-flex align-items-center justify-content-lg-center justify-content-sm-end ">

                {{-- <ul class="d-flex justify-content-end list-unstyled m-0">
                    <li class="nav-item dropdown no-arrow mb-4"> --}}
                <a href=" " class="btn  dropdown-toggle p-0" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    
                    <div class="userimage">
                        @if (Auth::user() && Auth::user() != null)
                            <img class="img-profile rounded-circle"
                                src="{{ asset('user_profile/' . Auth::user()->pro_pic) }}" style="max-height: 40px">
                        @else
                            <img class="img-profile rounded-circle"
                                src="{{ asset('user_profile/1741682175_67cff5ff1ede5.png') }}" style="max-height: 40px">
                        @endif
                    </div>
                    <div class="username text-truncate" style="max-width: 100px;">
                        hello, @if (Auth::user() && Auth::user() != null)
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                        @endif
                    </div>
                </a>
{{-- {{Auth::user()}} --}}
{{-- @dd(session()->getId()); --}}

                <ul class="dropdown-menu">
                    @if (!Auth::user() && Auth::user() == null)
                        <li><a class="dropdown-item" href="{{ route('visitor.loginindex') }}">Log in</a></li>
                        <li><a class="dropdown-item" href="">Sign Up</a></li>
                    @else
                        <li><a class="dropdown-item" href=""><i
                                    class="fa-solid fa-unlock-keyhole mr-2 text-gray-400 me-2"></i>Change Password</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ Auth::logout() }}"> <i
                                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Log out</a></li>
                    @endif

                </ul>
                {{-- </li>

                    <li> --}}
                {{-- </li>
                    </ul> --}}
            </div>
            <div class="col-1">
                <a href="{{ route('home.cart') }}" class="btn btn-success d-flex justify-content-between">
                    <img src="{{ asset('visitor/images/ShoppingCart.svg') }}" alt="" class="img-fluid"
                        style="max-width: 50%">
                    <h6>cart</h6>
                </a>
            </div>


        </div>
        <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Fruitables</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <ul>
                        <li class="nav-item dropdown no-arrow mb-4">
                            Dropdown - User Information
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
                                        class="fa-solid fa-unlock-keyhole mr-2 text-gray-400"></i>Change
                                    Password</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                </div>
            </div>
        </nav> -->
    </div>
</header>
