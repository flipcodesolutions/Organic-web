@extends('layouts.app')
@section('header', 'Products Create')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Edit Price</h1>
        </div>
        <a href="{{ route('unit.index') }}" class="btn btn-primary" type="button"> Back </a>
    </div>

    <div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 200px">Update Notification</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('notification.index') }}" class="btn btn-primary" type="button"> Back </a>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <form id="productForm" action="{{ route('unit.update') }}/{{ $unit->id }}" method="POST" class="form">
                    @csrf

                    {{-- unit --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Unit<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="unit" id="unit" placeholder="Unit"
                                    value="{{ $unit->unitmaster->unit }}" class="form-control" readonly>
                                <label for="">Unit</label>
                                <span>
                                    @error('unit')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- price --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Price<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="price" id="price" placeholder="Price"
                                    value="{{ $unit->price }}" onchange="per()" class="form-control">
                                <label for="">Price</label>
                                <i class="fa-solid fa-indian-rupee-sign position-absolute"
                                    style="right: 10px; top: 50%; transform: translateY(-50%);"></i>
                                <span>
                                    @error('price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- details --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Unit Details<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="unitDetails" id="unitDetails" placeholder="Unit Details"
                                    value="{{ $unit->detail }}" class="form-control">
                                <label for="">Unit Details</label>
                                <span>
                                    @error('unitDetails')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- percentage --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Discount Percentage<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="desPer" id="desPer" placeholder="Discount Percentage"
                                    value="{{ $unit->per }}" onchange="per()" class="form-control">
                                    <i class="fa-solid fa-percent position-absolute"
                                    style="right: 10px; top: 50%; transform: translateY(-50%);"></i>
                                <label for="">Discount Percentage</label>
                                <span>
                                    @error('desPer')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- seeling price --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Selling Price<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="sellingPrice" id="sellingPrice" placeholder="Selling Price"
                                    value="{{ $unit->sell_price }}" class="form-control" readonly>
                                <i class="fa-solid fa-indian-rupee-sign position-absolute"
                                    style="right: 10px; top: 50%; transform: translateY(-50%);"></i>
                                <label for="">Selling Price</label>
                                <span>
                                    @error('sellingPrice')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="update btn" id="Update"><i class="fa-solid fa-floppy-disk"></i>
                            Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // This function runs whenever the page is loaded
            function per() {
                // Get references to the price, discount percentage, and selling price input fields
                let price = document.getElementById('price').value;
                let discountPercentage = document.getElementById('desPer').value;
                let sellPrice = document.getElementById('sellingPrice');

                // Ensure price and discount percentage are numbers
                price = parseFloat(price);
                discountPercentage = parseFloat(discountPercentage);

                // Calculate the selling price based on the price and discount percentage
                let sellingValue = price - (price * discountPercentage) / 100;
                sellingValue = Math.round(sellingValue);
                // Set the calculated value as the value of the selling price input field
                sellPrice.value = sellingValue; // Display result with 2 decimal places
            }

            // Attach event listeners to the price and discount percentage inputs to trigger the calculation
            document.getElementById('price').addEventListener('input', per);
            document.getElementById('desPer').addEventListener('input', per);
        });
    </script>

@endsection
