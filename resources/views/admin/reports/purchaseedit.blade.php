@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Purchase</h2>
    <form action="{{ route('purchase.update', $purchase->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Product ID:</label>
            <select name="product_id" class="form-control">
    @foreach ($products as $product)
        <option value="{{ $product->id }}" {{ $product->id == $purchase->product_id ? 'selected' : '' }}>
            {{ $product->productName }}
        </option>
    @endforeach
</select>
        </div>

        <div class="form-group">
            <label>Date:</label>
            <input type="date" name="date" class="form-control"
                value="{{ date('Y-m-d', strtotime($purchase->date)) }}" required>
        </div>

        <div class="form-group">
            <label>Price:</label>
            <input type="number" name="price" class="form-control" value="{{ $purchase->price }}" required>
        </div>

        <div class="form-group">
            <label>Qty:</label>
            <input type="number" name="qty" class="form-control" value="{{ $purchase->qty }}" required>
        </div>

        <div class="form-group">
            <label>Status:</label>
            <select name="status" class="form-control" required>
                @foreach(['active', 'deactive', 'deleted'] as $status)
                    <option value="{{ $status }}" {{ $purchase->status === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
