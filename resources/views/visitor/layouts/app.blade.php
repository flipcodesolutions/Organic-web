<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- slick slider css --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .header {
            position: sticky;
            z-index: 1000;
            top: 0;
            background-color: #fff;
        }

        .categoryCarousel,
        .productCarousel {
            background: rgb(244, 246, 251);
        }

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
            transition: box-shadow 0.3s ease;
            /* Smooth transition for shadow */
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
    </style>
</head>

<body>

    @include('visitor.layouts.header')
    @yield('content')
    @include('visitor.layouts.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- font awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- slick slider js --}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- category carousel --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const multipleItemCarousel = document.querySelector("#categoryCarousel");

            if (window.matchMedia("(min-width:576px)").matches) {
                // Initialize Bootstrap carousel for larger screens (no auto sliding)
                const carousel = new bootstrap.Carousel(multipleItemCarousel, {
                    interval: false
                });

                const carouselInner = $(".category-carousel-inner");
                let carouselWidth = carouselInner[0].scrollWidth;
                let cardWidth = $(".category-carousel-item").outerWidth(true); // including margin

                let scrollPosition = 0;

                // Next button logic
                $(".category-carousel-control-next").on("click", function() {
                    if (scrollPosition < carouselWidth - cardWidth *
                        3) { // Scroll until there are no more items to show
                        scrollPosition += cardWidth;
                        carouselInner.animate({
                            scrollLeft: scrollPosition
                        }, 800);
                    }
                });

                // Prev button logic
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
            } else {
                // For smaller screens, just use Bootstrap carousel behavior (normal sliding)
                $(multipleItemCarousel).addClass("slide");
            }
        });
    </script>

    {{-- product carousel --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const multipleItemCarousel = document.querySelector("#productCarousel");

            if (window.matchMedia("(min-width:576px)").matches) {
                // Initialize Bootstrap carousel for larger screens (no auto sliding)
                const carousel = new bootstrap.Carousel(multipleItemCarousel, {
                    interval: false
                });

                const carouselInner = $(".product-carousel-inner");
                let carouselWidth = carouselInner[0].scrollWidth;
                let cardWidth = $(".product-carousel-item").outerWidth(true); // including margin

                let scrollPosition = 0;

                // Next button logic
                $(".product-carousel-control-next").on("click", function() {
                    if (scrollPosition < carouselWidth - cardWidth *
                        3) { // Scroll until there are no more items to show
                        scrollPosition += cardWidth;
                        carouselInner.animate({
                            scrollLeft: scrollPosition
                        }, 800);
                    }
                });

                // Prev button logic
                $(".product-carousel-control-prev").on("click", function() {
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
                    cardWidth = $(".product-carousel-item").outerWidth(true);
                });
            } else {
                // For smaller screens, just use Bootstrap carousel behavior (normal sliding)
                $(multipleItemCarousel).addClass("slide");
            }
        });
    </script>
</body>

</html>
