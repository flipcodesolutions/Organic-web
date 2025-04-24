@extends('layouts.app')
@section('header', 'Category')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Order Management</h1>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-body">
                {{-- <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Coustemer Details</th>
                            <th>Order Date</th>
                            <th>Total Bill Ammount</th>
                            <th>payment Method</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($order) > 0)
                            @foreach ($order as $key => $orderData)
                                <tr class="table-active">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $orderData->user->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($orderData->orderDate)->format('j - m - Y') }}</td>
                                    <td>{{ $orderData->total_bill_amt }} ₹</td>
                                    <td>{{ $orderData->payment_mode }}</td>
                                    <td>
                                        <p>{{ $orderData->addressLine1 }}</p> 
                                        <p>{{ $orderData->addressLine2 }}</p>
                                        <p>{{ $orderData->landmark }} | {{ $orderData->area }} </p>
                                        <p>{{ $orderData->city }} | {{ $orderData->pincode }}</p>
                                    </td>
                                    
                                </tr>
                                <tr >
                                    <td colspan="6" class="pt-0">
                                        <table class="table table-borderless table-hover  mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Product</th>
                                                    <th>Unit</th>
                                                    <th>Quentity</th>
                                                    <th>Total Ammount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderData->orderDetails as $key2 => $orderDetailsData)
                                                    <tr class="bg-white text-dark">
                                                        <td>{{ $key2 + 1 }}</td>
                                                        <td>{{ $orderDetailsData->product->productName }}</td>
                                                        <td>{{ $orderDetailsData->Unit->unitMaster->unit }}</td>
                                                        <td>{{ $orderDetailsData->qty }}</td>
                                                        <td>{{ $orderDetailsData->total }} ₹</td>
                                                        <td>
                                                            <select name="status" id="">
                                                            <option value="pending" {{ $orderDetailsData->trackorder->orderStatus == 'pending' ? 'selected disabled' : '' }}>Pending</option>    
                                                            <option value="confirm" {{ $orderDetailsData->trackorder->orderStatus == 'confirm' ? 'selected disabled':'' }}>Confirm</option>    
                                                            <option value="out for delivery" {{ $orderDetailsData->trackorder->orderStatus == 'out for delivery' ? 'selected disabled':'' }}>Out for delivery</option>    
                                                            <option value="delivered" {{ $orderDetailsData->trackorder->orderStatus == 'delivered' ? 'selected disabled':'' }}>Delivered</option>    
                                                            </select>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        @endif

                    </tbody>
                </table> --}}
                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Coustemer Details</th>
                            <th>Order Date</th>
                            <th>Total Bill Ammount</th>
                            <th>payment Method</th>
                            <th>Address</th>
                            <th>Product</th>
                            <th>Unit</th>
                            <th>Quentity</th>
                            <th>Total Ammount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($order) > 0)
                            @foreach ($order as $key => $orderData)
                                @foreach ($orderData->orderDetails as $key2 => $orderDetailsData)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $orderData->user->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($orderData->orderDate)->format('j - m - Y') }}</td>
                                        <td>{{ $orderData->total_bill_amt }} ₹</td>
                                        <td>{{ $orderData->payment_mode }}</td>
                                        <td>
                                            <p>{{ $orderData->addressLine1 }}</p>
                                            <p>{{ $orderData->addressLine2 }}</p>
                                            <p>{{ $orderData->landmark }} | {{ $orderData->area }} </p>
                                            <p>{{ $orderData->city }} | {{ $orderData->pincode }}</p>
                                        </td>
                                        <td>
                                            {{-- @foreach ($orderData->orderDetails as $key2 => $orderDetailsData) --}}
                                            <p>{{ $orderDetailsData->product->productName }}</p>
                                            {{-- @endforeach --}}
                                        </td>
                                        <td>
                                            {{-- @foreach ($orderData->orderDetails as $key2 => $orderDetailsData) --}}
                                            <p>{{ $orderDetailsData->Unit->unitMaster->unit }}</p>
                                            {{-- @endforeach --}}
                                        </td>
                                        <td>
                                            {{-- @foreach ($orderData->orderDetails as $key2 => $orderDetailsData) --}}
                                            <p>{{ $orderDetailsData->qty }}</p>
                                            {{-- @endforeach --}}
                                        </td>
                                        <td>
                                            {{-- @foreach ($orderData->orderDetails as $key2 => $orderDetailsData) --}}
                                            <p> {{ $orderDetailsData->total }} ₹</p>
                                            {{-- @endforeach --}}
                                        </td>
                                        <td>
                                            {{-- @foreach ($orderData->orderDetails as $key2 => $orderDetailsData) --}}
                                            <select name="status" id="">
                                                <option value="pending"
                                                    {{ $orderDetailsData->trackorder->orderStatus == 'pending' ? 'selected disabled' : '' }}>
                                                    Pending</option>
                                                <option value="confirm"
                                                    {{ $orderDetailsData->trackorder->orderStatus == 'confirm' ? 'selected disabled' : '' }}>
                                                    Confirm</option>
                                                <option value="out for delivery"
                                                    {{ $orderDetailsData->trackorder->orderStatus == 'out for delivery' ? 'selected disabled' : '' }}>
                                                    Out for delivery</option>
                                                <option value="delivered"
                                                    {{ $orderDetailsData->trackorder->orderStatus == 'delivered' ? 'selected disabled' : '' }}>
                                                    Delivered</option>
                                            </select>
                                            {{-- @endforeach --}}
                                        </td>

                                    </tr>
                                @endforeach
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11" align="center" style="color: red;">
                                    <h5>No Data Record Found</h5>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
