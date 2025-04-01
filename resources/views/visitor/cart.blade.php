@extends('visitor.layouts.app')
@section('content')
    <div class="container-fluid" style="background-color: #EAEDED;">
        <div class="row justify-content-between">
            {{-- left column --}}
            <div class="col-lg-9 col-sm-12 p-3">
                @foreach ($cart as $cartData)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-2 d-flex justify-content-center py-3">
                                <img src="{{ asset($cartData->products->image) }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-10">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="productdetail">
                                        <h5 class="card-title">{{ $cartData->products->productName }}</h5>
                                        <p> {{ $cartData->units->unitMaster->unit }} </p>
                                    </div>
                                    <div class="price">
                                        <h5 class="card-title" id='totalAmount'>{{ $cartData->price }}</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="price-section mb-2 d-flex ">
                                        <div class="col-lg-2 col-sm-2 me-2">
                                            <div class="input-group">
                                                <!-- Decrement Button -->
                                                <button class="btn btn-outline-secondary" type="button"
                                                    onclick="decrementquentity()" id="decrement-btn">
                                                    -
                                                </button>
                                                <!-- Quantity Display -->
                                                <input type="text" class="form-control text-center px-0" id="quantity"
                                                    value="{{ $cartData->qty }}" readonly aria-label="Quantity"
                                                    aria-describedby="quantity">
                                                <!-- Increment Button -->
                                                <button class="btn btn-outline-secondary" type="button"
                                                    onclick="incrementquentity()" id="increment-btn">
                                                    +
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-1">
                                            <a href=""> delete </a>
                                        </div>
                                        {{-- <span id='totalAmount' style="font-size: 1.2rem; font-weight: bold;">₹ 50</span> --}}
                                    </div>


                                    {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-3 col-sm-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <h6>Price Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="price d-flex justify-content-between">
                            <p> Price (1 item) </p>
                            <p> 500 </p>
                        </div>
                        <div class="dellivercharges d-flex justify-content-between">
                            <p> Delivery Charges </p>
                            <p> 50 </p>
                        </div>
                        <div class="totalamount d-flex justify-content-between py-3" style="border-top: 1px dashed #e0e0e0">
                            <h6> Total Amount </h6>
                            <h6> 500 </h6>
                        </div>
                        <div class="paymentmethod">
                            <select name="paymentmethod" class="form-select " aria-label="Large select example"
                                id="">
                                <option value="" disabled selected>Select Payment Method</option>
                                <option value="">Case On Delevery</option>
                                <option value="">Pay Online</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-9 col-sm-12">
                <div class="card my-3">
                    <div class="card-body">
                        <div class="row">
                            <h3 class="card-title">Shopping Cart</h3>
                            <hr class="sidebar-divider d-none d-md-block">
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-2 d-flex">
                                <input class="form-check-input me-1" type="checkbox" value="" id="flexCheckDefault">
                                <img src="AashirvaadAtta.jpeg" alt="" height="180px" width="180px">
                            </div>
                            <div class="col d-flex flex-column ms-1">
                                <div class="row">
                                    <h6>AashirvaadAtta</h6>
                                </div>
                                <div class="row">
                                    <p>25g</p>
                                </div>
                                <div class="row mb-1 mt-auto">
                                    <div class="col-4 d-flex">
                                        <div class="input-group">
                                            <!-- Decrement Button -->
                                            <button class="btn btn-outline-secondary" type="button" id="decrement-btn">
                                                -
                                            </button>
                                            <!-- Quantity Display -->
                                            <input type="text" class="form-control text-center" id="quantity"
                                                value="1" readonly aria-label="Quantity" aria-describedby="quantity">
                                            <!-- Increment Button -->
                                            <button class="btn btn-outline-secondary" type="button" id="increment-btn">
                                                +
                                            </button>
                                            <!-- </div> -->
                                        </div>
                                        <div class="col">
                                            <a href=""> delete </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <h6>₹ 260.00</h6>
                                </div>
                                <hr class="sidebar-divider d-none d-md-block my-2">
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-2 d-flex">
                                    <input class="form-check-input me-1" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <img src="AashirvaadAtta.jpeg" alt="" height="180px" width="180px">
                                </div>
                                <div class="col d-flex flex-column ms-1">
                                    <div class="row">
                                        <h6>AashirvaadAtta</h6>
                                    </div>
                                    <div class="row">
                                        <p>25g</p>
                                    </div>
                                    <div class="row mb-1 mt-auto">
                                        <div class="col-2">
                                            <div class="input-group">
                                                <!-- Decrement Button -->
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="decrement-btn">
                                                    -
                                                </button>
                                                <!-- Quantity Display -->
                                                <input type="text" class="form-control text-center" id="quantity"
                                                    value="1" readonly aria-label="Quantity"
                                                    aria-describedby="quantity">
                                                <!-- Increment Button -->
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="increment-btn">
                                                    +
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a href=""> delete </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <h6>₹ 260.00</h6>
                                </div>
                                <hr class="sidebar-divider d-none d-md-block my-2">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-sm-12 d-flex justify-content-end">
                    <div class="card my-3" style="width: 379px;">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body d-flex flex-column">
                            <div class="row">
                                <div class="col-9">
                                    <div class="progress" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                        aria-valuemax="100">
                                        <div class="progress-bar" style="width: 87%;" aria-valuenow="40"></div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <h6>₹ 260.00</h6>
                                </div>
                            </div>
                            <div class="row">
                                <p class="card-text">Add items worth ₹300.00 for FREE Delivery</p>
                            </div>

                            <div class="row mt-auto">
                                <h5>Subtotal (1 item): ₹260.00</h5>
                            </div>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    @endsection
