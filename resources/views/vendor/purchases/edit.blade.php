@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header d-flex">
            <div class="col text-white mt-2">
                <h6 class="mb-0">Edit Purchase</h6>
            </div>
            <div class="heading d-flex row align-items-center">
                <div class="col d-flex" align="right" style="gap: 3px">
                    {{-- <a class="b1 btn btn-danger" href="{{ route('product.deactiveindex') }}">Deactivated Purchase</a> --}}
                    <a class="btn btn-primary" href="{{ route('purchases.index') }}">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="productForm" action="{{ route('product.update', $purchase->id) }}" method="post" enctype="multipart/form-data"
                class="form">
                @csrf

        <div class="mb-3">
            <label>Product ID</label>
            <input type="number" name="product_id" class="form-control" value="{{ old('product_id', $purchase->product_id) }}" required>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $purchase->date) }}" required>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $purchase->price) }}" required>
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="qty" class="form-control" value="{{ old('qty', $purchase->qty) }}" required>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="update btn" id="Update"> Update </button>
            </div>
        </div>
        
    </form>
</div>
@endsection
