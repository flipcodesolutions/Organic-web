<header class="header sticky-top">
    <style>
        .dropdown-toggle::after {
            display: none !important;
        }
    </style>
    {{-- <div class="container-fluid">
        <div class="row py-3 border-bottom">
            <div
                class="col-sm-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
                <div class="d-flex align-items-center my-3 my-sm-0">
                    <a href="{{ route('visitor.index') }}">
                        <img src="{{ asset('visitor/images/logo.svg') }}" alt="logo" class="img-fluid" height="100px"
                            width="100px">
                    </a>
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
                    <li class="nav-item">
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

                <a href=" " class="btn  dropdown-toggle p-0" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">

                    <div class="userimage">
                        @if (session()->has('user'))
                        <img class="img-profile rounded-circle"
                                src="{{ asset('user_profile/' . session('user')->pro_pic) }}" style="max-height: 40px">
                        @else
                            <img class="img-profile rounded-circle"
                                src="{{ asset('user_profile/1741682175_67cff5ff1ede5.png') }}" style="max-height: 40px">
                        @endif
                    </div>
                    <div class="username text-truncate" style="max-width: 100px;">
                        hello,
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            @if (session()->has('user'))
                                {{ session('user')->name }}
                            @endif
                        </span>

                    </div>
                </a>


                <ul class="dropdown-menu">
                    @if (session()->has('user'))
                        <li><a class="dropdown-item" href=""><i
                                    class="fa-solid fa-unlock-keyhole mr-2 text-gray-400 me-2"></i>Change Password</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('visitor.logout') }}"> <i
                                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Log out</a></li>
                    @else
                        <li><a class="dropdown-item" href="{{ route('visitor.loginindex') }}">Log in</a></li>
                        <li><a class="dropdown-item" href="">Sign Up</a></li>
                    @endif

                </ul>
            </div>
            <div class="col-1">
                <a @if (session()->has('user')) href="{{ route('home.cart') }}" @else href="{{ route('visitor.loginindex') }}" @endif class="btn btn-success d-flex justify-content-between align-items-center">
                    <img src="{{ asset('visitor/images/ShoppingCart.svg') }}" alt="" class="img-fluid"
                        style="max-width: 50%">
                    <h6>cart</h6>
                </a>
            </div>


        </div>

    </div> --}}

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="col-lg-2 col-md-10 col-sm-11">
                <a class="navbar-brand " href="{{ route('visitor.index') }}">
                    <img src="{{ asset('visitor/images/logo.svg') }}" alt="logo" class="img-fluid" height="100px"
                        width="100px">
                </a>
            </div>

            <div class="col-6 d-none d-lg-block">
                <div class="search-bar row bg-light p-2 rounded-4">
                    <div class="col-md-4 d-none d-md-block">
                        <select class="form-select border-0 bg-transparent">
                            <option>All Categories</option>
                            @foreach ($category as $allCategoryData)
                                <option><a href="">{{ $allCategoryData->categoryName }}</a></option>
                            @endforeach
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

            <div class="col-3 d-none d-lg-flex justify-content-between">
                <div class="col-4 pt-2 dropdown">

                    <a href=" " class="btn  dropdown-toggle p-0" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <div class="userimage">
                            @if (session()->has('user'))
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('user_profile/' . session('user')->pro_pic) }}"
                                    style="max-height: 40px">
                            @else
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('user_profile/1741682175_67cff5ff1ede5.png') }}"
                                    style="max-height: 40px">
                            @endif
                        </div>
                        <div class="username text-truncate" style="max-width: 100px;">
                            hello,
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                @if (session()->has('user'))
                                    {{ session('user')->name }}
                                @endif
                            </span>

                        </div>
                    </a>


                    <ul class="dropdown-menu">
                        @if (session()->has('user'))
                            <li><a class="dropdown-item" href="{{ route('visitor.profile') }}"><i
                                        class="fa-solid fa-user text-gray-400 me-2"></i>Profile
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('visitor.addressindex') }}">
                                    <i class="fa-solid fa-location-dot text-gray-400 me-2"></i> Address</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('visitor.logout') }}"> <i
                                        class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400 me-2"></i>
                                    Log out</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('visitor.loginindex') }}">Log in</a></li>
                            {{-- <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#authModal">Login</a>
                            </li> --}}
                            <li><a class="dropdown-item" href="">Sign Up</a></li>
                        @endif

                    </ul>
                </div>

                <div class="col-4 py-3">
                    <a @if (session()->has('user')) href="{{ route('home.orderindex') }}" @else href="{{ route('visitor.loginindex') }}" @endif
                        class="btn btn-success d-flex w-auto justify-content-between align-items-center py-2">
                        <i class="fa-solid fa-receipt text-body-secondary fa-lg"></i> your orders
                    </a>
                </div>

                <div class="col-4 p-3">
                    <a @if (session()->has('user')) href="{{ route('home.cart') }}" @else href="{{ route('visitor.loginindex') }}" @endif
                        class="btn btn-success d-flex w-auto justify-content-between align-items-center">
                        <img src="{{ asset('visitor/images/ShoppingCart.svg') }}" alt="" class="img-fluid"
                            style="max-width: 50%">
                        <h6>cart</h6>
                    </a>
                </div>
            </div>


            {{-- for small screen  --}}
            <div class="d-block d-lg-none">
                <button class="btn rounded-circle border-0 p-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                    <div class="userimage">
                        @if (session()->has('user'))
                            <img class="img-profile rounded-circle"
                                src="{{ asset('user_profile/' . session('user')->pro_pic) }}" style="max-height: 40px">
                        @else
                            <img class="img-profile rounded-circle"
                                src="{{ asset('user_profile/1741682175_67cff5ff1ede5.png') }}"
                                style="max-height: 40px">
                        @endif
                    </div>
                    <div class="username text-truncate" style="max-width: 100px;">
                        hello,
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            @if (session()->has('user'))
                                {{ session('user')->name }}
                            @endif
                        </span>

                    </div>
                </button>

                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel"> hello @if (session()->has('user'))
                                , {{ session('user')->name }}
                            @endif
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="list-group list-group-flush">
                            @if (session()->has('user'))
                                <li class="list-group-item"><a href="{{ route('visitor.profile') }}"
                                        class="text-decoration-none text-black">Profile</a></li>
                                <li class="list-group-item"><a href="{{ route('visitor.addressindex') }}"
                                        class="text-decoration-none text-black">Address</a></li>
                                <li class="list-group-item"> Your Orders </li>
                                <li class="list-group-item"> Policies </li>
                                <li class="list-group-item"> FAQ </li>
                                <li class="list-group-item"> Contact us </li>
                                <li class="list-group-item"> <a class="btn p-0"
                                        href="{{ route('visitor.logout') }}"> <i
                                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Log out</a>
                                </li>
                            @else
                                <li class="list-group-item"> <a href="{{ route('visitor.loginindex') }}"> Log in </a>
                                </li>
                                <li class="list-group-item"> <a href=""> Sign Up </a> </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="d-flex d-lg-none justify-content-center">
                <div class="search-bar row bg-light p-2 rounded-4">
                    <div class="col-11  col-sm-12">
                        <form id="search-form" class="text-center" action="index.html" method="post">
                            <input type="text" class="form-control border-0 bg-transparent"
                                placeholder="Search for more than 20,000 products">
                        </form>
                    </div>
                    <div class="col-1 p-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</header>
