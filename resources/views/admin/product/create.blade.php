@extends('layouts.app')
@section('header', 'Products Create')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 200px">Create New Products</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('product.index') }}" class="btn btn-primary" type="button"> Back </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="productForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                    class="form">
                    @csrf

                    {{-- product --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Name <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_name" value="{{ old('product_name') }}"
                                    id="product_name" placeholder="product Name" class="form-control">
                                <label for="">English</label>
                                <span class="text-danger" id="productNameError"></span>
                                {{-- @error('product_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror --}}
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_name_guj" value="{{ old('product_name_guj') }}"
                                    id="product_name_guj" placeholder="Product Name Gujarati" class="form-control">
                                <label for="">Gujarati</label>
                                <span class="text-danger" id="productNameGujError"></span>
                                {{-- <span>
                                    @error('product_name_guj')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span> --}}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_name_hin" value="{{ old('product_name_hin') }}"
                                    id="product_name_hin" placeholder="Product Name Hindi" class="form-control">
                                <label for="">Hindi</label>
                                <span class="text-danger" id="productNameHinError"></span>
                                {{-- <span>
                                    @error('product_name_hin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span> --}}
                            </div>
                        </div>
                    </div>

                    {{-- product description --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description English<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="product_des" placeholder="product_des" id="product_des">{{ old('product_des') }}</textarea>
                                <span class="text-danger" id="productDesError"></span>
                                {{-- <input type="text" name="product_des" id="product_des"
                                            placeholder="Product Description" class="form-control">
                                        <label for="">English</label>
                                <span>
                                    @error('product_des')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description Gujarati<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="product_des_guj" placeholder="product_des_guj" id="product_des_guj">{{ old('product_des_guj') }}</textarea>
                                <span class="text-danger" id="productDesGujError"></span>
                                {{-- <input type="text" name="product_des_guj" id="product_des_guj"
                                            placeholder="Product Description Gujarati" class="form-control">
                                        <label for="">Gujarati</label>
                                <span>
                                    @error('product_des_guj')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description Hindi<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="product_des_hin" placeholder="product_des_hin" id="product_des_hin">{{ old('product_des_hin') }}</textarea>
                                <span class="text-danger" id="productDesHinError"></span>
                                {{-- <input type="text" name="product_des_hin" id="product_des"
                                            placeholder="Product Description Hindi" class="form-control">
                                        <label for="">Hindi</label>
                                <span>
                                    @error('product_des_hin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span> --}}
                            </div>
                        </div>
                    </div>
                    {{-- </div>
        </div> --}}

                    {{-- product price --}}
                    {{-- <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Price<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="number" min="0" name="product_price" id="product_price"
                                    placeholder="Product Price" class="form-control">
                                <label for="">Price</label>
                                <span id="priceError" class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

                    {{-- unit --}}
                    <div class="row">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Unit<span class="text-danger">*</span>
                        </div>
                        <div class="col p-0" style="overflow-x: scroll; margin: 0 12px 16px">
                            <table class="table table-bordered mt-2" style="width: 1000px" id="unitTable">
                                <thead>
                                    <tr>
                                        <th>Unit</th>
                                        <th>Detail (aprox Weight)</th>
                                        <th>Price</th>
                                        <th>Discount Percentage</th>
                                        <th>Sell Price</th>
                                    </tr>
                                </thead>

                                <tbody id="unitTableBody">
                                    <!-- Template Row (First row) -->
                                    <tr class="unitRow">
                                        <td>
                                            <select class="form-select form-select-lg mb-3" name="unit_id[]"
                                                value="{{ old('unit_id.0') }}" aria-label="Large select example"
                                                id="unit">
                                                <option selected disabled>Select Unit</option>
                                                @foreach ($units as $data)
                                                    <option value="{{ $data->id }}">{{ $data->unit }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger" id="unitIdError1"></span>
                                            {{-- <span>
                                                @error('unit_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </span> --}}
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="text" name="unit_det[]" value="{{ old('unit_det.0') }}"
                                                    id="unit_det" placeholder="Unit Detail in Approx Weight"
                                                    class="form-control">
                                                <label for="">Approx Weight</label>
                                                <span class="text-danger" id="unitDetError1"></span>
                                                {{-- <span>
                                                    @error('unit_det.*')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </span> --}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="text" name="price[]" placeholder="Product Price"
                                                    value="{{ old('price.0') }}" class="form-control">
                                                <label for="">Product Price</label>
                                                <span class="text-danger" id="productPriceError1"></span>
                                                {{-- <span>
                                                    @error('price.*')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </span> --}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="text" name="discount_per[]"
                                                    value="{{ old('discount_per.0') }}" placeholder="Discount Percentage"
                                                    min="1" max="100" class="form-control">
                                                <label for="">Discount Per</label>
                                                <span class="text-danger" id="disPerError1"></span>
                                                {{-- <span>
                                                    @error('discount_per.*')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </span> --}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="text" name="selling_price[]" placeholder="Selling Price"
                                                    value="{{ old('selling_price.0') }}" class="form-control">
                                                <label for="">Selling Price</label>
                                                <span class="text-danger" id="sellPriceError1"></span>
                                                {{-- <span>
                                                    @error('selling_price.*')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </span> --}}
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Buttons Row -->
                                    <tr id="unitButtonsRow">
                                        <td colspan="4" style="display: flex; gap: 5px">
                                            <button type="button" class="btn btn-primary my-2" id="addUnit">+</button>
                                            <button type="button" class="btn btn-danger my-2" id="removeUnit">-</button>
                                        </td>
                                    </tr>
                                </tbody>

                                {{-- <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-select form-select-lg mb-3" name="unit_id"
                                                aria-label="Large select example">
                                                <option selected>Select Unit</option>
                                                @foreach ($units as $data)
                                                    <option value="{{ $data->id }}">{{ $data->unit }}</option>
                                                @endforeach
                                            </select>
                                            <span id="unitIdError" class="text-danger"></span>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="text" name="unit_det" id="unit_det"
                                                    placeholder="Unit Detail in Aprox Weight" class="form-control">
                                                <label for="">Aprox Weight</label>
                                                <span id="unitdetailError" class="text-danger"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="text" name="discount_per" id="discount_per"
                                                    placeholder="Discount Percentage" class="form-control">
                                                <label for="">Discount Per </label>
                                                <span id="discountperError" class="text-danger"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="text" name="sellin_price" id="selling_price"
                                                    placeholder="Selling Price" class="form-control">
                                                <label for="">Selling Price</label>
                                                <span id="sellingpriceError" class="text-danger"></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody> --}}
                                {{-- <span id="unitTable"></span> --}}
                            </table>
                        </div>
                    </div>

                    {{-- product stock --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Stock<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_stock" value="{{ old('product_stock') }}"
                                    id="product_stock" placeholder="Product Stock" class="form-control">
                                <label for="">Stock</label>
                                <span class="text-danger" id="productStockError"></span>
                                {{-- <span>
                                    @error('product_stock')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span> --}}
                            </div>
                        </div>
                    </div>

                    {{-- product image --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Images<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div id="imagePreviewContainer" style="display: flex; flex-wrap: wrap;">
                                    <!-- Image previews will be appended here -->
                                </div>
                            </div>
                            <div class="row">
                                <div id="photoInput">
                                    <label for="photoUpload" class="form-label">Upload Photo</label>
                                    <input type="file" class="form-control" id="photoUpload" name="product_image[]"
                                        onchange="previewImages(event)" accept="image/*" multiple>
                                </div>
                                <span class="text-danger" id="imageError"></span>
                                {{-- <span>
                                    @error('product_image[]')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span> --}}
                            </div>
                            {{-- <div class="row"> --}}
                            {{-- <select class="form-select form-select-lg mb-3" name="image_and_video" id="image_and_video"
                                aria-label="Large select example">
                                <option selected>Select Season</option>
                                <option value="Photo">Photo</option>
                                <option value="Video">Video</option>
                            </select> --}}
                            {{-- </div> --}}
                            {{-- <div class="row form-floating">
                                <div id="photoInput" style="display: none;">
                                    <label for="photoUpload" class="form-label">Upload Photo</label>
                                    <input type="file" class="form-control" id="photoUpload" name="product_image[]"
                                        multiple>
                                </div>

                                <div id="videoInput" style="display: none;">
                                    <label for="videoLink">Video Link</label>
                                    <input type="text" class="form-control" id="videoLink" name="video_link"
                                        placeholder="Enter video link">
                                </div>
                            </div> --}}
                            {{-- <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name="product_image[]" multiple>
                                <span id="imageError" class="text-danger"></span>
                            </div> --}}
                        </div>
                    </div>

                    {{-- video --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            video<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating" id="videoInput">
                                        <input type="text" class="form-control" id="videoLink" name="video_link[]"
                                            placeholder="Enter video link">
                                        <label for="videoLink">Video Link</label>
                                        <span class="text-danger" id="videoError"></span>
                                    </div>
                                    {{-- <span>
                                        @error('video_link.0')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </span> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span id="videolinklist"> </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-primary my-2" id="addVideo">+</a>
                                    <a class="btn btn-danger my-2" id="removeVideo">-</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- season --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Season<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg mb-3" name="season"
                                aria-label="Large select example">
                                <option selected disabled>Select Season</option>
                                <option value="Winter">Winter</option>
                                <option value="Summer">Summer</option>
                                <option value="Monsoon">Monsoon</option>
                            </select>
                            <span class="text-danger" id="seasonError">

                                {{-- <span>
                                @error('season')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span> --}}
                        </div>
                    </div>

                    {{-- Product Category --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Category<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg mb-3" name="category_id"
                                aria-label="Large select example">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <optgroup label="{{ $category->categoryName }}">
                                        @foreach ($childcat as $childdata)
                                            @if ($childdata->parent_category_id == $category->id)
                                                <option value="{{ $childdata->id }}">{{ $childdata->categoryName }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <span class="text-danger" id="categoryError"></span>
                            {{-- <span>
                                @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span> --}}
                        </div>
                    </div>

                    {{-- Product Brand --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Brand<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg mb-3" name="brand_id"
                                aria-label="Large select example">
                                <option selected disabled>Select Brand</option>
                                @foreach ($brands as $branddata)
                                    <option value="{{ $branddata->id }}">{{ $branddata->brand_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="brandError"></span>
                            {{-- <span>
                                @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span> --}}
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"><i
                                class="fa-solid fa-floppy-disk"></i>
                            Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    {{-- script for ck editor --}}
    <script>
        // Initialize CKEditor for each
        CKEDITOR.replace('product_des');
        CKEDITOR.replace('product_des_guj');
        CKEDITOR.replace('product_des_hin');
    </script>

    {{-- script for validation  --}}
    <script>
        // Function to validate the form
        function validateForm() {
            const errors = [];

            // Get form values
            const product_name = document.getElementById('product_name').value;
            const product_name_guj = document.getElementById('product_name_guj').value;
            const product_name_hin = document.getElementById('product_name_hin').value;
            const product_des = CKEDITOR.instances.product_des.getData();
            const product_des_guj = CKEDITOR.instances.product_des_guj.getData();
            const product_des_hin = CKEDITOR.instances.product_des_hin.getData();
            // const product_des = document.getElementById('product_des').value;
            // const product_des_guj = document.getElementById('product_des_guj').value;
            // const product_des_hin = document.getElementById('product_des_hin').value;
            const unit_id = document.querySelectorAll('select[name="unit_id[]"]');
            const unit_det = document.querySelectorAll('input[name="unit_det[]"]');
            const price = document.querySelectorAll('input[name="price[]"]');
            const discount_per = document.querySelectorAll('input[name="discount_per[]"]');
            const selling_price = document.querySelectorAll('input[name="selling_price[]"]');
            const product_stock = document.getElementById('product_stock').value;
            const season = document.querySelector('select[name="season"]').value;
            const category_id = document.querySelector('select[name="category_id"]').value;
            const brand_id = document.querySelector('select[name="brand_id"]').value;
            const product_image = document.getElementById('photoUpload').files.length;
            const video_link = document.getElementById('videoLink').value;

            // Clear previous error messages
            document.querySelectorAll('.text-danger').forEach(function(element) {
                element.textContent = '';
            });

            // Validate product name
            let product_nameRegex = /^[A-Z][a-z]*(?: [A-Z][a-z]*)*$/;
            if (!product_name) {
                document.getElementById('productNameError').textContent = "Product name (English) is required.";
            } else if (!product_name || !product_nameRegex.test(product_name)) {
                document.getElementById('productNameError').textContent =
                    "Invalid Product Name. Productname must start with a upper case letter. Allowed characters are a-z (only upper and lower case).Do not enter any numbers or spacial characters";
            }

            if (!product_name_guj) {
                document.getElementById('productNameGujError').textContent = "Product name (Gujarati) is required.";
            } else if (!product_name_guj || !product_nameRegex.test(product_name_guj)) {
                document.getElementById('productNameGujError').textContent =
                    "Invalid Product Name. Productname must start with a upper case letter. Allowed characters are a-z (only upper and lower case).Do not enter any numbers or spacial characters";
            }

            if (!product_name_hin) {
                document.getElementById('productNameHinError').textContent = "Product name (Hindi) is required.";
            } else if (!product_name_hin || !product_nameRegex.test(product_name_hin)) {
                document.getElementById('productNameHinError').textContent =
                    "Invalid Product Name. Productname must start with a upper case letter. Allowed characters are a-z (only upper and lower case).Do not enter any numbers or spacial characters";
            }

            // Validate product description
            if (!product_des) {
                document.getElementById('productDesError').textContent = "Product description (English) is required.";
            }
            if (!product_des_guj) {
                document.getElementById('productDesGujError').textContent = "Product description (Gujarati) is required.";
            }
            if (!product_des_hin) {
                document.getElementById('productDesHinError').textContent = "Product description (Hindi) is required.";
            }

            // Validate unit details
            unit_id.forEach((unit, index) => {
                if (!unit.value || unit.value === "Select Unit") {
                    document.getElementById(`unitIdError${index + 1}`).textContent = "Unit ID is required.";
                }
            });
            unit_det.forEach((detail, index) => {
                if (!detail.value) {
                    document.getElementById(`unitDetError${index + 1}`).textContent = "Unit detail is required.";
                }
            });

            // Validate price, discount, and selling price
            const regex = /^[1-9]\d*$/;
            price.forEach((p, index) => {
                if (!p.value) {
                    document.getElementById(`productPriceError${index + 1}`).textContent = "Price is required.";
                } else if (!regex.test(p.value)) {
                    document.getElementById(`productPriceError${index + 1}`).textContent =
                        "Please enter a valid positive Number without decimals or special characters.";
                }
            });
            selling_price.forEach((s, index) => {
                if (!s.value) {
                    document.getElementById(`sellPriceError${index + 1}`).textContent =
                        "Selling price is required.";
                } else if (!regex.test(s.value)) {
                    document.getElementById(`sellPriceError${index + 1}`).textContent =
                        "Please enter a valid positive Number without decimals or special characters.";
                }
            });

            const disreg = /^(100|[1-9]?\d)$/;
            discount_per.forEach((d, index) => {
                if (!d.value) {
                    document.getElementById(`disPerError${index + 1}`).textContent =
                        "Discount percentage is required.";
                } else if (!disreg.test(d.value)) {
                    document.getElementById(`disPerError${index + 1}`).textContent =
                        "Please enter a valid discount percentage between 1 to 100.";
                }
            });

            // Validate product stock
            if (!product_stock || isNaN(product_stock)) {
                document.getElementById('productStockError').textContent = "Product stock is required and must be numeric.";
            }

            // Validate season, category and brand
            if (!season || season === "Select Season") {
                document.getElementById('seasonError').textContent = "Season is required.";
            }

            if (!category_id || category_id === "Select Category") {
                document.getElementById('categoryError').textContent = "Category is required.";
            }

            if (!brand_id || brand_id === "Select Brand") {
                document.getElementById('brandError').textContent = "Brand is required.";
            }

            // Validate image or video link (must provide at least one)
            if (product_image === 0 && !video_link) {
                document.getElementById("imageError").textContent =
                    "You must provide either a product image or a video link.";
                document.getElementById("videoError").textContent =
                    "You must provide either a product image or a video link.";
            }

            // Check if there are any errors
            const errorMessages = document.querySelectorAll('.text-danger');
            for (let error of errorMessages) {
                if (error.textContent.trim() !== '') {
                    return false; // Prevent form submission if any error message exists
                }
            }

            return true; // Allow form submission if no errors
        }

        // Attach validation function to form submit
        document.getElementById('productForm').onsubmit = function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        };
    </script>

    {{-- <script>
        // Function to validate the form
        function validateForm() {
            const errors = [];

            // Get form values
            const product_name = document.getElementById('product_name').value;
            const product_name_guj = document.getElementById('product_name_guj').value;
            const product_name_hin = document.getElementById('product_name_hin').value;
            const product_des = document.getElementById('product_des').value;
            const product_des_guj = document.getElementById('product_des_guj').value;
            const product_des_hin = document.getElementById('product_des_hin').value;
            const unit_id = document.querySelectorAll('select[name="unit_id[]"]');
            const unit_det = document.querySelectorAll('input[name="unit_det[]"]');
            const price = document.querySelectorAll('input[name="price[]"]');
            const discount_per = document.querySelectorAll('input[name="discount_per[]"]');
            const selling_price = document.querySelectorAll('input[name="selling_price[]"]');
            const product_stock = document.getElementById('product_stock').value;
            const season = document.querySelector('select[name="season"]').value;
            const category_id = document.querySelector('select[name="category_id"]').value;
            const product_image = document.getElementById('photoUpload').files.length;
            const video_link = document.getElementById('videoLink').value;

            // Validate product name
            if (!product_name) document.getElementById('productNameError').textContent =
                "Product name (English) is required.";
            if (!product_name) document.getElementById('productNameGujError').textContent =
                "Product name (Gujarati) is required.";
            if (!product_name) document.getElementById('productNameHinError').textContent =
                "Product name (Hindi) is required.";
            // if (!product_name_guj) errors.push("Product name (Gujarati) is required.");
            // if (!product_name_hin) errors.push("Product name (Hindi) is required.");

            // Validate product description
            // if (!product_des) document.getElementById('productDesError').textContent =
            //     "Product description (English) is required.";
            // if (!product_des_guj) document.getElementById('productDesGujError').textContent =
            //     "Product description (Gujarati) is required.";
            // if (!product_des_hin) document.getElementById('productDesHinError').textContent =
            //     "Product description (Hindi) is required.";
            // if (!product_des_guj) errors.push("Product description (Gujarati) is required.");
            // if (!product_des_hin) errors.push("Product description (Hindi) is required.");

            // Validate unit details
            unit_id.forEach((unit, index) => {
                if (!unit.value || unit.value === "Select Unit") {
                    document.getElementById(`unitIdError${index+1}`).textContent = "Unit ID is required.";
                    // errors.push(`Unit ID for row ${index + 1} is required.`);
                }
            });
            unit_det.forEach((detail, index) => {
                if (!detail.value) {
                    document.getElementById(`unitDetError${index+1}`).textContent = "Unit detail is required.";
                    // errors.push(`Unit detail for row ${index + 1} is required.`);
                }
            });

            // Validate price, discount, and selling price
            price.forEach((p, index) => {
                if (!p.value || isNaN(p.value)) {
                    document.getElementById(`productPriceError${index+1}`).textContent = "Price is required.";
                    // errors.push(`Price for row ${index + 1} is required and must be numeric.`);
                }
            });
            discount_per.forEach((d, index) => {
                if (!d.value || isNaN(d.value)) {
                    document.getElementById(`disPerError${index+1}`).textContent =
                        "Discount percentage is required.";
                    // errors.push(`Discount percentage for row ${index + 1} is required and must be numeric.`);
                }
            });
            selling_price.forEach((s, index) => {
                if (!s.value || isNaN(s.value)) {
                    document.getElementById(`sellPriceError${index+1}`).textContent = "Selling price is required.";
                    // errors.push(`Selling price for row ${index + 1} is required and must be numeric.`);
                }
            });

            // Validate product stock
            if (!product_stock || isNaN(product_stock)) {
                document.getElementById('productStockError').textContent = "Product stock is required and must be numeric.";
                // errors.push("Product stock is required and must be numeric.");
            }

            // Validate season and category
            // if (!season) document.getElementById('seasonError').textContent = "Season is required.";
            // // if (!season) errors.push("Season is required.");
            // if (!category_id) document.getElementById('categoryError').textContent = "Category is required.";

            // Validate image or video link (must provide at least one)
            if (product_image === 0 && !video_link) {
                document.getElementById("imageError").textContent =
                    "You must provide either a product image or a video link.";
                document.getElementById("videoError").textContent =
                    "You must provide either a product image or a video link.";
                // errors.push("You must provide either a product image or a video link.");
            }

            if (!season || season === "Select Season") {
                document.getElementById('seasonError').textContent = "Season is required.";
            }

            if (!category_id || category_id === "Select Category") {
                document.getElementById('categoryError').textContent = "Category is required.";
            }
            // if (product_image > 0 && video_link) {
            //     errors.push("You cannot provide both a product image and a video link.");
            // }

            // If there are errors, show them in an alert and prevent form submission
            if (document.querySelectorAll('.text-danger').length > 0) {
                return false; // Prevent form submission
            } else {
                return true; // Allow form submission if no errors
            }
        }

        // Attach validation function to form submit
        document.getElementById('productForm').onsubmit = function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        };
    </script> --}}

    {{-- script for image preview --}}
    <script>
        function previewImages(event) {
            const files = event.target.files;
            const container = document.getElementById('imagePreviewContainer');
            container.innerHTML = ''; // Clear previous previews

            // Loop through the selected files
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.style.width = '100px'; // Customize size
                    imgElement.style.margin = '5px';

                    // Append the image to the preview container
                    container.appendChild(imgElement);
                };

                // Read the file as a Data URL (base64)
                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        }
    </script>

    {{-- script for add new video link --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('addVideo').addEventListener('click', function() {

                const list = document.getElementById('videolinklist');

                let newinput = document.createElement('input');
                newinput.type = 'text';
                newinput.classList.add('form-control', 'my-1');
                newinput.id = 'videoLink';
                newinput.name = 'video_link[]';
                newinput.placeholder = 'Enter video link';


                list.appendChild(newinput);
            });

            document.getElementById('removeVideo').addEventListener('click', function() {
                const link = document.getElementById('videolinklist');
                link.removeChild(link.lastElementChild);
            });
        })
    </script>

    {{-- script for add new row in unit table --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addUnitBtn = document.getElementById("addUnit");
            const removeUnitBtn = document.getElementById("removeUnit");
            const unitTableBody = document.getElementById("unitTableBody");

            let firstRowAdded = false; // Track if the first row has been added

            // Get all the old values from the Laravel session (use json to make it available in JS)
            const oldValues = {
                unit_id: @json(old('unit_id', [])),
                unit_det: @json(old('unit_det', [])),
                price: @json(old('price', [])),
                discount_per: @json(old('discount_per', [])),
                selling_price: @json(old('selling_price', []))
            };

            let rowCounter = 1;

            // Function to create and add a new row
            function addNewRow(unitIdValue = '', unitDetValue = '', priceValue = '', discountPerValue = '',
                sellingPriceValue = '') {
                const newRow = document.createElement("tr");
                newRow.classList.add("unitRow");

                rowCounter++;

                newRow.innerHTML = `
            <td>
                <select class="form-select form-select-lg mb-3" name="unit_id[]"
                aria-label="Large select example">
                    <option selected disabled>Select Unit</option>
                    @foreach ($units as $data)
                        <option value="{{ $data->id }}" ${unitIdValue === '{{ $data->id }}' ? 'selected' : ''}>
                            {{ $data->unit }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger" id="unitIdError${rowCounter}"></span>
            </td>
            <td>
                <div class="form-floating">
                    <input type="text" name="unit_det[]" value="${unitDetValue || ''}"
                    placeholder="Unit Detail in Approx Weight" class="form-control">
                    <label for="">Approx Weight</label>
                    <span class="text-danger" id="unitDetError${rowCounter}"></span>
                </div>
            </td>
            <td>
                <div class="form-floating">
                    <input type="number" name="price[]" value="${priceValue || ''}"
                    placeholder="Product Price" class="form-control">
                    <label for="">Product Price</label>
                    <span class="text-danger" id="productPriceError${rowCounter}"></span>
                </div>
            </td>
            <td>
                <div class="form-floating">
                    <input type="number" name="discount_per[]"
                    value="${discountPerValue || ''}"
                    placeholder="Discount Percentage" class="form-control">
                    <label for="">Discount Per</label>
                    <span class="text-danger" id="disPerError${rowCounter}"></span>
                </div>
            </td>
            <td>
                <div class="form-floating">
                    <input type="number" name="selling_price[]" value="${sellingPriceValue || ''}"
                    placeholder="Selling Price" class="form-control">
                    <label for="">Selling Price</label>
                    <span class="text-danger" id="sellPriceError${rowCounter}"></span>
                </div>
            </td>
        `;

                // Insert the new row before the buttons row
                unitTableBody.insertBefore(newRow, document.getElementById("unitButtonsRow"));

                // Mark that the first row has been added
                // if (!firstRowAdded) {
                //     firstRowAdded = true;
                //     newRow.setAttribute('data-first-row', 'true'); // Add a special attribute to track it
                // }
            }


            // Function to load all rows from the old input data
            const unitCount = oldValues.unit_id.length;

            function loadOldRows() {
                // Loop through each index in the old data arrays and add rows accordingly
                for (let i = 1; i < unitCount; i++) {
                    addNewRow(
                        oldValues.unit_id[i],
                        oldValues.unit_det[i],
                        oldValues.price[i],
                        oldValues.discount_per[i],
                        oldValues.selling_price[i]
                    );
                }
            }

            // Load old rows on page load (first row will be added automatically by this)
            loadOldRows();
            // window.framekiller = true;

            // window.onload = function() {
            //     if (window.framekiller) {
            //         addNewRow();
            //         window.framekiller = false; // Ensure the function runs only once
            //     }
            // };


            // Event listener for adding a new row
            addUnitBtn.addEventListener("click", function() {
                // Add a new row with empty values for inputs
                addNewRow();
            });

            // Event listener for removing the last row
            removeUnitBtn.addEventListener("click", function() {
                const rows = document.querySelectorAll(".unitRow");

                // Only remove a row if there are more than one row
                if (rows.length > 1) {
                    const lastRow = rows[rows.length - 1];
                    const isFirstRow = lastRow.getAttribute('data-first-row') === 'true';

                    // Prevent removing the first row
                    if (isFirstRow) {
                        alert("The first row cannot be removed.");
                    } else {
                        lastRow.remove(); // Remove the last added row
                    }
                } else {
                    alert("At least one row must remain.");
                }
            });
        });
    </script>


    {{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const addUnitBtn = document.getElementById("addUnit");
        const removeUnitBtn = document.getElementById("removeUnit");
        const unitTableBody = document.getElementById("unitTableBody");

        const oldValues = {
            unit_id: @json(old('unit_id', [])),
            unit_det: @json(old('unit_det', [])),
            price: @json(old('price', [])),
            discount_per: @json(old('discount_per', [])),
            selling_price: @json(old('selling_price', []))
        };

        // Function to create and add a new row
        function addNewRow(unitIdValue = '', unitDetValue = '', priceValue = '', discountPerValue = '', sellingPriceValue = '') {
            const newRow = document.createElement("tr");
            newRow.classList.add("unitRow");

            newRow.innerHTML = `
                <td>
                    <select class="form-select form-select-lg mb-3" name="unit_id[]"
                    aria-label="Large select example">
                        <option selected disabled>Select Unit</option>
                        @foreach ($units as $data)
                            <option value="{{ $data->id }}" ${unitIdValue === '{{ $data->id }}' ? 'selected' : ''}>
                                {{ $data->unit }}
                            </option>
                        @endforeach
                    </select>
                    <span>
                        @error('unit_id.*')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </span>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" name="unit_det[]" value="${unitDetValue || ''}"
                        placeholder="Unit Detail in Approx Weight" class="form-control">
                        <label for="">Approx Weight</label>
                        <span>
                            @error('unit_det.*')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </span>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="number" name="price[]" value="${priceValue || ''}"
                        placeholder="Product Price" class="form-control">
                        <label for="">Product Price</label>
                        <span>
                            @error('price.*')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </span>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="number" name="discount_per[]"
                        value="${discountPerValue || ''}"
                        placeholder="Discount Percentage" class="form-control">
                        <label for="">Discount Per</label>
                        <span>
                            @error('discount_per.*')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </span>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="number" name="selling_price[]" value="${sellingPriceValue || ''}"
                        placeholder="Selling Price" class="form-control">
                        <label for="">Selling Price</label>
                        <span>
                            @error('selling_price.*')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </span>
                    </div>
                </td>
            `;

            // Insert the new row before the buttons row
            unitTableBody.insertBefore(newRow, document.getElementById("unitButtonsRow"));
        }

        // Function to load all rows from the old input data
        function loadOldRows() {
            // Loop through each index in the old data arrays and add rows accordingly
            const unitCount = oldValues.unit_id.length;
            for (let i = 0; i < unitCount; i++) {
                addNewRow(
                    oldValues.unit_id[i],
                    oldValues.unit_det[i],
                    oldValues.price[i],
                    oldValues.discount_per[i],
                    oldValues.selling_price[i]
                );
            }
        }

        // Load old rows on page load
        loadOldRows();

        // Event listener for adding a new row
        addUnitBtn.addEventListener("click", function() {
            // Add a new row with empty values for inputs
            addNewRow();
        });

        // Event listener for removing the last row
        removeUnitBtn.addEventListener("click", function() {
            const rows = document.querySelectorAll(".unitRow");

            // Only remove a row if there are more than one row
            if (rows.length > 1) {
                const lastRow = rows[rows.length - 1];
                lastRow.remove(); // Remove the last added row
            } else {
                alert("At least one row must remain.");
            }
        });
    });
    </script> --}

    {{-- <script>
        function calculateSellingPrice() {
            $('#unitTableBody').on('input', 'input[name="price[]"], input[name="discount_per[]"]', function() {
                // Find the row the input belongs to
                var row = $(this).closest('tr');

                // Get the price and discount values from the inputs
                var price = parseFloat(row.find('input[name="price[]"]').val()) || 0;
                var discountPercentage = parseFloat(row.find('input[name="discount_per[]"]').val()) || 0;

                // Calculate the discount amount
                var discountAmount = (price * discountPercentage) / 100;

                // Calculate the selling price
                var sellingPrice = price - discountAmount;

                // Set the calculated selling price in the corresponding input field
                row.find('input[name="selling_price[]"]').val(sellingPrice.toFixed(
                    2)); // Displaying with two decimals
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            const addUnitBtn = document.getElementById("addUnit");
            const removeUnitBtn = document.getElementById("removeUnit");
            const unitTableBody = document.getElementById("unitTableBody");

            addUnitBtn.addEventListener("click", function() {
                // Create a new row dynamically
                const newRow = document.createElement("tr");
                newRow.classList.add("unitRow");

                newRow.innerHTML = `
            <td>
                <select class="form-select form-select-lg mb-3" name="unit_id[]"
                aria-label="Large select example">
                    <option selected disabled>Select Unit</option>
                        @foreach ($units as $data)
                            <option value="{{ $data->id }}">{{ $data->unit }}</option>
                                @endforeach
                </select>
                <span>
                    @error('unit_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </span>
            </td>
            <td>
                <div class="form-floating">
                    <input type="text" name="unit_det[]" value="{{ old('unit_det[]') }}"
                    placeholder="Unit Detail in Approx Weight" class="form-control">
                    <label for="">Approx Weight</label>
                    <span>
                        @error('unit_det.*')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </span>
                </div>
            </td>
            <td>
                <div class="form-floating">
                    <input type="number" name="price[]" placeholder="Product Price"
                    class="form-control">
                    <label for="">Product Price</label>
                    <span>
                        @error('price.*')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </span>
                </div>
            </td>
            <td>
                <div class="form-floating">
                    <input type="number" name="discount_per[]"
                    placeholder="Discount Percentage" class="form-control">
                    <label for="">Discount Per</label>
                    <span>
                        @error('discount_per.*')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </span>
                </div>
            </td>
            <td>
                <div class="form-floating">
                    <input type="number" name="selling_price[]" placeholder="Selling Price"
                    class="form-control">
                    <label for="">Selling Price</label>
                    <span>
                        @error('selling_price.*')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </span>
                </div>
            </td>
        `;

                // Insert before the buttons row
                unitTableBody.insertBefore(newRow, document.getElementById("unitButtonsRow"));
            });

            removeUnitBtn.addEventListener("click", function() {
                const rows = document.querySelectorAll(".unitRow");
                if (rows.length > 1) {
                    rows[rows.length - 1].remove(); // Remove the last added row
                } else {
                    alert("At least one row must remain.");
                }
            });
        });
    </script> --}}

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {

            for video link add and remove
            const addVideoButton = document.getElementById("addVideo");
            const videoLinkInput = document.getElementById("videoLink");



            for add and remove unit
            const addUnitButton = document.getElementById("addUnit");
            const tablebody = document.getElementById('unitTable').getElementsByTagName('tbody')[0];

            function addButtonsToLastRow() {
                const lastRow = tablebody.lastElementChild;
                if (lastRow) {
                    const buttonCell = document.createElement('td');
                    buttonCell.style.display = "flex";
                    buttonCell.style.gap = "5px";

                    // Create and add the "Add" button
                    const addButton = document.createElement('a');
                    addButton.classList.add('btn', 'btn-primary', 'my-2');
                    addButton.textContent = '+';
                    addButton.id = 'addUnit';
                    buttonCell.appendChild(addButton);

                    // Create and add the "Remove" button
                    const removeButton = document.createElement('a');
                    removeButton.classList.add('btn', 'btn-danger', 'my-2');
                    removeButton.textContent = '-';
                    removeButton.id = 'removeUnit';
                    buttonCell.appendChild(removeButton);

                    lastRow.appendChild(buttonCell);
                }
            }

            if (tablebody.rows.length > 0) {
                addButtonsToLastRow(); // Add buttons to the last row after page load
            }

            document.getElementById('addUnit').addEventListener('click', function() {

                const newrow = document.createElement('tr');

                newrow.innerHTML = `
                                <td>
                                    <select class="form-select form-select-lg mb-3" name="unit_id[]"
                                        aria-label="Large select example">
                                        <option selected>Select Unit</option>
                                        @foreach ($units as $data)
                                            <option value="{{ $data->id }}">{{ $data->unit }}</option>
                                        @endforeach
                                    </select>
                                    <span id="unitIdError" class="text-danger"></span>
                                </td>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" name="unit_det[]" id="unit_det"
                                            placeholder="Unit Detail in Aprox Weight" class="form-control">
                                        <label for="">Aprox Weight</label>
                                        <span id="unitdetailError" class="text-danger"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" name="discount_per[]" id="discount_per"
                                            placeholder="Discount Percentage" class="form-control">
                                        <label for="">Discount Per </label>
                                        <span id="discountperError" class="text-danger"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-floating">
                                        <input type="text" name="sellin_price[]" id="selling_price"
                                            placeholder="Selling Price" class="form-control">
                                        <label for="">Selling Price</label>
                                        <span id="sellingpriceError" class="text-danger"></span>
                                    </div>
                                </td>`;

                tablebody.appendChild(newrow);
            });

            document.getElementById('removeUnit').addEventListener('click', function() {
                const tbody = document.getElementById('unitTable').getElementsByTagName('tbody')[0];
                if (tbody.rows.length > 1) {
                    tbody.removeChild(tbody.lastElementChild);
                }
            });
        })
    </script> --}}

    {{-- <script>
        function readURL(input, tgt) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector(tgt).setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $("#productForm").on("submit", function(e) {
                e.preventDefault();

                $('#nameError').text('Please Enter Name');
                $('#nameErrorGuj').text('Please Enter Name');
                $('#nameErrorHin').text('Please Enter Name');
                $('#descriptionError').text('Please Enter Description');
                $('#descriptionErrorGuj').text('Please Enter Description');
                $('#descriptionErrorHin').text('Please Enter Description');
                $('#priceError').text('Please Enter Price');
                $('#stockError').text('Please Enter Stock');
                $('#imageError').text('Please Select Images');
                $('#seasonError').text('PLease Select Season');
                $('#categoryIdError').text('Please Select category');

                let formData = new FormData(this);

                let name = $('#product_name').val();
                console.log(name);

                let category_id = $('#category_id').val();
                console.log(category_id);

                let image = $('#image')[0].files[0];

                let isValid = true;
                if (!image) {
                    $('#thumbnailError').text('Thumbnail is required.');
                    isValid = false;
                } else {
                    let fileType = image.type.split('/')[1].toLowerCase();
                    let allowedTypes = ['jpeg', 'jpg', 'png'];
                    if (!allowedTypes.includes(fileType)) {
                        $('#thumbnailError').text('Only JPG, JPEG, and PNG are allowed.');
                        isValid = false;
                    }
                    if (image.size > 2 * 1024 * 1024) {
                        $('#thumbnailError').text('Image size must be less than 2MB.');
                        isValid = false;
                    }
                }

                if (!name) {
                    $('#nameError').text('Category Name is required.');
                    isValid = false;
                }


                if (!category_id || category_id === "-- select category --") {
                    $('#categoryIdError').text('Category is required.');
                    isValid = false;
                }

                if (isValid) {
                    $.ajax({
                        url: "{{ route('product.store') }}",
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.success) {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "2000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                                toastr.success(response.message);
                                $('button[type="submit"]').text('Submitted').prop('disabled',
                                    true);
                                $('#productForm')[0].reset();
                                $('#img1').attr("src",
                                    "{{ asset('defaultimage/default4.jpg') }}");
                                setTimeout(function() {
                                    window.location.href =
                                        "{{ route('product.index') }}";
                                }, 2000);

                            } else {
                                if (response.errors) {
                                    $.each(response.errors, function(key, value) {
                                        toastr.error(value[0]);
                                    });
                                } else {
                                    toastr.error('An error occurred. Please try again.');
                                }

                            }
                        },
                        error: function(xhr, status, error) {
                            toastr.error('An error occurred: ' + error);
                        }
                    });
                }
            });
        });
    </script> --}}

    {{-- <script>
        // Get the select element
        const imageAndVideoSelect = document.getElementById('image_and_video');

        // Get the divs for photo and video inputs
        const photoInput = document.getElementById('photoInput');
        const videoInput = document.getElementById('videoInput');

        // Add event listener for the change event on the select dropdown
        imageAndVideoSelect.addEventListener('change', function() {
            // Reset both inputs to hide them initially
            photoInput.style.display = 'none';
            videoInput.style.display = 'none';

            // Check the selected value and display the appropriate input
            if (this.value === 'Photo') {
                photoInput.style.display = 'block'; // Show the file input for photo
            } else if (this.value === 'Video') {
                videoInput.style.display = 'block'; // Show the text input for video link
            }
        });
    </script> --}}

@endsection
