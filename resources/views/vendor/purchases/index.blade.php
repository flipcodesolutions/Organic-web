@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header d-flex">
            <div class="col text-white mt-2">
                <h6 class="mb-0">Purchase List</h6>
            </div>
            <div class="heading d-flex row align-items-center">
                <div class="col d-flex" align="right" style="gap: 3px">
                    {{-- <a class="b1 btn btn-danger" href="{{ route('product.deactiveindex') }}">Deactivated Purchase</a> --}}
                    <a class="btn btn-primary" href="{{ route('purchases.create') }}">Add Purchase</a>
                </div>
            </div>
        </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Date</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->product_id }}</td>
                    <td>{{ $purchase->date }}</td>
                    <td>{{ $purchase->price }}</td>
                    <td>{{ $purchase->qty }}</td>
                    <td>{{ ($purchase->status) }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="javascript:void(0)" class="delete btn ml-2"
                                onclick="openDeactiveModal('{{ route('purchases.destroy', $purchase->id) }}')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
