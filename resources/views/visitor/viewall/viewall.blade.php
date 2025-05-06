@extends('visitor.layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">All Products</h2>

    <div class="row">
        @foreach ($products as $productData)
            <div class="col-lg-3 col-md-6 mb-3 d-flex">
                <a href="{{ route('home.product', $productData->id) }}" class="productlink d-block w-100">
                    <div class="catcard card p-2 h-100 d-flex flex-column">
                        <img src="{{ asset($productData->productImages->first()->url) }}"
                             class="card-img-top" alt="Product"
                             style="height: 280px; object-fit: contain;">
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <h5 class="card-title text-truncate">{{ $productData->productName }}</h5>
                            <p class="mb-0">{{ $productData->productUnit->first()->unitMaster->unit }}</p>
                            <p class="mb-0">₹{{ $productData->productPrice }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{-- {{ $products->links() }} --}}
    </div>
</div>
@endsection
