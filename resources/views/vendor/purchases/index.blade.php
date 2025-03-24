@extends('layouts.app')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Purchase Management</h1>
    </div>
    <a class="b1 btn btn-danger mr-1" href="{{ Route('purchases.deleted') }}">Deactivated Purchases</a>
    <a href="{{ route('purchases.create') }}" class="btn btn-primary">Add</a>
</div>

<div class="card-body p-0">
    <div class="card shadow-sm  bg-body rounded">
        {{-- <div class="card-header d-flex">
            <div class="col text-white mt-2">
                <h6 class="mb-0">Purchase List</h6>
            </div>
            <div class="heading d-flex row align-items-center">
                <div class="col d-flex" align="right" style="gap: 3px">
                    <a class="b1 btn btn-danger mr-1" href="{{ Route('purchases.deleted') }}">Deactivated purchases</a>
        <a class="btn btn-primary" href="{{ route('purchases.create') }}">Add Purchase</a>
    </div>
</div>
</div> --}}

{{-- filter --}}
<div class="mb-4 margin-bottom-30 m-4">
    <form action="{{ route('purchases.index') }}" method="GET" class="filter-form">
        <div class="row align-items-end g-2">

            {{-- <!-- Global Search -->
                        <div class="col">
                            <label for="global" class="form-label"><b>Filter:</b></label>
                            <input type="text" id="global" name="global" value="{{ request('global') }}"
            class="form-control" placeholder="Search by purchase Name">
        </div> --}}

        <!-- purchase Filter -->
        <div class="col">
            <label for="product_id" class="form-label"><b>Product :</b></label>
            <select id="product_id" name="product_id" class="form-select">
                <option value="" selected> Select Product </option>
                @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>
                    {{ $product->productName }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Submit & Reset Buttons -->
        <div class="col-md-4 d-flex justify-content-end gap-2">
            <button type="submit" class="filter btn">Filter</button>
            <a href="{{ route('purchases.index') }}" class="reset btn">Reset</a>
        </div>
</div>
</form>
</div>

<div class="card-body table-responsive">
    <div class="loader"></div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Date</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $purchase)
            <tr>
                <td>{{ $purchase->id }}</td>
                <td>{{ $purchase->product->productName}}</td>
                <td>{{ $purchase->date }}</td>
                <td>{{ $purchase->price }}</td>
                <td>{{ $purchase->qty }}</td>
                <td>{{ ($purchase->status) }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="javascript:void(0)" class="delete btn ml-2" onclick="openDeactiveModal('{{ route('purchases.deactive', $purchase->id) }}')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
