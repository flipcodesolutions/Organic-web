@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Purchase</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
        @csrf
        @method('PUT')

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
                <button type="submit" class="update btn" id="Update"><i class="fa-solid fa-floppy-disk"></i> Update </button>
            </div>
        </div>
        
    </form>
</div>
@endsection
