@extends('visitor.layouts.app')
@section('content')

    {{-- category css --}}
    {{-- <style>
        .categoryCarousel img {
            /* width: 208px;
                                        max-height: 100%; */
            /* margin-right: 1rem; */
            overflow: hidden;
        }

        .category-carousel-inner {
            padding: 1em;
        }

        @media screen and (min-width: 576px) {
            .category-carousel-inner {
                display: flex;
                width: 90%;
                margin-inline: auto;
                padding: 1em 0;
                overflow: hidden;
            }

            .category-carousel-item {
                display: block;
                margin-right: 0;
                flex: 0 0 18%;
                /* 2 items per row for screens >= 576px */
            }
        }

        @media screen and (min-width: 768px) {
            .category-carousel-item {
                display: block;
                margin-right: 0;
                flex: 0 0 calc(100% / 5);
                /* 5 items per row for screens >= 768px */
            }
        }

        .categoryCarousel .card {
            margin: 0 0.5em;
            height: 100%;
            border: 0;
        }

        .category-carousel-control-prev,
        .category-carousel-control-next {
            width: 3rem;
            height: 3rem;
            background-color: grey;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        .categorylink {
            text-decoration: none;
        }

        .category-carousel-item:hover .catcard {
            box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }
    </style> --}}

    {{-- <style>
        /* General Styling for Images */
        .categoryCarousel img,
        .productCarousel img {
            /* width: 208px; */
            /* max-height: 100%; */
            /* margin-right: 1rem; */
            overflow: hidden;
        }

        /* General Carousel Inner Styling */
        .category-carousel-inner,
        .product-carousel-inner {
            padding: 1em;
        }

        /* For screens with a minimum width of 576px */
        @media screen and (min-width: 576px) {
            .category-carousel-inner,
            .product-carousel-inner {
                display: flex;
                width: 90%;
                margin-inline: auto;
                padding: 1em 0;
                overflow: hidden;
            }

            /* 2 items per row for both category and product carousels */
            .category-carousel-item,
            .product-carousel-item {
                display: block;
                margin-right: 0;
                flex: 0 0 18%;
            }
        }

        /* For screens with a minimum width of 768px */
        @media screen and (min-width: 768px) {
            /* 5 items per row for both category and product carousels */
            .category-carousel-item,
            .product-carousel-item {
                display: block;
                margin-right: 0;
                flex: 0 0 calc(100% / 5);
            }
        }

        /* General Card Styling for both category and product carousels */
        .categoryCarousel .card,
        .productCarousel .card {
            margin: 0 0.5em;
            height: 100%;
            border: 0;
            transition: box-shadow 0.3s ease; /* Smooth transition for shadow */
        }

        /* Carousel Control Styling */
        .category-carousel-control-prev,
        .category-carousel-control-next,
        .product-carousel-control-prev,
        .product-carousel-control-next {
            width: 3rem;
            height: 3rem;
            background-color: grey;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        /* Link Styling */
        .categorylink,
        .productlink {
            text-decoration: none;
        }

        /* Hover Effect on Cards for Category and Product Carousels */
        .category-carousel-item:hover .card,
        .product-carousel-item:hover .card {
            box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
                        rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
                        rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }
    </style> --}}


{{-- <style>
    .productCarousel img {
        /* width: 208px;
                                    max-height: 100%; */
        /* margin-right: 1rem; */
        overflow: hidden;
    }

    .product-carousel-inner {
        padding: 1em;
    }

    @media screen and (min-width: 576px) {
        .product-carousel-inner {
            display: flex;
            width: 90%;
            margin-inline: auto;
            padding: 1em 0;
            overflow: hidden;
        }

        .product-carousel-item {
            display: block;
            margin-right: 0;
            flex: 0 0 18%;
            /* 2 items per row for screens >= 576px */
        }
    }

    @media screen and (min-width: 768px) {
        .product-carousel-item {
            display: block;
            margin-right: 0;
            flex: 0 0 calc(100% / 5);
            /* 5 items per row for screens >= 768px */
        }
    }

    .productCarousel .card {
        margin: 0 0.5em;
        height: 100%;
        border: 0;
    }

    .product-carousel-control-prev,
    .product-carousel-control-next {
        width: 3rem;
        height: 3rem;
        background-color: grey;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
    }

    .productlink {
        text-decoration: none;
    }

    .product-carousel-item:hover .catcard {
        box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    }
</style> --}}


    <div class="container-fluid">
        {{-- top slider --}}
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slider as $sliderData)
                    @if ($sliderData->slider_pos == 'top')
                        <div class="carousel-item active">
                            <a href="{{preg_replace('/^.*?(\/.*)/', '$1', $sliderData->navigatemaster->screenname)}}"><img src="{{ asset('sliderimage/' . $sliderData->url) }}" class="d-block w-100" alt="..."
                                height="400px"></a>
                        </div>
                    @endif
                @endforeach
                {{-- <div class="carousel-item">
                    <img src="{{asset('visitor/images/one piece2.jpg')}}" class="d-block w-100" alt="..." height="300px">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('visitor/images/one piece2.jpg')}}" class="d-block w-100" alt="..." height="300px">
                </div> --}}
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="row mt-3">
            <h1>Category</h1>
        </div>
        {{-- category slider --}}
        <div id="categoryCarousel" class="categoryCarousel carousel" data-bs-ride="carousel">
            <div class="category-carousel-inner">
                @foreach ($category as $catData)
                    @if ($catData->parent_category_id == 0)
                        <a href="{{route('home.category')}}/{{ $catData->id }}" class="categorylink col-lg-3 col-sm-12">
                            <div class="category-carousel-item active">
                                <div class="catcard card p-2">
                                    <img src="{{ asset($catData->cat_icon) }}" class="card-img-top" alt="..."
                                        height="280px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $catData->categoryName }}</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
            <button class="category-carousel-control-prev carousel-control-prev" type="button"
                data-bs-target="#categoryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="category-carousel-control-next carousel-control-next" type="button"
                data-bs-target="#categoryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        {{-- middle slider --}}
        <div class="row">
            <div id="carouselExampleAutoplayingmiddleimage" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($slider as $sliderData)
                        @if ($sliderData->slider_pos == 'middle')
                            <div class="carousel-item active">
                                <a href="{{preg_replace('/^.*?(\/.*)/', '$1', $sliderData->navigatemaster->screenname)}}"><img src="{{ asset('sliderimage/' . $sliderData->url) }}" class="d-block w-100"
                                    alt="..." height="400px"></a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplayingmiddleimage"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplayingmiddleimage"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        {{-- product slider --}}
        <div class="row">
            <div class="row d-flex">
                <div class="col-11">
                    <h1>daily Fresh</h1>
                </div>
                <div class="col">
                    <a href="">view all</a>
                </div>
            </div>
            <div class="row" style="justify-content: space-around; text-align: center;">
                <div id="productCarousel" class="productCarousel carousel">
                    <div class="product-carousel-inner">
                        @foreach ($product as $productData)
                        <a href="{{ route('home.product') }}/{{ $productData->id }}" class="productlink col-lg-3 col-sm-12">
                            <div class="product-carousel-item active">
                                <div class="catcard card p-2">
                                    <img src="{{ asset($productData->productImages->first()->url) }}" class="card-img-top" alt="..." height="280px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $productData->productName }}</h5>
                                        <p>{{ $productData->productUnit->first()->unitMaster->unit }}</p>
                                        <p>₹{{ $productData->productPrice }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <button class="product-carousel-control-prev carousel-control-prev" type="button"
                        data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="product-carousel-control-next carousel-control-next" type="button"
                        data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- bottom slider --}}
        <div class="row">
            <div id="carouselExampleAutoplayingbottomimage" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($slider as $sliderData)
                        @if ($sliderData->slider_pos == 'bottom')
                            <div class="carousel-item active">
                                <a href="{{preg_replace('/^.*?(\/.*)/', '$1', $sliderData->navigatemaster->screenname)}}"><img src="{{ asset('sliderimage/' . $sliderData->url) }}" class="d-block w-100"
                                    alt="..." height="500px"></a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplayingbottomimage"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#carouselExampleAutoplayingbottomimage" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>



    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const multipleItemCarousel = document.querySelector("#categoryCarousel");
            const carouselInner = $(".category-carousel-inner");

            // This function will handle the custom scroll behavior for larger screens
            function handleLargeScreenCarousel() {
                const carouselWidth = carouselInner[0].scrollWidth;
                const cardWidth = $(".category-carousel-item").outerWidth(true);  // including margin
                let scrollPosition = 0;

                // Initialize Bootstrap carousel for larger screens (without auto sliding)
                const carousel = new bootstrap.Carousel(multipleItemCarousel, {
                    interval: false
                });

                // Next button logic (scroll to the next item)
                $(".category-carousel-control-next").on("click", function() {
                    if (scrollPosition < carouselWidth - cardWidth * 3) {
                        scrollPosition += cardWidth;
                        carouselInner.animate({
                            scrollLeft: scrollPosition
                        }, 800);
                    }
                });

                // Prev button logic (scroll to the previous item)
                $(".category-carousel-control-prev").on("click", function() {
                    if (scrollPosition > 0) {
                        scrollPosition -= cardWidth;
                        carouselInner.animate({
                            scrollLeft: scrollPosition
                        }, 800);
                    }
                });

                // Recalculate carouselWidth and cardWidth on window resize
                $(window).resize(function() {
                    carouselWidth = carouselInner[0].scrollWidth;
                    cardWidth = $(".category-carousel-item").outerWidth(true);
                });
            }

            // This function will initialize Bootstrap carousel sliding behavior for smaller screens
            function handleSmallScreenCarousel() {
                const carousel = new bootstrap.Carousel(multipleItemCarousel, {
                    interval: 5000,  // For small screens, auto slide at 5 seconds interval
                    ride: 'carousel'
                });

                // Ensure we can manually slide as well on smaller screens
                $(".category-carousel-control-next").on("click", function() {
                    carousel.next();
                });

                $(".category-carousel-control-prev").on("click", function() {
                    carousel.prev();
                });
            }

            // Check screen size and apply the appropriate behavior
            if (window.matchMedia("(min-width: 576px)").matches) {
                handleLargeScreenCarousel();  // For large screens
            } else {
                handleSmallScreenCarousel();  // For small screens
            }

            // Handle screen resizing
            $(window).resize(function() {
                if (window.matchMedia("(min-width: 576px)").matches) {
                    handleLargeScreenCarousel();  // Reapply the large screen behavior
                } else {
                    handleSmallScreenCarousel();  // Revert to small screen behavior
                }
            });
        });
    </script> --}}
@endsection
