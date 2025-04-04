@extends('visitor.layouts.app')
@section('content')
    <div class="container-fluid" style="background-color: #EAEDED;">
        <div class="row justify-content-between">
            {{-- left column --}}
            <div class="col-lg-9 col-sm-12 p-3">
                @if (Auth::user() && Auth::user() != null)
                    @foreach ($cart as $key => $cartData)
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
                                            <h5 class="card-title productTotalAmount"
                                                id='productTotalAmount.{{ $key }}'>₹
                                                {{ $cartData->price }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="price-section mb-2 d-flex ">
                                            <div class="col-lg-2 col-sm-2 me-2">
                                                <div class="input-group">
                                                    <!-- Decrement Button -->
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        onclick="decrementQuantity({{ $key }})" id="decrement-btn">
                                                        -
                                                    </button>
                                                    <input type="hidden" id="sellprice.{{ $key }}"
                                                        value={{ $cartData->units->sell_price }}>
                                                    <!-- Quantity Display -->
                                                    <input type="text" class="form-control text-center px-0"
                                                        id="quantity.{{ $key }}" value="{{ $cartData->qty }}"
                                                        readonly aria-label="Quantity" aria-describedby="quantity">
                                                    <!-- Increment Button -->
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        onclick="incrementQuantity({{ $key }})"
                                                        id="increment-btn">
                                                        +
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-sm-1">
                                                <a href="{{ route('home.deletecart') }}/{{ $cartData->id }}">delete</a>
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
                @endif
            </div>

            @if(Auth::user() && Auth::user() != null)
            <div class="col-lg-3 col-sm-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <h6>Price Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="price d-flex justify-content-between">
                            <p> Price (<span id="totalProduct"></span> item) </p>
                            <p id="totalPrice"> ₹ 500 </p>
                        </div>
                        <div class="dellivercharges d-flex justify-content-between">
                            <p> Delivery Charges </p>
                            <p id="delivercharges"> ₹ 50 </p>
                        </div>
                        <div class="totalamount d-flex justify-content-between py-3" style="border-top: 1px dashed #e0e0e0">
                            <h6> Total Amount </h6>
                            <h6 id="totalBillAmmount"> ₹ 500 </h6>
                        </div>

                        <div class="address py-3" style="border-top: 1px dashed #e0e0e0;">
                            <h6>Select Delivery address</h6>
                            @foreach ($address as $addressData)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="{{ $addressData->id }}"
                                        name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">

                                        {{-- <input class="form-check-input" type="checkbox" value="{{ $addressData->id }}"
                                        id="flexCheckChecked.{{ $addressData->id }}">
                                    <label class="form-check-label" for="flexCheckChecked.{{ $addressData->id }}"> --}}
                                        <span>{{ $addressData->address_line1 }}</span>,
                                        <span>{{ $addressData->address_line2 }}</span>,
                                        <span>{{ $addressData->landmark->landmark_eng }}</span>,
                                        <span>{{ $addressData->pincode }}</span>.
                                    </label>
                                </div>
                            @endforeach
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
            @endif

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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            function incrementQuantity(key) {
                let quantityField = document.getElementById(`quantity.${key}`);
                let sellprice = document.getElementById(`sellprice.${key}`).value;
                let totalAmountField = document.getElementById(`productTotalAmount.${key}`);

                let currentValue = parseInt(quantityField.value, 10);
                let newValue = currentValue + 1;
                quantityField.value = newValue;

                let totalAmount = newValue * sellprice;

                totalAmountField.textContent = '₹ ' + totalAmount;

                totalAmmount();
            }

            function decrementQuantity(key) {
                let quantityField = document.getElementById(`quantity.${key}`);
                let sellprice = document.getElementById(`sellprice.${key}`).value;
                let totalAmountField = document.getElementById(`productTotalAmount.${key}`);

                let currentValue = parseInt(quantityField.value, 10);
                if (currentValue > 1) {
                    let newValue = currentValue - 1;
                    quantityField.value = newValue;

                    let totalAmount = newValue * sellprice;
                    totalAmountField.textContent = '₹ ' + totalAmount;

                    totalAmmount();
                }
            }

            function totalAmmount() {
                let total = 0;
                let productTotal = document.querySelectorAll('.productTotalAmount');
                let deliverchargeText = document.getElementById('delivercharges').textContent.trim();
                let delivercharge = parseFloat(deliverchargeText.replace(/₹/g, '').replace(/,/g, ''));
                let productCount = productTotal.length;

                productTotal.forEach((element) => {
                    let priceText = element.textContent.trim();
                    let numericValue = parseFloat(priceText.replace(/₹/g, '').replace(/,/g,
                        '')); // Remove ₹ and commas, convert to number

                    if (!isNaN(numericValue)) { // Check if it's a valid number
                        total += numericValue;
                    }
                });

                document.getElementById('totalProduct').textContent = productCount;
                document.getElementById('totalPrice').textContent = "₹" + total;
                document.getElementById('totalBillAmmount').textContent = '₹' + (total + delivercharge);
            }

            // function removeFromCart(cartId) {
            //     $.ajax({
            //         url: `deletecart/${cartId}`,
            //         method: "GET",
            //         success: function(response) {
            //             console.log("Remove from Cart:", response.message);
            //             alert(response.message);
            //         },
            //         error: function(xhr, status, error) {
            //             console.error("Error:", error);
            //             alert("Failed to remove item from cart.");
            //         }
            //     });
            // }

            document.addEventListener('DOMContentLoaded', function() {
                totalAmmount();
            });
        </script>
    @endsection
