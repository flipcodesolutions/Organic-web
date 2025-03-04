@extends('layouts.app')
@section('header', 'Products Create')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Create New Products</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('product.index') }}" class="btn btn-primary" type="button"> Back </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="productForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
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
                                <span>
                                    @error('product_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_name_guj" value="{{ old('product_name_guj') }}"
                                    id="product_name" placeholder="Product Name Gujarati" class="form-control">
                                <label for="">Gujarati</label>
                                <span>
                                    @error('product_name_guj')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_name_hin" value="{{ old('product_name_hin') }}"
                                    id="product_name" placeholder="Product Name Hindi" class="form-control">
                                <label for="">Hindi</label>
                                <span>
                                    @error('product_name_hin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- product description --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description Eng<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="product_des" placeholder="product_des" id="floatingTextarea">{{ old('product_des') }}</textarea>
                                {{-- <input type="text" name="product_des" id="product_des"
                                            placeholder="Product Description" class="form-control">
                                        <label for="">English</label> --}}
                                <span>
                                    @error('product_des')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description Guj<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="product_des_guj" placeholder="product_des_guj" id="floatingTextarea">{{ old('product_des_guj') }}</textarea>
                                {{-- <input type="text" name="product_des_guj" id="product_des_guj"
                                            placeholder="Product Description Gujarati" class="form-control">
                                        <label for="">Gujarati</label> --}}
                                <span>
                                    @error('product_des_guj')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description Hin<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="product_des_hin" placeholder="product_des_hin" id="floatingTextarea">{{ old('product_des_hin') }}</textarea>
                                {{-- <input type="text" name="product_des_hin" id="product_des"
                                            placeholder="Product Description Hindi" class="form-control">
                                        <label for="">Hindi</label> --}}
                                <span>
                                    @error('product_des_hin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
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
                        <div class="col">
                            <table class="table table-bordered mt-2" id="unitTable">
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
                                                aria-label="Large select example" id="unit">
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
                                                <input type="text" name="unit_det[]"
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
                                <input type="number" name="product_stock" value="{{ old('product_stock') }}"
                                    id="product_stock" placeholder="Product Stock" class="form-control">
                                <label for="">Stock</label>
                                <span>
                                    @error('product_stock')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
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
                                <span>
                                    @error('product_image.*')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
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
                            <div class="form-floating" id="videoInput">
                                <input type="text" class="form-control" id="videoLink" name="video_link[]"
                                    placeholder="Enter video link">
                                <span id="videolinklist"> </span>
                                <span>
                                    @error('video_link.*')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                                <label for="videoLink">Video Link</label>
                                <a class="btn btn-primary my-2" id="addVideo">+</a>
                                <a class="btn btn-danger my-2" id="removeVideo">-</a>
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
                            <span>
                                @error('season')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
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
                            <span>
                                @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                class="fa-solid fa-floppy-disk"></i>
                            Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>
        // Initialize CKEditor for each
        CKEDITOR.replace('product_des');
        CKEDITOR.replace('product_des_guj');
        CKEDITOR.replace('product_des_hin');
    </script>

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

    <script>
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
                    <input type="text" name="unit_det[]"
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
    </script>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                const output = document.getElementById('profilePicPreview');
                const outputclass = document.getElementById('imagepreview');
                output.src = reader.result;
                // outputclass.style.display = 'flex';
                // outputclass.style.justify-content = 'center'; // Show the image
            };

            if (file) {
                reader.readAsDataURL(file); // Read the file as a Data URL
            }
        }
    </script>

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
