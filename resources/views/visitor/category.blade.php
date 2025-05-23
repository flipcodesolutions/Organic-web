@extends('visitor.layouts.app')
@section('content')
    {{-- <style>
        .childCategoryList {
            background-color: #878587;
        }

        .childcategory {
            gap: 10px;
            text-decoration: none;
            padding: 10px;
        }

        .childcategory:hover {
            background-color: black;
        }

        .chlidcategoryname {
            display: flex;
            align-items: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            /* max-width: calc(100% - 110px); */
            color: white;
        }

        .childcategoryimage {
            width: 56px;
            padding: 10px;
            display: flex;
            justify-content: center;
        }

        .childcategoryimage img {
            height: 76px;
            width: 46px;
        }
    </style> --}}

    <style>
        a {
            text-decoration: none;
        }

        .sidebar,
        .content {
            height: 710px;
            overflow: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .sidebar::-webkit-scrollbar,
        .content::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }

        .category-card:hover {
            box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
        }

        .active .category-card {
            box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
            border: 1px solid #41ab2e;
            color: #41ab2e;
        }

        .card-title {
            word-break:
        }

        .category-image {
            max-height: 63px;
            /* max-width: 84px; */
        }

        .product-card:hover {
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
        }
    </style>







    {{-- <div class="container-fluid d-flex p-0">

        <div class="sidebar col-lg-2 sidenav border-end">
            <ul class="list-group list-group-flush py-3">
                <li
                    class="list-group-item px-0 {{ request()->has('categoryId') ? '' : 'active bg-body-tertiary border-light' }} ">

                    <a href="{{ route('home.category', ['id' => request()->route('id')]) }}" class="childcategory d-flex">
                        @foreach ($category as $categoryData)
                            @if ($categoryData->id == request()->route('id'))
                                <div class="card category-card w-100">
                                    <div class="row g-0">
                                        <div class="col-md-4 d-flex align-item-center">
                                            <img src="{{ asset($categoryData->cat_icon) }}" alt=""
                                                class="img-thumbnail p-0 category-image">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body  px-2 d-flex align-items-center text-truncate">
                                                <h5 class="card-title mb-0">All</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </a>
                </li>


                @foreach ($childcategory as $catData)
                    <li
                        class="list-group-item px-0 {{ request('categoryId') == $catData->id ? 'active bg-body-tertiary border-light' : '' }}">
                        <a href="{{ route('home.category', ['id' => request()->route('id')]) }}?categoryId={{ $catData->id }}"
                            class="childcategory d-flex ">
                            <div class="card category-card w-100">
                                <div class="row g-0">
                                    <div class="col-md-4 d-flex align-item-center">
                                        <img src="{{ asset($catData->cat_icon) }}" alt=""
                                            class="img-thumbnail p-0 category-image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body px-2 d-flex align-items-center text-truncate">
                                            <p class="card-title ">{{ $catData->categoryName }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>


        <div class="content col-lg-10 p-3 bg-body-secondary">
            <div class="col-mb-3">
                <h4>Products</h4>
            </div>
            <div class="childcategoryTable row mh-75 ">
                @foreach ($product as $productData)
                    <a href="{{ route('home.product') }}/{{ $productData->id }}"
                        class="col-lg-2 col-md-6 col-sm-12 d-flex align-items-stretch mb-3">
                        <div class="card product-card w-100 h-auto text-center p-1">
                            <img src="{{ asset($productData->image) }}" alt="" class="img-fluid"
                                style="max-height: 177px">
                            <div class="card-body">
                                <h5 class="card-title">{{ $productData->productName }}</h5>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    </div> --}}

    <div class="container-fluid py-3">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-12 col-md-3 col-lg-2 mb-3 mb-md-0">
                <ul class="list-group list-group-flush">
                    <li class="my-1 {{ request()->has('categoryId') ? '' : 'active bg-body-tertiary border-light' }}">
                        <a href="{{ route('home.category', ['id' => request()->route('id')]) }}"
                            class="text-decoration-none text-dark">
                            <div class="card category-card">
                                <div class="row g-0">
                                    <div class="col-4 d-flex align-items-center">
                                        <img src="{{ asset($category[0]->cat_icon ?? '') }}" alt=""
                                            class="img-thumbnail p-0">
                                    </div>
                                    <div class="col-8 d-flex align-items-center">
                                        <h6 class=" mb-0 text-truncate ms-2">All</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>

                    @foreach ($childcategory as $catData)
                        <li
                            class="my-1 {{ request('categoryId') == $catData->id ? 'active bg-body-tertiary border-light' : '' }}">
                            <a href="{{ route('home.category', ['id' => request()->route('id')]) }}?categoryId={{ $catData->id }}"
                                class="text-decoration-none text-dark">
                                <div class="card category-card">
                                    <div class="row g-0">
                                        <div class="col-4 d-flex align-items-center">
                                            <img src="{{ asset($catData->cat_icon) }}" alt=""
                                                class="img-thumbnail p-0">
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <p class="mb-0 text-truncate ms-2">{{ $catData->categoryName }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Product Grid -->
            <div class="col-12 col-md-9 col-lg-10">
                <h4 class="mb-3">{{ $catData->categoryName }}</h4>
                <div class="row g-3">
                    @foreach ($product as $productData)
                        {{-- <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex align-items-stretch">
                            <a href="{{ route('home.product') }}/{{ $productData->id }}" class="w-100 text-decoration-none text-dark">
                                <div class="card h-100 text-center p-1">
                                    <img src="{{ asset($productData->image) }}" alt="" class="img-fluid mx-auto" style="max-height: 177px;">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $productData->productName }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div> --}}

                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="card h-100 text-center p-1">
                                <a href="{{ route('home.product', $productData->id) }}"
                                    class="w-100 text-decoration-none text-dark">
                                    <img src="{{ asset($productData->image) }}" alt="" class="img-fluid mx-auto"
                                        style="max-height: 177px;">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title mb-1 text-truncate">{{ $productData->productName }}</h6>
                                        <p class="mb-0">{{ $productData->productUnit->first()->unitMaster->unit }}
                                        </p>
                                        <p class="mb-0 ">₹{{ $productData->productPrice }}</p>

                                        <!-- Buttons -->
                                        {{-- <div class="mt-auto">
                                            <a href="{{ $productData->id }}" class="btn btn-sm btn-success w-100 mb-1">
                                                Buy Now
                                            </a>
                                            <form action="" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $productData->id }}">
                                                <button type="submit" class="btn btn-sm btn-primary w-100">
                                                    Add to Cart
                                                </button>
                                            </form>
                                        </div> --}}
                                    </div>
                                </a>
                                <div class="action-buttons mb-4">
                                    {{-- <button class="btn btn-success" id="buynow">Buy Now</button> --}}
                                    {{-- <button class="btn btn-primary me-2 my-3" type="submit" title="add to cart" id="addtocart">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </button> --}}

                                    {{-- <form action="{{ route('home.addtocart') }}" method="POST">
                                                @csrf --}}
                                    {{-- <button class="btn btn-primary me-2 my-3" type="submit" title="add to cart"
                                                    id="addtocart">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button> --}}
                                    {{-- </form> --}}

                                    {{-- <div class="action-buttons mb-4"> --}}
                                    <input type="number" class="form-control quantity-input mb-2" min="1"
                                        value="1" hidden>

                                    <input type="number" class="form-control quantity-input" value="1" min="1"
                                        hidden>

                                    {{-- <button class="btn btn-success buynow-btn" {{ session()->has('user') ? '' : 'disabled' }}>Buy Now</button> --}}

                                    <button class="btn btn-success buynow-btn"
                                        data-unit-id="{{ $productData->productUnit->first()->id }}"
                                        data-product-id="{{ $productData->id }}"
                                        data-total="{{ $productData->productPrice }}">
                                        Buy Now
                                    </button>
                                    <button class="btn btn-primary me-2 my-3 addtocart-btn" title="add to cart"
                                        data-unit-id="{{ $productData->productUnit->first()?->id }}"
                                        data-product-id="{{ $productData->id }}"
                                        data-total="{{ $productData->productPrice }}">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>



                                    {{-- </div> --}}

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>




    {{-- <div class="container-fluid d-flex">

        <nav class="childCategoryList" style="width: 300px; min-height: 700px;">
            <h3 style="margin-left: 10px;">Categories</h3>
            <a href="{{ route('home.category', ['id' => request()->route('id')]) }}" class="childcategory d-flex">
                @foreach ($category as $categoryData)
                    @if ($categoryData->id == request()->route('id'))
                        <div class="childcategoryimage">
                            <img src="{{ asset($categoryData->cat_icon) }}" alt="">
                        </div>
                    @endif
                @endforeach
                <div class="chlidcategoryname">All</div>
            </a>
            @foreach ($childcategory as $catData)
                <a href="{{ route('home.category', ['id' => request()->route('id')]) }}?categoryId={{ $catData->id }}"
                    class="childcategory d-flex">
                    <div class="childcategoryimage">
                        <img src="{{ asset($catData->cat_icon) }}" alt="">
                    </div>
                    <div class="chlidcategoryname">{{ $catData->categoryName }}</div>
                </a>
            @endforeach
        </nav>

        <div class="Product-container" style="padding: 30px 75px 0; background-color: rgb(244, 246, 251);">
            <div class="col mb-3">
                <h1>Products</h1>
            </div>
            <div class="childcategoryTable" style="display: grid;   grid-template-columns: auto auto auto auto; gap: 50px;">
                @foreach ($product as $productData)
                    <a href="{{ route('home.product') }}/{{ $productData->id }}"
                        style="text-decoration: none; color: black;">
                        <div class="col">
                            <div class="childCategoryImage d-flex"
                                style="border: 1px solid black; border-radius: 50%; justify-content: center">
                                <img src="{{ asset($productData->image) }}" alt=""
                                    style="height: 225px; width: 225px;">
                            </div>
                            <div class="categoryname" style="text-align: center;">
                                {{ $productData->productName }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div> --}}

    <script>
        $(document).ready(function() {
            $(".addtocart-btn").on("click", function() {
                let unitId = $(this).data("unit-id");
                let productId = $(this).data("product-id");
                let totalAmount = $(this).data("total");
                let quantity = 1;

                let quantityField = $(this).closest(".card").find(".quantity-input");
                if (quantityField.length > 0) {
                    quantity = parseInt(quantityField.val(), 10) || 1;
                }

                if (!unitId || !productId) {
                    Swal.fire("Oops!", "Product information is incomplete!", "warning");
                    return;
                }

                $.ajax({
                    url: "{{ route('home.addtocart') }}",
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    contentType: "application/json",
                    data: JSON.stringify({
                        unit_id: {
                            id: unitId,
                            product_id: productId
                        },
                        quantity: quantity,
                        total_amount: totalAmount
                    }),
                    success: function(response) {
                        console.log("Added to Cart:", response.message);
                        alert(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                        alert(response.message);
                    }
                });
            });
        });










        // $(document).ready(function() {
        //     $(".buynow-btn").on("click", function() {
        //         let productName = $(this).data("name");
        //         let unitId = $(this).data("unit-id");
        //         let productId = $(this).data("product-id");
        //         let totalAmount = $(this).data("total");
        //         let price = $(this).data("productPrice");
        //         let quantity = 1;

        //         let quantityField = $(this).closest(".card").find(".quantity-input");
        //         if (quantityField.length > 0) {
        //             quantity = parseInt(quantityField.val(), 10) || 1;
        //         }

        //         // if (!unitId || !productId) {
        //         //     Swal.fire("Oops!", "Product information is incomplete!", "warning");
        //         //     return;
        //         // }

        //         $.ajax({
        //             url: "{{ route('home.cart') }}",
        //             type: "get",
        //             headers: {
        //                 "X-CSRF-TOKEN": "{{ csrf_token() }}"
        //             },
        //             contentType: "application/json",
        //             data: JSON.stringify({
        //                 unit_id: {
        //                     id: unitId,
        //                     product_id: productId
        //                 },
        //                 quantity: quantity,
        //                 total_amount: totalAmount
        //             }),
        //             success: function(response) {
        //                 console.log("Added to Cart:", response.message);
        //                 alert(response.message);
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error("Error:", error);
        //                 alert(response.message);
        //             }
        //         });
        //     });
        // });



        $(document).ready(function() {
            $(".buynow-btn").on("click", function() {
                let button = $(this);
                let unitId = button.data("unit-id");
                let productId = button.data("product-id");
                let totalAmount = button.data("total");
                let quantity = 1;

                let quantityField = button.closest(".card").find(".quantity-input");
                if (quantityField.length > 0) {
                    quantity = parseInt(quantityField.val(), 10) || 1;
                }

                $.ajax({
                    url: "{{ route('home.addtocart') }}", // ✅ This route must allow POST
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    contentType: "application/json",
                    data: JSON.stringify({
                        unit_id: {
                            id: unitId,
                            product_id: productId
                        },
                        quantity: quantity,
                        total_amount: totalAmount
                    }),
                    success: function(response) {
                        console.log("Added to cart:", response.message || response);
                        window.location.href =
                        "{{ route('home.cart') }}"; // redirect to cart page
                    },
                    error: function(xhr) {
                        console.error("Error adding to cart:", xhr.responseText);
                        alert("Something went wrong.");
                    }
                });
            });
        });



        // document.addEventListener("DOMContentLoaded", function() {
        //     const buyNowButtons = document.querySelectorAll(".buynow-btn");

        //     buyNowButtons.forEach(function(button) {
        //         if (!button.hasAttribute("disabled")) {
        //             button.addEventListener("click", function() {
        //                 window.location.href = "{{ route('home.cart') }}";
        //             });
        //         }
        //     });
        // });
    </script>
@endsection
