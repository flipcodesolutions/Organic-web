@extends('layouts.app')
@section('header', 'Products Create')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Create New Purchase</h1>
        </div>
        <a class="btn btn-primary" href="{{ route('purchases.index') }}" role="button">Back </a>
    </div>

    <div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">


    {{-- <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 200px"> Add Purchase </h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('purchases.index') }}" class="btn btn-primary" type="button"> Back </a>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <form id="productForm" action="{{ route('purchases.store') }}" method="POST" enctype="multipart/form-data"
                    class="form">
                    @csrf


                    <div class="mb-3">
                        <label>Product Name</label>
                        <select class="form-control" name="product_id" id="exampleFormControlSelect1">
                            <option value="">-- Select Product --</option>
                            @foreach ($products as $products)
                                <option value="{{ $products->id }}">{{ $products->productName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row ">
                        <div class="col mb-3">
                            <label>Date</label></div>
                            <div class="col mb-3">
                            <input type="date" name="date" class="form-control" required>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col mb-3">
                            <label>Price</label>
                            <input type="" name="price" class="form-control" required>
                        </div>
            
                        <div class="col mb-3">
                            <label>Quantity</label>
                            <input type="" name="qty" class="form-control" required>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary ">
                                <i class="fa-solid fa-floppy-disk"></i> Submit</button>
                                {{-- <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Cancel</a> --}}
                        </div>
                    </div>

                    
                </form>
            </div>



@endsection