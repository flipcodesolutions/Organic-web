@extends('layouts.app')
@section('header', 'Products Create')
@section('content')
    <div class="container">
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
            </div>

            <div class="card-body">
                <form id="productForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                    class="form">
                    @csrf


                    <div class="mb-3">
                        <label>Product ID</label>
                        <input type="number" name="product_id" class="form-control" required>
                    </div>
            
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
            
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
            
                    <div class="mb-3">
                        <label>Quantity</label>
                        <input type="number" name="qty" class="form-control" required>
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