@extends('visitor.layouts.app')
@section('content')
    <style>
        .review-user-image {
            /* border: 1px solid black; */
            border-radius: 50%;
            height: 34px;
            margin-right: 10px
        }
    </style>

    <div class="container-fluid">
        <div class="row px-3 my-3 mx-5">
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
                                <img src="{{ asset($productImage->url) }}" alt="Product Image" height="499px" width="683">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <!-- Product Image -->
                {{-- <img src="AashirvaadAtta.jpeg" alt="Product Image"
                    style="height: 480px; width: 480px; object-fit: contain;"> --}}

            </div>

            <!-- Right Column (Product Details) -->
            <div class="col-md-6 d-flex flex-column"
                style="border-top: 1px solid rgb(242, 242, 242); 
                   border-left: 1px solid rgb(242, 242, 242); 
                   border-bottom: 1px solid rgb(242, 242, 242); 
                   padding: 20px;">
                <h2 style="font-size: 1.5rem; font-weight: bold;">{{ $product->productName }}</h2>

                <!-- Product Features / Description -->
                <p style="font-size: 1rem; color: #555;">{!! $product->productDescription !!}</p>

                <div class="row mt-auto">
                    {{-- product units --}}
                    <div class="unit  mb-2">
                        <h5 class="mb-1">Select Unit</h5>
                        <div class="unit-section d-flex" style="gap: 6px">
                            @foreach ($product->productUnit as $unitData)
                                <div class="card">
                                    <div class="card-body p-2">
                                        <h6>{{ $unitData->unitMaster->unit }}</h6>
                                        <p>₹ {{ $unitData->sell_price }} <span
                                                style="text-decoration-line: line-through; color: gray">₹
                                                {{ $unitData->price }}</span></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Section -->
                    <div class="price-section mb-2 d-flex">
                        <div class="col-2">
                            <div class="input-group" style="width: 100px;">
                                <!-- Decrement Button -->
                                <button class="btn btn-outline-secondary" type="button" id="decrement-btn">
                                    -
                                </button>
                                <!-- Quantity Display -->
                                <input type="text" class="form-control text-center" id="quantity" value="1"
                                    readonly aria-label="Quantity" aria-describedby="quantity">
                                <!-- Increment Button -->
                                <button class="btn btn-outline-secondary" type="button" id="increment-btn">
                                    +
                                </button>
                            </div>
                        </div>
                        <span style="font-size: 1.2rem; font-weight: bold;">₹ 50</span>
                    </div>

                    <!-- Add to Cart / Buy Now Buttons -->
                    <div class="action-buttons">
                        <button class="btn btn-primary" style="padding: 10px 20px; font-size: 1rem; margin-right: 10px;">Add
                            to Cart</button>
                        <button class="btn btn-success" style="padding: 10px 20px; font-size: 1rem;">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row px-3">
            <div class="row mb-3">
                <h3>Product Review</h3>
            </div>

            <div class="product-review row mb-4">
                @if ($product->reviews && $product->reviews->isNotEmpty())
                    @foreach ($product->reviews as $reviewData)
                        <div class="row mb-2">
                            <div class="col-11 d-flex">
                                <img src="{{ asset('user_profile/' . $reviewData->user->pro_pic) }}"
                                    class="review-user-image" alt="">

                                <h6>{{ $reviewData->user->name }}</h6>
                            </div>
                            <div class="col-1 text-end">
                                <p>{{ $reviewData->star }} <span><img src="{{ asset('visitor/images/star.svg') }}"
                                            alt=""></span> </p>
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
        </div>

        {{-- similar Products --}}
        <div class="row">
            <div class="row">
                <div class="col-11">
                    <h3>Similar Products</h3>
                </div>
                {{-- <div class="col">
                    <a href="">view all</a>
                </div> --}}
            </div>
            <div class="row" style="justify-content: space-around; text-align: center;">
                <div id="productCarousel" class="productCarousel carousel">
                    <div class="product-carousel-inner">
                        @foreach ($similarproduct as $productData)
                            <a href="{{ route('home.product') }}/{{ $productData->id }}"
                                class="productlink col-lg-3 col-sm-12">
                                <div class="product-carousel-item active">
                                    <div class="catcard card p-2">
                                        <img src="{{ asset($productData->productImages->first()->url) }}"
                                            class="card-img-top" alt="..." height="280px">
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
    </div>
@endsection
