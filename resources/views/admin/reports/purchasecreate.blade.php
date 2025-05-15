@extends('layouts.app')

@section('content')
@php
    $role = auth()->user()->role;
@endphp

@if($role !== 'vendor')
<div class="container">
    <h2>Create Purchase</h2>
    <form action="{{ route('purchase.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Product ID:</label>
            <select name="product_id"  id="product_id" class="form-control" required>
        <option value="">Select a product</option>
        @foreach ($products as $product)

            <option value="{{ $product->id }}" data-price="{{ $product->productPrice }}">{{ $product->productName }}</option>
        @endforeach
    </select>
        </div>

        <div class="form-group">
            <label>Date:</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Price:</label>
            <input type="number"  id="priceInput" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Qty:</label>
            <input type="number" id="qtyInput" name="qty" class="form-control" required>
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
@else
<div class="alert alert-warning text-center my-5">You are not allowed to create purchases.</div>
@endif

{{-- <script>
document.addEventListener('DOMContentLoaded', function () {
    const productSelect = document.getElementById('product_id');
    const priceInput = document.getElementById('priceInput');
    const qtyInput = document.getElementById('qtyInput');

    let unitPrice = 0;

    productSelect.addEventListener('change', function () {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        unitPrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;
        const qty = parseInt(qtyInput.value) || 1;
        priceInput.value = unitPrice * qty;
    });

    qtyInput.addEventListener('input', function () {
        const qty = parseInt(qtyInput.value) || 1;
        priceInput.value = unitPrice * qty;
    });
});
</script> --}}



@endsection
