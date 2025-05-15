@extends('layouts.app')

@section('content')
@php
    $role = auth()->user()->role;
@endphp
<div class="container">
    <h2>Purchase Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Product:</strong> {{ $purchase->product->productName ?? 'N/A' }}</li>

        <li class="list-group-item"><strong>Date:</strong> {{ $purchase->date }}</li>
        <li class="list-group-item"><strong>Price:</strong> {{ $purchase->price }}</li>
        <li class="list-group-item"><strong>Qty:</strong> {{ $purchase->qty }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $purchase->status }}</li>
    </ul>
    <a href="{{ route('purchase.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
