@extends('visitor.layouts.app')
@section('content')
    <div class="container-fluid d-flex justify-content-center" style="background-color: #EAEDED; min-height: 640px;">
        @if (session()->has('user'))
            @if (count($cart) > 0)
                <div class="row justify-content-between w-100">

                    {{-- left column --}}
                    <div class="col-lg-9 col-sm-12 p-3">
                        @foreach ($cart as $key => $cartData)
                            @if ($cartData->products != null && $cartData->units != null)
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-2 d-flex justify-content-center py-3">
                                            <img src="{{ asset($cartData->products->image) }}" class="img-fluid rounded-start"
                                                alt="..." style="max-height: 185px;">
                                        </div>
                                        <div class="col-md-10">
                                            <div class="card-header d-flex justify-content-between">
                                                <div class="productdetail">
                                                    <h5 class="card-title">{{ $cartData->products->productName }}</h5>
                                                    <p> {{ $cartData->units->unitMaster->unit }} </p>
                                                </div>
                                                <div class="price">
                                                    <h5 class="card-title productTotalAmount">₹
                                                        <span id='productTotalAmount.{{ $key }}'>
                                                            {{ $cartData->units->sell_price }}
                                                        </span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="price-section mb-2 d-flex ">
                                                    <div class="col-lg-2 col-sm-2 me-2">
                                                        <div class="input-group">
                                                            <!-- Decrement Button -->
                                                            <button class="btn btn-outline-secondary" type="button"
                                                                onclick="decrementQuantity({{ $key }})"
                                                                id="decrement-btn">
                                                                -
                                                            </button>
                                                            <input type="hidden" id="sellprice.{{ $key }}"
                                                                value={{ $cartData->units->sell_price }}>
                                                            <!-- Quantity Display -->
                                                            <input type="text"
                                                                class="form-control text-center px-0 quantity"
                                                                id="quantity.{{ $key }}"
                                                                value="{{ $cartData->qty }}" readonly aria-label="Quantity"
                                                                aria-describedby="quantity">
                                                            <!-- Increment Button -->
                                                            <button class="btn btn-outline-secondary" type="button"
                                                                onclick="incrementQuantity({{ $key }})"
                                                                id="increment-btn">
                                                                +
                                                            </button>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-1 col-sm-1">
                                                        <a
                                                            href="{{ route('home.deletecart') }}/{{ $cartData->id }}">delete</a>
                                                    </div> --}}
                                                    <div class="col-lg-1 col-sm-1">
                                                        <a href="{{ route('home.deletecart', $cartData->id) }}">
                                                            <i class="fa-solid fa-trash text-danger my-1 mx-2" style="height: 25px"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    {{-- right column --}}
                    <div class="col-lg-3 col-sm-12 p-3">
                        <form action="{{ route('home.order') }}" method="post">
                            @csrf

                            <input type="hidden" name="userId" value="{{ session('user')->id }}">
                            @foreach ($cart as $key => $cartData)
                                @if ($cartData->products && $cartData->units)
                                    <input type="hidden" name="productId[]" value="{{ $cartData->productId }}">
                                    <input type="hidden" name="productQty[]" id="productQuantity.{{ $key }}">
                                    <input type="hidden" name="productPrice[]" value="{{ $cartData->units->sell_price }}">
                                    <input type="hidden" name="productUnit[]" value="{{ $cartData->unit }}">
                                @endif
                            @endforeach
                            <div class="card">
                                <div class="card-header">
                                    <h6>Price Details</h6>
                                </div>
                                <div class="card-body">
                                    <div class="price d-flex justify-content-between">
                                        <p> Price (<span id="totalProduct"></span> item) </p>
                                        <p> ₹ <span id="totalPrice"></span> </p>
                                        <input type="hidden" name="totalPrice" id='totalPriceInput'>
                                    </div>
                                    <div class="discountpoint d-flex justify-content-between">
                                        <p>Discount Point</p>
                                        <p> <span id="pointper"> {{ $pointper->per }} </span> % </p>
                                        <input type="hidden" id='pointperInput' name="pointper"
                                            value=" {{ $pointper->per }} ">
                                    </div>
                                    <div class="dellivercharges d-flex justify-content-between">
                                        <p> Delivery Charges </p>
                                        <p> ₹ <span id="delivercharges"> 00 </span></p>
                                    </div>
                                    <div class="totalamount d-flex justify-content-between py-3"
                                        style="border-top: 1px dashed #e0e0e0">
                                        <h6> Total Amount </h6>
                                        <h6> ₹ <span id="totalBillAmmount"> </span></h6>
                                        <input type="hidden" name="totalBillAmmount" id='totalBillAmmountInput'>
                                    </div>

                                    {{-- <div class="address py-3" style="border-top: 1px dashed #e0e0e0;">
                                        <h6>Select Delivery address</h6>
                                        @foreach ($address as $addressData)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    value="{{ $addressData->id }}" name="addressId" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    <span>{{ $addressData->address_line1 }}</span>,
                                                    <span>{{ $addressData->address_line2 }}</span>,
                                                    <span>{{ $addressData->landmark->landmark_eng }}</span>,
                                                    <span>{{ $addressData->pincode }}</span>.
                                                </label>
                                            </div>
                                            <div class="ps-4 mb-2">
                                                <a href="{{ route('visitor.editaddress') }}/{{ $addressData->id }}">Edit
                                                    address</a>
                                            </div>
                                        @endforeach
                                    </div> --}}

                                    <div class="address py-3" style="border-top: 1px dashed #e0e0e0;">
                                        <h6>Select Delivery address</h6>


                                        @foreach ($address as $addressData)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="addressId"
                                                    value="{{ $addressData->id }}" id="address{{ $addressData->id }}"
                                                    {{ old('addressId') == $addressData->id ? 'checked' : '' }}>
                                                <label class="form-check-label" for="address{{ $addressData->id }}">
                                                    {{ $addressData->address_line1 }},
                                                    {{ $addressData->address_line2 }},
                                                    {{ $addressData->landmark->landmark_eng }},
                                                    {{ $addressData->pincode }}.
                                                </label>
                                            </div>
                                            @if ($errors->has('addressId'))
                                                <div class="text-danger mb-2">{{ $errors->first('addressId') }}</div>
                                            @endif
                                            <div class="my-2 mb-2">
                                                <a class="btn btn-success" href="{{ route('visitor.editaddress', $addressData->id) }}">Edit
                                                    address</a>
                                            </div>
                                        @endforeach
                                    </div>


                                    {{-- <div class="deliveryslot">
                                <h6>Select Delivery slot</h6>
                                <select name="deliveryslot" class="form-select mb-3" aria-label="Large select example"
                                    id="">
                                    <option value="" disabled selected>Select delivery slot</option>
                                    @foreach ($deliveryslot as $deleverySlotData)
                                        <option value="{{ $deleverySlotData->id }}">{{ $deleverySlotData->startTime }} -
                                            {{ $deleverySlotData->endTime }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                                    {{-- <div class="paymentmethod mb-3">
                                        <h6>Select payment method</h6>
                                        <select name="paymentmethod" class="form-select " aria-label="Large select example"
                                            id="">
                                            <option value="" disabled selected>Select Payment Method</option>
                                            <option value="1">Case On Delevery</option>
                                            <option value="2">Pay Online</option>
                                        </select>
                                    </div> --}}

                                    <div class="paymentmethod mb-3">
                                        <h6>Select payment method</h6>


                                        <select name="paymentmethod" class="form-select" aria-label="Select Payment Method">
                                            <option value="" disabled
                                                {{ old('paymentmethod') == '' ? 'selected' : '' }}>Select Payment Method
                                            </option>
                                            <option value="1" {{ old('paymentmethod') == '1' ? 'selected' : '' }}>
                                                Cash On Delivery</option>
                                            <option value="2" {{ old('paymentmethod') == '2' ? 'selected' : '' }}>Pay
                                                Online</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('paymentmethod'))
                                        <div class="text-danger mb-2">{{ $errors->first('paymentmethod') }}</div>
                                    @endif


                                    <div class="placeorder">
                                        <button class="btn btn-success" type="submit"> Place Order </button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
            @else
                <div class="d-flex gap-1 align-items-center">
                    <span> Your cart is empty whould you like to <a href="{{ route('visitor.index') }}">continue
                            shopping</a></span>
                </div>
            @endif
        @endif
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
            document.getElementById(`productQuantity.${key}`).value = newValue;

            let totalAmount = newValue * sellprice;

            totalAmountField.textContent = totalAmount;

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
                totalAmountField.textContent = totalAmount;

                totalAmmount();
            }
        }

        function totalAmmount() {
            let total = 0;
            let productTotal = document.querySelectorAll('.productTotalAmount');
            let delivercharge = parseFloat(document.getElementById('delivercharges').textContent);
            let pointper = parseFloat(document.getElementById('pointper').textContent);
            let productCount = productTotal.length;

            productTotal.forEach((element) => {
                let priceText = element.textContent.trim();
                let numericValue = parseFloat(priceText.replace(/₹/g, '').replace(/,/g,
                    '')); // Remove ₹ and commas, convert to number

                if (!isNaN(numericValue)) { // Check if it's a valid number
                    total += numericValue;
                }
            });

            document.getElementById('totalPrice').textContent = total;
            document.getElementById('totalPriceInput').value = total;

            if (pointper != 0 && pointper != null) {
                total = (total * pointper) / 100;
            }

            document.getElementById('totalProduct').textContent = productCount;
            document.getElementById('totalBillAmmount').textContent = total + delivercharge;
            document.getElementById('totalBillAmmountInput').value = total + delivercharge;

            // for final quentity of each product
            let productQuantity = document.querySelectorAll('.quantity');
            productQuantity.forEach((element, index) => {
                let quantityValue = element.value;
                let hiddenInput = document.getElementById(`productQuantity.${index}`);

                if (hiddenInput) {
                    hiddenInput.value = quantityValue;
                }
            });

        }

        document.addEventListener('DOMContentLoaded', function() {
            totalAmmount();
        });
    </script>
@endsection
