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
            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('order.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">

                        <!-- Global Search -->
                        <div class="col">
                            <label for="global" class="form-label"><b>Filter By Order Date:</b></label>
                            <input type="date" id="date" name="date" value="{{ request('date') }}"
                                class="form-control">
                        </div>

                        <!-- category Filter -->
                        <div class="col">
                            <label for="status" class="form-label"><b>Status:</b></label>
                            <select id="status" name="status" class="form-select">
                                <option value="" selected>Select Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="confirm" {{ request('status') == 'confirm' ? 'selected' : '' }}>Confirm
                                </option>
                                <option value="out for delivery"
                                    {{ request('status') == 'out for delivery' ? 'selected' : '' }}>Out for delivery
                                </option>
                                <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>
                                    Delivered</option>
                            </select>
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="filter btn">Filter</button>
                            <a href="{{ route('order.index') }}" class="reset btn">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
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
                                @foreach ($orderData->orderDetails as $orderDetailsData)
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
                                            <p>{{ $orderDetailsData->product->productName }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $orderDetailsData->Unit->unitMaster->unit }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $orderDetailsData->qty }}</p>
                                        </td>
                                        <td>
                                            <p> {{ $orderDetailsData->total }} ₹</p>
                                        </td>
                                        <td>
                                            <select name="status" id="status{{ $orderDetailsData->trackorder->id }}"
                                                onchange="updatestatus({{ $orderDetailsData->trackorder->id }})">
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

    <script>
        function updatestatus(id) {
            var selectedvalue = $("#status" + id).val();

            $.post("{{ route('order.update') }}/" + id, {
                "_token": "{{ csrf_token() }}",
                "status": selectedvalue
            }, function(response) {
                if (response.status == true) {
                    location.reload();
                    alert('order updated successfully');
                } else {
                    alert('something went Wrong ')
                }
            });
        }
    </script>
@endsection
