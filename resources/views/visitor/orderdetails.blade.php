@extends('visitor.layouts.app')
@section('content')
    {{-- <style>
        .product-card-body {
            height: 710px;
            overflow: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
    </style> --}}

    <div class="order-details-container container">
        @if (session('user'))
            <h1>Order Details</h1>
            <div class="d-flex justify-content-between mb-2">
                <p>Order Placed {{ \Carbon\Carbon::parse($order->orderDate)->format('j F Y') }} | order number 1</p>
                <a href="{{ route('home.invoice') }}/{{ $order->id }}" class="btn btn-primary"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Pdf</a>
            </div>
            <div class="card">
                <div class="card-body d-flex">
                    <div class="col-lg-4 col-sm-6">
                        <h6> Shipping Address</h6>
                        <p class="my-0"> {{ session('user')->name }} </p>
                        <p class="my-0"> {{ $order->shippingadd->address_line1 }} </p>
                        <p class="my-0"> {{ $order->shippingadd->address_line2 }} </p>
                        <p class="my-0"> {{ $order->shippingadd->landmark->landmark_eng }} |
                            {{ $order->shippingadd->pincode }}
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <h6>Payment Method</h6>
                        <p class="my-0"> {{ $order->payment_mode }} </p>
                    </div>
                    <div class="col-lg-4 col-sm-12">
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
                    @foreach ($order->orderDetails as $orderData)
                        <div class="row border-top py-3">
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
                            <div class="col-2">
                                <a href="">Write Product Review</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <h1>Hello</h1>
        @endif
    </div>
@endsection
