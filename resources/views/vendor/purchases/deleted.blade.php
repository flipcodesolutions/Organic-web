@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Deactivated Purchases</h1>
    </div>
    <a class="btn btn-primary" href="{{ Route('purchases.index') }}">Back</a>
</div>

<div class="card-body p-0">
    <div class="card shadow-sm  bg-body rounded">
        {{-- <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Deactivated purchase</h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ Route('purchases.index') }}">Back</a>
    </div>
</div>
</div> --}}



    {{-- filter --}}
    <div class="mb-4 margin-bottom-30 m-4">
        <form action="{{ route('purchases.deleted') }}" method="GET" class="filter-form">
            <div class="row align-items-end g-2">
            {{-- <!-- Global Search -->
            <div class="col">
                <label for="global" class="form-label"><b>Filter:</b></label>
                <input type="text" id="global" name="global" value="{{ request('global') }}" class="form-control" placeholder="Search by purchase Name">
            </div> --}}
            <!-- product Filter -->
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
                <button type="submit" class="filter btn"> Filter </button>
                <a href="{{ route('purchases.deleted') }}" class="reset btn">Reset</a>
            </div>
        </div>
    </form>
</div>

<div class="card-body table-responsive">
    <div class="loader"></div>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Date</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($data as $purchases)
        <tr>
            <td>{{ $purchases->id }}
            <td>{{ $purchases->product->productName }}</td>
            <td>{{ $purchases->date }}</td>
            <td>{{ $purchases->price }}</td>
            <td>{{ $purchases->qty }}</td>
            <td>{{ $purchases->status  }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ Route('purchases.active', $purchases->id) }}" class="edit btn">
                        <i class="fas fa-undo"></i>
                    </a>
                    <a href="javascript:void(0)" class="delete btn ml-2" onclick="openDeleteModal('{{ Route('purchases.destroy', $purchases->id) }}')">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>

        </tr>
        @endforeach
    </table>
</div>
</div>
</div>
@endsection
