@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Purchases</h2>
    <a href="{{ route('purchase.create') }}" class="btn btn-primary mb-3">Add Purchase</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Product ID</th><th>Date</th><th>Price</th><th>Qty</th><th>Status</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $index => $purchase)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    {{-- <td>{{ $purchase->id }}</td> --}}
                    <td>{{ $purchase->product->productName ?? 'N/A' }}</td>
                    <td>{{ $purchase->date }}</td>
                    <td>{{ $purchase->price }}</td>
                    <td>{{ $purchase->qty }}</td>
                    <td>{{ $purchase->status }}</td>
                    <td>
                        <a href="{{ route('purchase.edit', $purchase->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('purchase.destroy', $purchase->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a href="{{ route('purchase.show', $purchase->id) }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
