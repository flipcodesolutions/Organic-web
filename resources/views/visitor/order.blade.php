@extends('visitor.layouts.app')
@section('content')
    <div class="order-container container h-100">

        <h2>Your Orders</h2>

        @if (!empty($order))
            {{-- filter --}}
            <div class="filter mt-3">
                <form action="" method="get" class="filter-form d-flex gap-2">
                    {{-- <h5>Orders of</h5>
                <input type="month" name="date"> --}}
                    <label for="monthYear">Select Month and Year</label>
                    <input type="text" name="filter_date" id="datepicker" class="form-control" placeholder="mm/yyyy"
                        autocomplete="off">
                </form>
            </div>
            @foreach ($order as $orderData)
                <div class="card my-3">
                    <div class="card-header d-flex justify-content-between">
                        <div class="d-flex gap-3 justify-content-start">
                            <div class="">
                                <p class="my-0">Order placed</p>
                                <p class="my-0">{{ \Carbon\Carbon::parse($orderData->orderDate)->format('j F Y') }}</p>
                            </div>
                            <div class="">
                                <p class="my-0">Total</p>
                                <p class="my-0">₹{{ $orderData->total_bill_amt }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="order-id">
                                <p class="my-0"> ORDER # {{ $orderData->id }} </p>
                                <a href="{{ route('home.orderdetail') }}/{{ $orderData->id }}"
                                    class="text-body-secondary">Order Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        @foreach ($orderData->orderDetails as $orderDetailData)
                            <div class="row border-top py-3">
                                <div class="product-image d-flex justify-content-center col-lg-2">
                                    <img src="{{ asset($orderDetailData->product->image) }}" alt="" class=""
                                        style="max-height: 160px">
                                </div>
                                <div class="col-lg-10 px-2">
                                    <div class="product-details">
                                        <h6>{{ $orderDetailData->product->productName }}</h6>
                                        <p>{!! $orderDetailData->product->productDescription !!}</p>
                                    </div>
                                    <div class="mt-auto">
                                        <a href="{{ route('home.product') }}/{{ $orderDetailData->product->id }}"
                                            class="btn btn-success">Order Again</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            <h3>hello</h3>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            $('#datepicker').datepicker({
                format: "mm/yyyy",
                startView: "months",
                minViewMode: "months",
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection
