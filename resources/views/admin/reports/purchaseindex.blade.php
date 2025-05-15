@extends('layouts.app')

@section('content')
<div class="container">
    @php
    $role = auth()->user()->role;
@endphp
    <h2>All Purchases</h2>
    @if($role !== 'vendor')
    <a href="{{ route('purchase.create') }}" class="btn btn-primary mb-3">Add Purchase</a>
@endif
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Scrollable container -->
    <div class="table-responsive">
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
                        <td>{{ $purchase->product->productName ?? 'N/A' }}</td>
                        <td>{{ $purchase->date }}</td>
                        <td>{{ $purchase->price }}</td>
                        <td>{{ $purchase->qty }}</td>
                        <td>{{ $purchase->status }}</td>
                        <td>
                            <div class="d-flex">
                            @if($role !== 'vendor')
                            <a href="{{ route('purchase.edit', $purchase->id) }}" class="btn btn-sm btn-warning my-2 mx-2">Edit</a>
                            <form action="{{ route('purchase.destroy', $purchase->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger my-2" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            @endif
                            <a href="{{ route('purchase.show', $purchase->id) }}" class="btn btn-sm btn-primary my-2 mx-2">View</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
