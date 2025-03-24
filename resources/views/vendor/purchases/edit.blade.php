@extends('layouts.app')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Edit Purchase</h1>
    </div>
    <a class="btn btn-primary" href="{{ route('purchases.index') }}" role="button">Back </a>
</div>

<div class="card-body p-0">
    <div class="card shadow-sm  bg-body rounded">
        {{-- <div class="card-header d-flex">
            <div class="col text-white mt-2">
                <h6 class="mb-0">Edit Purchase</h6>
            </div>
            <div class="heading d-flex row align-items-center">
                <div class="col d-flex" align="right" style="gap: 3px">
                    <a class="btn btn-primary" href="{{ route('purchases.index') }}">Back</a>
                </div>
            </div>
        </div> --}}


        <div class="card-body">
            <form id="productForm" action="{{ route('purchases.update')}}" method="post" enctype="multipart/form-data"
                class="form">
                @csrf
                <input type="hidden" value="{{ $purchases->id }}" name="purchase_id">

        <div class="mb-3">
            <label>Product ID</label>
            <select class="form-control" name="product_id" id="exampleFormControlSelect1">
                <option value="" selected disabled>-- Select Product --</option>
                @foreach ($products as $product)
                <option value="{{  $product->id }}"{{ $product->id == $purchases->product_id ? 'selected' : '' }}>{{ $product->productName }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $purchases->date) }}" required>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $purchases->price) }}" required>
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="qty" class="form-control" value="{{ old('qty', $purchases->qty) }}" required>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="update btn" id="Update"> Update </button>
            </div>
        </div>
        
    </form>
</div>
@endsection
