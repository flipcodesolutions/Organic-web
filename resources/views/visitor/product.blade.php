@extends('visitor.layouts.app')
@section('content')
    <style>
        .review-user-image {
            /* border: 1px solid black; */
            border-radius: 50%;
            height: 34px;
            margin-right: 10px
        }

        .star-rating {
            direction: rtl;
            display: inline-flex;
            font-size: 2rem;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating input:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: gold;
        }
    </style>

    <div class="container-fluid">
        <div class="row px-3 my-3 ">
            <!-- Left Column (Product Image) -->
            {{-- <div class="col-md-6 d-flex justify-content-center align-items-center"
                style="position: relative; border-top: 1px solid rgb(242, 242, 242);
                   border-right: 1px solid rgb(242, 242, 242);
                   border-bottom: 1px solid rgb(242, 242, 242); height: 500px;"> --}}
            <div class="col-md-6 d-flex justify-content-center align-items-center">

                <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-inner">
                        @foreach ($product->productImages as $productImage)
                            <div class="carousel-item active">
                                {{-- <img src="{{ asset($productImage->url) }}" alt="Product Image" height="499px" width="100%"> --}}
                            </div>
                        @endforeach
                    </div>
                    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> --}}
                </div>

                <!-- Product Image -->
                {{-- <img src="AashirvaadAtta.jpeg" alt="Product Image"
                    style="height: 480px; width: 480px; object-fit: contain;"> --}}

            </div>

            <!-- Right Column (Product Details) -->
            {{-- <div class="col-md-6 d-flex flex-column"
                style="border-top: 1px solid rgb(242, 242, 242);
                   border-left: 1px solid rgb(242, 242, 242);
                   border-bottom: 1px solid rgb(242, 242, 242);
                   padding: 20px;">
                <h2 style="font-size: 1.5rem; font-weight: bold;">{{ $product->productName }}</h2> --}}

            <!-- Product Features / Description -->
            {{-- <p style="font-size: 1rem; color: #555;">{!! $product->productDescription !!}</p>

                <div class="row mt-auto"> --}}
            {{-- product units --}}
            {{-- <div class="unit  mb-2">
                        <h5 class="mb-2">Select Unit</h5>
                        <div class="unit-section d-flex" style="gap: 6px">
                            @foreach ($product->productUnit as $unitData)
                                <div class="card" id="selectedunit" onclick="selectedunit({{ json_encode($unitData) }})">
                                    <div class="card-body p-2">
                                        <h6>{{ $unitData->unitMaster->unit }}</h6>
                                        <p>₹ {{ $unitData->sell_price }} <span
                                                style="text-decoration-line: line-through; color: gray">₹
                                                {{ $unitData->price }}</span></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}

            <!-- Price Section -->
            {{-- <div class="price-section mb-2 d-flex ">
                        <div class="col-lg-2  me-2 ">
                            <div class="input-group input-group-sm "> --}}
            <!-- Decrement Button -->
            {{-- <button class="btn btn-outline-secondary " type="button" onclick="decrementquentity()"
                                    id="decrement-btn">
                                    -
                                </button> --}}
            <!-- Quantity Display -->
            {{-- <input type="text" class="form-control form-control-sm text-center" id="quantity"
                                    value="1" readonly aria-label="Quantity" aria-describedby="quantity"> --}}
            <!-- Increment Button -->
            {{-- <button class="btn btn-outline-secondary" type="button" onclick="incrementquentity()"
                                    id="increment-btn">
                                    +
                                </button> --}}
            {{-- </div>
                        </div>
                        <span id='totalAmount' style="font-size: 1.2rem; font-weight: bold;"></span>
                    </div> --}}

            <!-- Add to Cart / Buy Now Buttons -->
            {{-- <div class="action-buttons">
                        <button class="btn btn-primary" type="submit" id="addtocart"
                            style="padding: 10px 20px; font-size: 1rem; margin-right: 10px;">Add
                            to Cart</button>
                        <button class="btn btn-success" id="buynow" {{ session()->has('user') ? '' : 'disabled' }}
                            style="padding: 10px 20px; font-size: 1rem;">Buy Now</button>
                    </div>
                </div>
            </div> --}}
        </div>

        {{-- product review --}}
        {{-- <div class="row px-3">
            <div class="row mb-3">
                <h3>Product Review</h3>
            </div>

            <div class="product-review row mb-4">
                @if ($product->reviews && $product->reviews->isNotEmpty())
                    @foreach ($product->reviews as $reviewData)
                        <div class="row mb-2">
                            <div class="col-11 d-flex ">
                                <img src="{{ asset('user_profile/' . $reviewData->user->pro_pic) }}"
                                    class="review-user-image" alt="">

                                <h6>{{ $reviewData->user->name }}</h6>
                            </div>
                            <div class="col-1    d-flex align-items-center text-end "> --}}
        {{-- <p>{{ $reviewData->star }} <span ><img src="{{ asset('visitor/images/star.svg') }}"
                                            alt=""></span> </p> --}}
        {{-- <span class="me-1 text-end">{{ $reviewData->star }}</span>
                                <img class="text-end" src="{{ asset('visitor/images/star.svg') }}" alt="">
                            </div>
                        </div>

                        <div class="row">
                            <p>{{ $reviewData->message }}</p>
                        </div>

                        <hr class="sidebar-divider">
                    @endforeach
                @else
                    <p style="font-size: 30px; font-weight: 100;"> Product reviews not avalible
                    <p>
                @endif
            </div>
        </div> --}}

        {{-- similar Products --}}
        {{-- @php
            $filteredSimilarProducts = isset($similarproduct)
                ? $similarproduct->where('id', '!=', request()->route('id'))
                : collect();
        @endphp
        @if ($filteredSimilarProducts->isNotEmpty())
            <div class="row">
                <div class="row">

                    <div class="col-11">
                        <h3>Similar Products</h3>
                    </div> --}}
        {{-- <div class="col">
                    <a href="">view all</a>
                </div> --}}
        {{-- </div>

                <div class="row justify-content-center text-center">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                // Group products in chunks of 2 for tablets
                                $filtered = $similarproduct->where('id', '!=', request()->route('id'));
                                $chunkedProducts = $filtered->chunk(2); // 2 per slide for tablets
                            @endphp --}}

        {{-- @foreach ($chunkedProducts as $chunkIndex => $productChunk)
                                <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                    <div class="row">
                                        @foreach ($productChunk as $productData)
                                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                                <a href="{{ route('home.product') }}/{{ $productData->id }}"
                                                    class="productlink">
                                                    <div class="card p-2">
                                                        <img src="{{ asset($productData->productImages->first()->url) }}"
                                                            class="card-img-top" alt="..." height="180">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $productData->productName }}</h5>
                                                            <p>{{ $productData->productUnit->first()->unitMaster->unit }}
                                                            </p>
                                                            <p>₹{{ $productData->productPrice }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button class="product-carousel-control-prev carousel-control-prev" type="button"
                            data-bs-target="#productCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="product-carousel-control-next carousel-control-next" type="button"
                            data-bs-target="#productCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div> --}}









        {{-- <div class="row">
                    <!-- Left Side: Product Image -->
                    <div class="col-md-6 d-flex justify-content-center align-items-start">
                        <img src="{{ asset($product->productImages->first()->url) }}" alt="{{ $product->productName }}"
                             class="img-fluid" style="max-height: 400px; width: 100%; object-fit: contain;">
                    </div>

                    <!-- Right Side: Product Info + Reviews + Similar Products -->
                    <div class="col-md-6 overflow-auto"
                    style="max-height: 100vh; border-top: 1px solid rgb(242, 242, 242);
                           border-left: 1px solid rgb(242, 242, 242);
                           border-right: 1px solid rgb(242, 242, 242);
                           border-bottom: 1px solid rgb(242, 242, 242); padding: 20px;">

                    <div class="col-md-6 d-flex flex-column"
                         style="border-top: 1px solid rgb(242, 242, 242);
                                border-left: 1px solid rgb(242, 242, 242);
                                border-bottom: 1px solid rgb(242, 242, 242);
                                padding: 20px;">

                        <!-- Product Name & Description -->
                        <h2 style="font-size: 1.5rem; font-weight: bold;">{{ $product->productName }}</h2>
                        <p style="font-size: 1rem; color: #555;">{!! $product->productDescription !!}</p>

                        <!-- Unit Selection -->
                        <div class="unit mb-2">
                            <h5 class="mb-2">Select Unit</h5>
                            <div class="unit-section d-flex flex-wrap" style="gap: 6px">
                                @foreach ($product->productUnit as $unitData)
                                    <div class="card" id="selectedunit" onclick="selectedunit({{ json_encode($unitData) }})">
                                        <div class="card-body p-2">
                                            <h6>{{ $unitData->unitMaster->unit }}</h6>
                                            <p>₹ {{ $unitData->sell_price }}
                                                <span style="text-decoration: line-through; color: gray;">₹ {{ $unitData->price }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Quantity + Price -->
                        <div class="price-section mb-2 d-flex align-items-center">
                            <div class="me-2">
                                <div class="input-group input-group-sm">
                                    <button class="btn btn-outline-secondary" type="button" onclick="decrementquentity()">-</button>
                                    <input type="text" class="form-control form-control-sm text-center" id="quantity" value="1" readonly>
                                    <button class="btn btn-outline-secondary" type="button" onclick="incrementquentity()">+</button>
                                </div>
                            </div>
                            <span id='totalAmount' style="font-size: 1.2rem; font-weight: bold;"></span>
                        </div>

                        <!-- Buttons -->
                        <div class="action-buttons mb-4">
                            <button class="btn btn-primary me-2" type="submit" id="addtocart">Add to Cart</button>
                            <button class="btn btn-success" id="buynow" {{ session()->has('user') ? '' : 'disabled' }}>Buy Now</button>
                        </div>

                        <!-- Product Reviews -->
                        <div class="product-review mt-3">
                            <h4>Product Reviews</h4>
                            @if ($product->reviews && $product->reviews->isNotEmpty())
                                @foreach ($product->reviews as $reviewData)
                                    <div class="d-flex align-items-start mb-3">
                                        <img src="{{ asset('user_profile/' . $reviewData->user->pro_pic) }}"
                                             class="me-2" style="width: 40px; height: 40px; border-radius: 50%;" alt="">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <h6 class="mb-0">{{ $reviewData->user->name }}</h6>
                                                <div class="d-flex align-items-center">
                                                <span class="ms-5">{{ $reviewData->star }}</span>
                                                <img src="{{ asset('visitor/images/star.svg') }}" alt="" style="width: 16px;">
                                            </div>
                                            </div>
                                            <p class="mb-0">{{ $reviewData->message }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @else
                                <p style="font-size: 1rem;">Product reviews not available.</p>
                            @endif
                        </div>

                        <!-- Similar Products -->
                        @php
                            $filteredSimilarProducts = isset($similarproduct)
                                ? $similarproduct->where('id', '!=', request()->route('id'))
                                : collect();
                        @endphp

                        @if ($filteredSimilarProducts->isNotEmpty())
                            <div class="similar-products mt-4">
                                <h4>Similar Products</h4>
                                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @php $chunkedProducts = $filteredSimilarProducts->chunk(2); @endphp
                                        @foreach ($chunkedProducts as $chunkIndex => $productChunk)
                                            <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                                <div class="row">
                                                    @foreach ($productChunk as $productData)
                                                        <div class="col-12 col-md-6 mb-3">
                                                            <a href="{{ route('home.product') }}/{{ $productData->id }}" class="productlink">
                                                                <div class="card p-2">
                                                                    <img src="{{ asset($productData->productImages->first()->url) }}"
                                                                         class="card-img-top" alt="..." height="150">
                                                                    <div class="card-body">
                                                                        <h6 class="card-title mb-1">{{ $productData->productName }}</h6>
                                                                        <p class="mb-1">{{ $productData->productUnit->first()->unitMaster->unit }}</p>
                                                                        <p>₹{{ $productData->productPrice }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                    </div>
                </div> --}}

        <div class="row">
            <!-- Left Side: Product Image -->
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="{{ asset($product->productImages->first()->url) }}" alt="{{ $product->productName }}"
                    class="img-fluid" style="max-height: 400px; width: 100%; object-fit: contain;">
            </div>

            <!-- Right Side: Product Info + Reviews + Similar Products -->
            <div class="col-md-6 d-flex flex-column"
                style="padding: 20px; max-height: 100vh; border-top: 1px solid rgb(242, 242, 242);
                        border-left: 1px solid rgb(242, 242, 242); border-right: 1px solid rgb(242, 242, 242);
                        border-bottom: 1px solid rgb(242, 242, 242);">

                <!-- Scrollable Product Details -->
                <div class="overflow-auto" style="flex-grow: 1; padding-right: 10px;">
                    <div class="d-flex flex-column"
                        style="border-top: 1px solid rgb(242, 242, 242);
                                        border-left: 1px solid rgb(242, 242, 242);
                                        border-right: 1px solid rgb(242, 242, 242);
                                        border-bottom: 1px solid rgb(242, 242, 242);
                                        padding: 20px;">

                        <!-- Product Name & Description -->
                        <h2 style="font-size: 1.5rem; font-weight: bold;">{{ $product->productName }}</h2>
                        <p style="font-size: 1rem; color: #555;">{!! $product->productDescription !!}</p>

                        <!-- Unit Selection -->
                        <div class="unit mb-2">
                            <h5 class="mb-2">Select Unit</h5>
                            <div class="unit-section d-flex flex-wrap" style="gap: 6px">
                                @foreach ($product->productUnit as $unitData)
                                    <div class="card" id="selectedunit"
                                        onclick="selectedunit({{ json_encode($unitData) }})">
                                        <div class="card-body p-2">
                                            <h6>{{ $unitData->unitMaster->unit }}</h6>
                                            <p>₹ {{ $unitData->sell_price }}
                                                <span style="text-decoration: line-through; color: gray;">₹
                                                    {{ $unitData->price }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Quantity + Price -->
                        <div class="price-section mb-2 d-flex align-items-center">
                            <div class="me-2">
                                <div class="input-group input-group-sm">
                                    <button class="btn btn-outline-secondary" type="button"
                                        onclick="decrementquentity()">-</button>
                                    <input type="text" class="form-control form-control-sm text-center" id="quantity"
                                        value="1" readonly style="width: 60px;">
                                    <button class="btn btn-outline-secondary" type="button"
                                        onclick="incrementquentity()">+</button>
                                </div>
                            </div>
                            <span id='totalAmount' style="font-size: 1.2rem; font-weight: bold;"></span>
                        </div>

                        <!-- Buttons -->
                        <div class="action-buttons mb-4">
                            <button class="btn btn-primary me-2" type="submit" id="addtocart">Add to Cart</button>
                            <button class="btn btn-success" id="buynow"
                                {{ session()->has('user') ? '' : 'disabled' }}>Buy Now</button>
                        </div>

                        <!-- Product Reviews -->
                        {{-- <div class="product-review mt-3">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="mb-0">Product Reviews</h4>
                                <button class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    onclick="productid({{ $product->id }})">Write Product
                                    Review</button>
                            </div> --}}
                        {{-- model for prodeuct review --}}
                        {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Rate your experience</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('home.productreview') }}" method="post">
                                            @csrf

                                            <div class="modal-body"> --}}
                        {{-- <input type="hidden" name="userId" value="{{ session('user')->id }}"> --}}
                        {{-- <input type="hidden" name="productId" id="productReview">
                                                <textarea class="form-control" name="review" placeholder="Write your feedback here" id="exampleFormControlTextarea1"
                                                    rows="3"></textarea>
                                                <label for="star-rating" class="me-2">Give Stare Rating</label>
                                                <div data-coreui-toggle="rating" data-coreui-value="3"></div>
                                                    <input type="radio" id="star1" name="rating"
                                                        value="1" checked><label for="star">★</label>
                                                    <input type="radio" id="star2" name="rating"
                                                        value="2"><label for="star2">★</label>
                                                    <input type="radio" id="star3" name="rating"
                                                        value="3"><label for="star3">★</label>
                                                    <input type="radio" id="star4" name="rating"
                                                        value="4"><label for="star4">★</label>
                                                    <input type="radio" id="star5" name="rating"
                                                        value="5" ><label for="star5">★</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                        {{-- <h4>Product Reviews</h4> --}}
                        {{-- @if ($product->reviews && $product->reviews->isNotEmpty())
                                @foreach ($product->reviews as $reviewData)
                                    <div class="d-flex align-items-start mb-3">
                                        <img src="{{ asset('user_profile/' . $reviewData->user->pro_pic) }}"
                                            class="me-2" style="width: 40px; height: 40px; border-radius: 50%;"
                                            alt="">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-right mb-1">
                                                <h6 class="mb-0">{{ $reviewData->user->name }}</h6>
                                                <div class="d-flex align-items-center">
                                                    <span class="ms-5">{{ $reviewData->star }}</span>
                                                    <img src="{{ asset('visitor/images/star.svg') }}" alt=""
                                                        style="width: 16px;">
                                                </div>
                                            </div>
                                            <p class="mb-0">{{ $reviewData->message }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @else
                                <p style="font-size: 1rem;">Product reviews not available.</p>
                            @endif
                        </div> --}}

                        <div class="product-review mt-3">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="mb-0">Product Reviews</h4>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    onclick="productid({{ $product->id }})">
                                    Write Product Review
                                </button>
                            </div>

                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('home.productreview') }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Rate your experience</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="productId" id="productReview"
                                                    value="{{ $product->id }}">

                                                <div class="mb-3">
                                                    <label for="review" class="form-label">Your Review</label>
                                                    <textarea class="form-control" name="review" rows="3" placeholder="Write your feedback here" required></textarea>
                                                </div>

                                                {{-- <div class="mb-3">
                                                    <label class="form-label">Star Rating</label><br>
                                                    <div class="rating-stars">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <input type="radio" id="star{{ $i }}"
                                                                name="rating" value="{{ $i }}"
                                                                {{ $i == 1 ? 'checked' : '' }}>
                                                            <label for="star{{ $i }}">★</label>
                                                        @endfor
                                                    </div>
                                                </div> --}}

                                                <label for="star-rating" class="me-2">Give Stare Rating</label>
                                                <div class="star-rating">
                                                    <input type="radio" id="star5" name="rating"
                                                        value="5"><label for="star5">★</label>
                                                    <input type="radio" id="star4" name="rating"
                                                        value="4"><label for="star4">★</label>
                                                    <input type="radio" id="star3" name="rating"
                                                        value="3"><label for="star3">★</label>
                                                    <input type="radio" id="star2" name="rating"
                                                        value="2"><label for="star2">★</label>
                                                    <input type="radio" id="star1" name="rating"
                                                        value="1"><label for="star1">★</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit Review</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @if ($product->reviews && $product->reviews->isNotEmpty())
                                @foreach ($product->reviews as $reviewData)
                                    <div class="d-flex align-items-start mb-3">
                                        <img src="{{ asset('user_profile/' . ($reviewData->user->pro_pic ?? 'default.jpg')) }}"
                                            alt="User Image" class="me-3"
                                            style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">

                                        <div class="w-100">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-0">
                                                    {{ $reviewData->user->name ?? 'Unknown User' }}
                                                    <a href="{{ route('home.deletereview', $reviewData->id) }}"
                                                        class="mx-2 text-danger"
                                                        onclick="return confirm('Are you sure you want to delete this review?');">
                                                        <i class="fa-solid fa-trash text-danger"></i>
                                                    </a>
                                                </h6>


                                                <div class="d-flex align-items-center">
                                                    <span class="text-warning fw-bold me-1">{{ $reviewData->star }}</span>
                                                    <img src="{{ asset('visitor/images/star.svg') }}" alt="Star"
                                                        style="width: 16px;">
                                                </div>
                                            </div>
                                            <p class="mb-0">{{ $reviewData->message }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @else
                                <p class="text-muted">Product reviews not available.</p>
                            @endif
                        </div>


                    </div>


                </div>


            </div>



        </div>




        <div class="row">
            @php
                $filteredSimilarProducts = isset($similarproduct)
                    ? $similarproduct->where('id', '!=', request()->route('id'))
                    : collect();
            @endphp
            @if ($filteredSimilarProducts->isNotEmpty())
                <div class="col-11 py-3">
                    <h3>Similar Products</h3>
                </div>
                @if ($similarproduct->count() >= 5)
                    <div class="row" style="justify-content: space-around; text-align: center;">
                        <div id="productCarousel" class="productCarousel carousel">
                            <div class="product-carousel-inner">
                                @foreach ($similarproduct as $productData)
                                    @if ($productData->id != request()->route('id'))
                                        <a href="{{ route('home.product') }}/{{ $productData->id }}"
                                            class="productlink col-lg-3 col-sm-12">
                                            <div class="product-carousel-item active">
                                                <div class="catcard card p-2">
                                                    <img src="{{ asset($productData->productImages->first()->url) }}"
                                                        class="card-img-top" alt="..." height="180px">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $productData->productName }}</h5>
                                                        <p>{{ $productData->productUnit->first()->unitMaster->unit }}</p>
                                                        <p>₹{{ $productData->productPrice }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <button class="ms-3 product-carousel-control-prev carousel-control-prev" type="button"
                                data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="me-1 product-carousel-control-next carousel-control-next" type="button"
                                data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-start text-center">
                        @foreach ($filteredSimilarProducts as $productData)
                            <div class="col-lg-3 col-sm-6 mb-3">
                                <a href="{{ route('home.product', $productData->id) }}" class="productlink">
                                    <div class="catcard card p-2">
                                        <img src="{{ asset($productData->productImages->first()->url) }}"
                                            class="card-img-top" alt="..." height="180px">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $productData->productName }}</h5>
                                            <p>{{ $productData->productUnit->first()->unitMaster->unit }}</p>
                                            <p>₹{{ $productData->productPrice }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

            @endif

        </div>
        {{-- @endif --}}
    </div>
@endsection

@section('scripts')
    <script>
        let globalSellPrice = 0;
        let unitdata = {};

        // for selecting unit
        function selectedunit(data) {
            $(".card").on("click", function() {
                $(".card").css("border", "1px solid #dee2e6");

                $(this).css("border", "2px solid red");

                $("#quantity").val(1);
            });

            $('#totalAmount').text('₹' + data.sell_price);
            globalSellPrice = data.sell_price;
            unitdata = data;
        }

        // for incries quentity
        function incrementquentity() {
            let quantityField = $("#quantity");
            let currentValue = parseInt(quantityField.val(), 10);
            quantityField.val(currentValue + 1);

            let totalamount = (currentValue + 1) * globalSellPrice;

            $('#totalAmount').text('₹' + totalamount);

        }

        // for decries quentity
        function decrementquentity() {
            let quantityField = $("#quantity");
            let currentValue = parseInt(quantityField.val(), 10);
            if (currentValue > 1) {
                quantityField.val(currentValue - 1);
                let totalamount = (currentValue - 1) * globalSellPrice;
                $('#totalAmount').text('₹' + totalamount);
            }
        }

        // for select first unit on page loade
        document.addEventListener('DOMContentLoaded', function() {
            var firstUnit = @json($product->productUnit->first()); // Get the first unit from your PHP variable
            selectedunit(firstUnit); // Call the function with first unit data

            $(".card:first").trigger("click");

        });

        // $(document).ready(function() {
        //     $('#addtocart').on('click', function(unitdata) {
        //         console.log(unitdata);

        //         let quantityField = $("#quantity");
        //         let currentValue = parseInt(quantityField.val(), 10);

        //         $.ajax({
        //             url: '/addtocart',
        //             method: 'POST',
        //             headers: {
        //                 "X-CSRF-TOKEN": "{{ csrf_token() }}" // CSRF Token for security
        //             },
        //             data: {
        //                 unit: unitdata.id,
        //                 quantity: currentValue
        //             },
        //             success: function(response) {
        //                 console.log("Added to Cart:", response);
        //                 alert("Item added to cart successfully!");
        //             },
        //         })
        //     });
        // });

        // for add to cart
        $(document).ready(function() {
            $("#addtocart").on("click", function() {
                let quantityField = $("#quantity");
                let currentValue = parseInt(quantityField.val(), 10);

                let totalamount = $('#totalAmount').text().replace(/[^\d.]/g, '');

                if (!unitdata || !unitdata.id) {
                    alert("Please select a unit first!");
                    return;
                }

                $.ajax({
                    url: "{{ route('home.addtocart') }}",
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        unit_id: unitdata,
                        quantity: currentValue,
                        total_amount: totalamount
                    },
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









        $(document).ready(function() {
            $("#buynow").on("click", function() {
                let quantityField = $("#quantity");
                let currentValue = parseInt(quantityField.val(), 10);

                let totalamount = $('#totalAmount').text().replace(/[^\d.]/g, '');

                if (!unitdata || !unitdata.id) {
                    alert("Please select a unit first!");
                    return;
                }

                $.ajax({
                    url: "{{ route('home.addtocart') }}", // Ensure this URL is correct for your 'buynow' functionality
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        unit_id: unitdata,
                        quantity: currentValue,
                        total_amount: totalamount
                    },
                    success: function(response) {
                        console.log("Item purchased:", response.message);
                        alert(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                        alert("There was an error while processing your request.");
                    }
                });
            });
        });







        function productid(id) {
            document.getElementById('productReview').value = id;
        }





        src="https://cdn.jsdelivr.net/npm/sweetalert2@11"


    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-review');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const reviewId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to the delete route
                        window.location.href = `/deletereview/${reviewId}`;
                    }
                });
            });
        });
    });


    </script>
@endsection
