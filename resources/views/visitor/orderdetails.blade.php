@extends('visitor.layouts.app')
@section('content')
    <style>
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

    <div class="order-details-container container sm-px-0">
        @if (session('user'))
            <h1>Order Details</h1>
            <div class="d-flex justify-content-between mb-2">
                <p>Order Placed {{ \Carbon\Carbon::parse($order->orderDate)->format('j F Y') }} | order number 1</p>
                <a href="{{ route('home.invoice') }}/{{ $order->id }}" class="btn btn-primary"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Pdf</a>
            </div>

            {{-- <div class="orderStatus my-4">
                <h5>Order Status</h5>
                <div class="container pt-4">
                    <div class="d-flex flex-md-row flex-column justify-content-between align-items-md-center position-relative gap-4">
            
                        <!-- Progress Line Background -->
                        <div class="position-absolute start-0 w-100 translate-middle-y bg-light d-none d-md-block"
                            style="height: 4px; z-index: 0; top: 32%;"></div>
            
                        <!-- Progress Line Fill (you can adjust width dynamically) -->
                        <div class="position-absolute start-0 translate-middle-y bg-danger d-none d-md-block"
                            id="progress-fill" style="height: 4px; width: 1%; z-index: 1; top: 32%;"></div>
            
                        <!-- Step 1 -->
                        <div class="d-flex flex-md-column flex-row align-items-center text-center position-relative" style="z-index: 2;">
                            <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;">
                                <i class="fa-regular fa-clock"></i>
                            </div>
                            <small class="mt-md-2 ms-2 ms-md-0">Pending</small>
                        </div>
            
                        <!-- Step 2 -->
                        <div class="d-flex flex-md-column flex-row align-items-center text-center position-relative" style="z-index: 2;">
                            <div class="rounded-circle d-flex align-items-center justify-content-center 
                                {{ in_array($order->order_status, ['confirm', 'out for delivery', 'delivered']) ? 'text-white bg-danger' : 'bg-light text-dark' }}"
                                style="width: 40px; height: 40px;">
                                <i class="fas fa-check"></i>
                            </div>
                            <small class="mt-md-2 ms-2 ms-md-0">Order confirmed</small>
                        </div>
            
                        <!-- Step 3 -->
                        <div class="d-flex flex-md-column flex-row align-items-center text-center position-relative" style="z-index: 2;">
                            <div class="rounded-circle d-flex align-items-center justify-content-center 
                                {{ in_array($order->order_status, ['out for delivery', 'delivered']) ? 'text-white bg-danger' : 'bg-light text-dark' }}"
                                style="width: 40px; height: 40px;">
                                <i class="fas fa-truck"></i>
                            </div>
                            <small class="mt-md-2 ms-2 ms-md-0">Out for delivery</small>
                        </div>
            
                        <!-- Step 4 -->
                        <div class="d-flex flex-md-column flex-row align-items-center text-center position-relative" style="z-index: 2;">
                            <div class="rounded-circle d-flex align-items-center justify-content-center 
                                {{ $order->order_status == 'delivered' ? 'text-white bg-danger' : 'bg-light text-dark' }}"
                                style="width: 40px; height: 40px;">
                                <i class="fas fa-box"></i>
                            </div>
                            <small class="mt-md-2 ms-2 ms-md-0">Delivered</small>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="card">
                <div class="card-body row">
                    <div class="col-lg-4 col-md-6 my-2">
                        <h6> Shipping Address</h6>
                        <p class="my-0"> {{ session('user')->name }} </p>
                        <p class="my-0"> {{ $order->addressLine1 }} </p>
                        <p class="my-0"> {{ $order->addressLine2 }} </p>
                        <p class="my-0"> {{ $order->landmark }} | {{ $order->area }} </p>
                        <p class="my-0"> {{ $order->city }} {{ $order->pincode }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 my-2">
                        <h6>Payment Method</h6>
                        <p class="my-0"> {{ $order->payment_mode }} </p>
                    </div>
                    <div class="col-lg-4 my-2">
                        <h6>Bill Details</h6>
                        <div class="price d-flex justify-content-between">
                            <p class="my-0"> Price </p>
                            <p class="my-0"> ₹ {{ $order->total_order_amt }} </p>
                        </div>
                        <div class="discountpoint d-flex justify-content-between">
                            <p class="my-0">Discount Point</p>
                            <p class="my-0"> {{ $order->dis_amt_point }} % </p>
                        </div>
                        <div class="dellivercharges d-flex justify-content-between">
                            <p class="my-0"> Delivery Charges </p>
                            <p class=""> ₹ 00</p>
                        </div>
                        <div class="totalamount d-flex justify-content-between py-3" style="border-top: 1px dashed #e0e0e0">
                            <h6> Total Amount </h6>
                            <h6> ₹ {{ $order->total_bill_amt }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body py-0">
                    @foreach ($order->orderDetails as $index => $orderData)
                        <div class="row border-top py-3">
                            <div class="orderStatus my-4">
                                <h5>Order Status</h5>
                                <div class="container pt-4">
                                    <div
                                        class="d-flex flex-md-row flex-column justify-content-between align-items-md-center position-relative gap-4">

                                        {{-- Horizontal Progress Line for Desktop --}}
                                        <div class="position-absolute start-0 w-100 translate-middle-y bg-light d-none d-md-block"
                                            style="height: 4px; z-index: 0; top: 28%;"></div>

                                        <div class="position-absolute start-0 translate-middle-y bg-danger d-none d-md-block"
                                            data-progress-fill data-status="{{ $orderData->trackorder->orderStatus }}"
                                            style="height: 4px; width: 1%; z-index: 1; top: 28%;"></div>

                                        {{-- Vertical Progress Line for Mobile --}}
                                        <div class="position-absolute top-0 h-100 translate-middle-x bg-light d-md-none"
                                            style="width: 4px; z-index: 0; left: 21px;"></div>

                                        <div class="position-absolute top-0 translate-middle-x bg-danger d-md-none"
                                            data-progress-fill-mobile
                                            data-status="{{ $orderData->trackorder->orderStatus }}"
                                            style="width: 4px; height: 1%; z-index: 1; left: 21px;"></div>

                                        <!-- Step 1: Pending -->
                                        <div class="d-flex flex-md-column flex-row align-items-md-center align-items-start text-md-center position-relative gap-2"
                                            style="z-index: 2;">
                                            <div class="d-flex align-items-center">
                                                <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="fa-regular fa-clock"></i>
                                                </div>
                                                <small class="d-md-none ms-2">Pending</small>
                                            </div>
                                            <small class="d-none d-md-block mt-2">Pending</small>
                                        </div>

                                        <!-- Step 2: Order Confirmed -->
                                        <div class="d-flex flex-md-column flex-row align-items-md-center align-items-start text-md-center position-relative gap-2"
                                            style="z-index: 2;">
                                            <div class="d-flex align-items-center">
                                                <div class="rounded-circle d-flex align-items-center justify-content-center 
                                                    {{ in_array($orderData->trackorder->orderStatus, ['confirm', 'out for delivery', 'delivered']) ? 'bg-danger text-white' : 'bg-light text-dark' }}"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                                <small class="d-md-none ms-2">Order Confirmed</small>
                                            </div>
                                            <small class="d-none d-md-block mt-2">Order Confirmed</small>
                                        </div>

                                        <!-- Step 3: Out for Delivery -->
                                        <div class="d-flex flex-md-column flex-row align-items-md-center align-items-start text-md-center position-relative gap-2"
                                            style="z-index: 2;">
                                            <div class="d-flex align-items-center">
                                                <div class="rounded-circle d-flex align-items-center justify-content-center 
                                                    {{ in_array($orderData->trackorder->orderStatus, ['out for delivery', 'delivered']) ? 'bg-danger text-white' : 'bg-light text-dark' }}"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="fas fa-truck"></i>
                                                </div>
                                                <small class="d-md-none ms-2">Out for Delivery</small>
                                            </div>
                                            <small class="d-none d-md-block mt-2">Out for Delivery</small>
                                        </div>

                                        <!-- Step 4: Delivered -->
                                        <div class="d-flex flex-md-column flex-row align-items-md-center align-items-start text-md-center position-relative gap-2"
                                            style="z-index: 2;">
                                            <div class="d-flex align-items-center">
                                                <div class="rounded-circle d-flex align-items-center justify-content-center 
                                                    {{ $orderData->trackorder->orderStatus === 'delivered' ? 'bg-danger text-white' : 'bg-light text-dark' }}"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="fas fa-box"></i>
                                                </div>
                                                <small class="d-md-none ms-2">Delivered</small>
                                            </div>
                                            <small class="d-none d-md-block mt-2">Delivered</small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="product-image d-flex align-items-center justify-content-center col-lg-2">
                                <img src="{{ asset($orderData->product->image) }}" alt="" class=""
                                    style="max-height: 150px">
                            </div>
                            <div class="col-lg-8 px-2">
                                <div class="product-details">
                                    <h6>{{ $orderData->product->productName }}</h6>
                                    <p>{!! $orderData->product->productDescription !!}</p>
                                    <p class="m-0">{{ $orderData->Unit->unitMaster->unit }} ({{ $orderData->qty }} qty)
                                    </p>
                                    <p>₹ {{ $orderData->total }}</p>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('home.product') }}/{{ $orderData->product->id }}"
                                        class="btn btn-success">Order Again</a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    onclick="productid({{ $orderData->product->id }})">Write Product
                                    Review</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- model for prodeuct review --}}
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Rate your experience</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('home.productreview') }}" method="post">
                            @csrf

                            <div class="modal-body">
                                <input type="hidden" name="userId" value="{{ session('user')->id }}">
                                <input type="hidden" name="productId" id="productReview">
                                <textarea class="form-control" name="review" placeholder="Write your feedback here"
                                    id="exampleFormControlTextarea1" rows="3"></textarea>
                                <label for="star-rating" class="me-2">Give Stare Rating</label>
                                <div class="star-rating">
                                    <input type="radio" id="star5" name="rating" value="5"><label
                                        for="star5">★</label>
                                    <input type="radio" id="star4" name="rating" value="4"><label
                                        for="star4">★</label>
                                    <input type="radio" id="star3" name="rating" value="3"><label
                                        for="star3">★</label>
                                    <input type="radio" id="star2" name="rating" value="2"><label
                                        for="star2">★</label>
                                    <input type="radio" id="star1" name="rating" value="1"><label
                                        for="star1">★</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <h1>Hello</h1>
        @endif
    </div>

    {{-- @php
        $statuses = $order->orderDetails->map(fn($item) => $item->trackorder->orderStatus);
    @endphp --}}

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const statusSteps = ['pending', 'confirm', 'out for delivery', 'delivered'];

            document.querySelectorAll('[data-progress-fill]').forEach(el => {
                const status = el.dataset.status;
                if (status == 'pending') {
                    el.style.width = '1%';
                } else if (status == 'confirm') {
                    el.style.width = '32%';
                } else if (status == 'out for delivery') {
                    el.style.width = '66%';
                } else if (status == 'delivered') {
                    el.style.width = '100%';
                }
                // const index = statusSteps.indexOf(status);
                // const percent = ((index + 1) / statusSteps.length) * 100;
                // el.style.width = `${percent}%`;
            });

            document.querySelectorAll('[data-progress-fill-mobile]').forEach(el => {
                const status = el.dataset.status;
                if (status == 'pending') {
                    el.style.height = '0%';
                } else if (status == 'confirm') {
                    el.style.height = '30%';
                } else if (status == 'out for delivery') {
                    el.style.height = '58%';
                } else if (status == 'delivered') {
                    el.style.height = '100%';
                }
                // const index = statusSteps.indexOf(status);
                // const percent = ((index + 1) / statusSteps.length) * 100;
                // el.style.height = `${percent}%`;
            });
        });
    </script>

@endsection
