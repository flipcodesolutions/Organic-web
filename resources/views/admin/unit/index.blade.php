@extends('layouts.app')
@section('header', 'Category')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Price Management</h1>
        </div>
        {{-- <a class="b1 btn btn-danger mr-1" href="{{ route('brand.deactiveindex') }}">Deactivated Brands</a>
    <a class="btn btn-primary" href="{{ route('brand.create') }}">Add</a> --}}
    </div>

    <div class="card-body p-0">
        <div class="card shadow-sm bg-body rounded">
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('unit.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">
                        <div class="col position-relative">
                            <label for="product"><b>Select Product:</b></label>

                            <!-- Search Input Field -->
                            <input type="text" id="searchInput" onkeyup="filterFunction()" class="form-control"
                                placeholder="Search Product..."
                                value="{{ request('searchInput') ? request('searchInput') : old('searchInput') }}"
                                autocomplete="off">

                            <!-- Dropdown List -->
                            <div id="myDropdown" class="dropdown-content position-absolute w-100 p-0 shadow-sm"
                                style="max-height: 200px; overflow-y: auto; display: none;  background-color: #fff;">
                                <a href="#" class="dropdown-item" data-value="">Select Product</a>
                                @foreach ($product as $productData)
                                    <a href="#" class="dropdown-item" data-value="{{ $productData->id }}"
                                        {{ request('productId') == $productData->id ? 'selected' : '' }}>{{ $productData->productName }}</a>
                                @endforeach
                            </div>

                            <!-- Hidden Input to store selected value -->
                            <input type="hidden" name="productId" id="selectedProductId">
                        </div>
                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="filter btn">Filter</button>
                            <a href="{{ route('unit.index') }}" class="reset btn">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Detail</th>
                        <th>Discount Percentage</th>
                        <th>Seeling Price</th>
                        <th>Action</th>
                    </tr>
                    @if (count($data) > 0)
                        @foreach ($data as $key => $unitData)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $unitData->unitMaster->unit }}
                                </td>
                                <td>{{ $unitData->price }}</td>
                                <td>{{ $unitData->detail }}</td>
                                <td>{{ $unitData->per }}</td>
                                <td>{{ $unitData->sell_price }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('unit.edit') }}/{{ $unitData->id }}" class="edit btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="delete btn ml-2"
                                            onclick="openDeactiveModal('{{ route('unit.delete') }}/{{ $unitData->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="7">
                                {{-- <a href="" class="btn btn-primary">Add new unit</a> --}}
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#productModal">
                                    Add new unit
                                </button>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="8" align="center" style="color: red;">
                                <h5>Please select product first</h5>
                            </td>
                        </tr>
                    @endif
                </table>

                {{-- model for add new unit --}}
                <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel">Add new unit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form inside modal -->
                                <form id="productForm" action="{{ route('unit.store') }}" method="POST" class="form">
                                    @csrf

                                    @foreach ($data as $unitData)
                                        <input type="hidden" value="{{ $unitData->product_id }}" name="productId"
                                            id="">
                                    @endforeach
                                    <!-- Unit -->
                                    <div class="row mb-3">
                                        <div class="col-sm-12 col-lg-3 col-md-12">
                                            Unit<span class="text-danger">*</span>
                                        </div>
                                        <div class="col">
                                            <select class="form-select form-select-lg mb-3" name="unit"
                                             aria-label="Large select example"
                                                id="unit" style="font-size: 16px; font-weight: 400;">
                                                <option selected disabled>Select Unit</option>
                                                @foreach ($units as $data)
                                                    <option value="{{ $data->id }}" @if (old('unit') == $data->id) selected @endif>{{ $data->unit }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" name="unit" id="unit" placeholder="Unit" class="form-control" readonly>
                              <label for="unit">Unit</label> --}}
                                            <span>
                                                @error('unit')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Price -->
                                    <div class="row mb-3">
                                        <div class="col-sm-12 col-lg-3 col-md-12">
                                            Price<span class="text-danger">*</span>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" name="price" id="price" placeholder="Price"
                                                    onchange="per()" value="{{ old('price') }}" class="form-control">
                                                <label for="price">Price</label>
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

                                    <!-- Unit Details -->
                                    <div class="row mb-3">
                                        <div class="col-sm-12 col-lg-3 col-md-12">
                                            Unit Details<span class="text-danger">*</span>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" name="unitDetails" id="unitDetails"
                                                  value="{{ old('unitDetails') }}"  placeholder="Unit Details" class="form-control">
                                                <label for="unitDetails">Unit Details</label>
                                                <span>
                                                    @error('unitDetails')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Discount Percentage -->
                                    <div class="row mb-3">
                                        <div class="col-sm-12 col-lg-3 col-md-12">
                                            Discount Percentage<span class="text-danger">*</span>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" name="desPer" id="desPer"
                                                  value="{{ old('desPer') }}"  placeholder="Discount Percentage" onchange="per()"
                                                    class="form-control">
                                                <i class="fa-solid fa-percent position-absolute"
                                                    style="right: 10px; top: 50%; transform: translateY(-50%);"></i>
                                                <label for="desPer">Discount Percentage</label>
                                                <span>
                                                    @error('desPer')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Selling Price -->
                                    <div class="row mb-3">
                                        <div class="col-sm-12 col-lg-3 col-md-12">
                                            Selling Price<span class="text-danger">*</span>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" name="sellingPrice" id="sellingPrice"
                                                  value="{{ old('sellingPrice') }}"  placeholder="Selling Price" class="form-control" readonly>
                                                <i class="fa-solid fa-indian-rupee-sign position-absolute"
                                                    style="right: 10px; top: 50%; transform: translateY(-50%);"></i>
                                                <label for="sellingPrice">Selling Price</label>
                                                <span>
                                                    @error('sellingPrice')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="update btn btn-primary" id="Update">
                                            <i class="fa-solid fa-floppy-disk"></i> Update
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- table end --}}
                {{-- {!! $data->links('pagination::bootstrap-5') !!} --}}

            </div>

        </div>
    </div>

    <script>
        function filterFunction() {
            var input, filter, dropdown, items, i;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            dropdown = document.getElementById("myDropdown");
            items = dropdown.getElementsByClassName("dropdown-item");

            // Loop through all dropdown items and hide those that don't match
            for (i = 0; i < items.length; i++) {
                var itemText = items[i].innerText || items[i].textContent;
                items[i].style.display = itemText.toUpperCase().includes(filter) ? "block" : "none";
            }

            // Show the dropdown when input is not empty
            dropdown.style.display = input.value ? "block" : "none";
        }

        document.querySelectorAll('.dropdown-item').forEach(function(item) {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                var selectedValue = this.getAttribute('data-value');
                var selectedText = this.innerText;

                // Set the input value to the selected text
                document.getElementById("searchInput").value = selectedText;

                // Set the hidden input value to the selected product id
                document.getElementById("selectedProductId").value = selectedValue;

                // Hide the dropdown
                document.getElementById("myDropdown").style.display = "none";
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if ($errors->any())
                $(document).ready(function() {
                    // Open the modal automatically if there are errors
                    $('#productModal').modal('show');
                });
            @endif

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
