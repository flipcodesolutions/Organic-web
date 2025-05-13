@extends('layouts.app')
@section('header', 'Category')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Stock Management</h1>
        </div>
        {{-- <a class="b1 btn btn-danger mr-1" href="{{ route('brand.deactiveindex') }}">Deactivated Brands</a>
    <a class="btn btn-primary" href="{{ route('brand.create') }}">Add</a> --}}
    </div>

    <div class="card-body p-0">
        <div class="card shadow-sm bg-body rounded">
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('stock.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">
                        <div class="col position-relative">
                            <label for="product"><b>Select Product:</b></label>

                            <!-- Search Input Field -->
                            <input type="text" id="searchInput" onkeyup="filterFunction()" class="form-control"
                                placeholder="Search Product..."
                                value="{{ request('searchInput') ? request('searchInput') : old('searchInput') }}"
                                autocomplete="off">

                            <!-- Dropdown List -->
                            {{-- <div id="myDropdown" class="dropdown-content position-absolute w-100 p-0 shadow-sm"
                                style="max-height: 200px; overflow-y: auto; display: none;  background-color: #fff;">
                                <a href="#" class="dropdown-item" data-value="">Select Product</a>
                                @foreach ($product as $productData)
                                    <a href="#" class="dropdown-item" data-value="{{ $productData->id }}"
                                        {{ request('productId') == $productData->id ? 'selected' : '' }}>{{ $productData->productName }}</a>
                                @endforeach
                            </div> --}}
                            <div id="myDropdown" class="dropdown-content position-absolute w-100 p-0 shadow-sm"
                                style="max-height: 200px; overflow-y: auto; display: none; background-color: #fff;">

                                {{-- @foreach ($product as $productData)
                                    @if (auth()->check()) --}}
                                {{-- Admin user (ID 1): only show products not created by vendors --}}
                                {{-- @if (auth()->id() == 1 && $productData->userId != 1) --}}
                                {{-- Skip vendor products --}}
                                {{-- @continue
                                        @endif --}}

                                {{-- Vendor user: show only their own products --}}
                                {{-- @if (auth()->id() != 1 && $productData->userId != auth()->id()) --}}
                                {{-- Skip other vendors' and admin products --}}
                                {{-- @continue
                                        @endif
                                    @endif --}}

                                {{-- Show product --}}
                                {{-- <a href="#" class="dropdown-item" data-value="{{ $productData->id }}"
                                        {{ request('productId') == $productData->id ? 'selected' : '' }}>
                                        {{ $productData->productName }}
                                    </a>
                                @endforeach --}}

                                @foreach ($product as $productData)
                                    @php
                                        $isVendor = auth()->check() && auth()->user()->role === 'vendor';
                                    @endphp

                                    {{-- Show logic --}}
                                    @if ($isVendor)
                                        {{-- Vendor: only show their own products --}}
                                        @if ($productData->userId != auth()->id())
                                            @continue
                                        @endif
                                    @endif

                                    {{-- Show product --}}
                                    <a href="#" class="dropdown-item" data-value="{{ $productData->id }}"
                                        {{ request('productId') == $productData->id ? 'selected' : '' }}>
                                        {{ $productData->productName }}
                                    </a>
                                @endforeach


                            </div>



                            <!-- Hidden Input to store selected value -->
                            <input type="hidden" name="productId" id="selectedProductId">
                        </div>
                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="filter btn">Filter</button>
                            <a href="{{ route('stock.index') }}" class="reset btn">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
                <div class="loader"></div>

                <div class="card-body">
                    @if (count($data) > 0)
                        @foreach ($data as $stockData)
                            <h5 style="font-weight: 600"> Update Stock for {{ $stockData->productName }} </h5> <br />
                            <form id="productForm" action="{{ route('stock.update', $stockData->id) }}"
                                enctype="multipart/form-data" method="post" class="form">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-lg-3 col-md-12">
                                        Stock<span class="text-danger">*</span>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" name="product_stock" id="product_stock"
                                                value="{{ $stockData->stock }}" class="form-control">
                                            <label for="">Stock</label>
                                            <span>
                                                @error('product_stock')
                                                    <p class=" text-danger">{{ $message }}</p>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- submit --}}
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="update btn" id="Update"><i
                                            class="fa-solid fa-floppy-disk"></i>
                                        Update</button>
                                </div>
                            </form>
                        @endforeach
                    @else
                        <h5 style="color: red;">Please select product first</h5>
                    @endif
                </div>
                {{-- <table class="table table-bordered mt-2">
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
                                    <a href="{{ route('unit.edit') }}/{{ $unitData->id }}"
                                        class="edit btn">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" align="center" style="color: red;">
                            <h5>Please select product first</h5>
                        </td>
                    </tr>
                @endif
            </table> --}}
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

@endsection
