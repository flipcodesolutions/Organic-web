@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Purchase</h2>
    <form action="{{ route('purchase.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Product ID:</label>
            <select name="product_id" class="form-control" required>
        <option value="">Select a product</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->productName }}</option>
        @endforeach
    </select>
        </div>

        <div class="form-group">
            <label>Date:</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Price:</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Qty:</label>
            <input type="number" name="qty" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Status:</label>
            <select name="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="deactive">Deactive</option>
                <option value="deleted">Deleted</option>
            </select>
        </div>

        <button class="btn btn-success">Create</button>
    </form>
</div>
@endsection
