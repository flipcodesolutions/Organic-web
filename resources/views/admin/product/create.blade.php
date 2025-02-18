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
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

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
                                <input type="text" name="product_name" id="product_name" placeholder="product Name"
                                    class="form-control">
                                <label for="">English</label>
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_name_guj" id="product_name"
                                    placeholder="Product Name Gujarati" class="form-control">
                                <label for="">Gujarati</label>
                                <span id="nameErrorGuj" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_name_hin" id="product_name"
                                    placeholder="Product Name Hindi" class="form-control">
                                <label for="">Hindi</label>
                                <span id="nameErrorHin" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- product description --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="product_des" id="product_des"
                                            placeholder="Product Description" class="form-control">
                                        <label for="">English</label>
                                        <span id="descriptionError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="product_des_guj" id="product_des"
                                            placeholder="Product Description Gujarati" class="form-control">
                                        <label for="">Gujarati</label>
                                        <span id="descriptionErrorGuj" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="product_des_hin" id="product_des"
                                            placeholder="Product Description Hindi" class="form-control">
                                        <label for="">Hindi</label>
                                        <span id="descriptionErrorHin" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- product price --}}
                    <div class="row mb-3">
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
                    </div>

                    {{-- product stock --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Stock<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="number" name="product_stock" id="product_stock"
                                    placeholder="Product Stock" class="form-control">
                                <label for="">Stock</label>
                                <span id="stockError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- product image --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Images/Videos<span class="text-danger">*</span>
                        </div>
                        <div class="col">

                            {{-- <select class="form-select form-select-lg mb-3" name="image_and_video" aria-label="Large select example">
                                <option selected>Select Season</option>
                                <option value="Photo">Photo</option>
                                <option value="Video">Video</option>
                            </select> --}}

                            {{-- <div class="row"> --}}
                                <select class="form-select form-select-lg mb-3" name="image_and_video"
                                    id="image_and_video" aria-label="Large select example">
                                    <option selected>Select Season</option>
                                    <option value="Photo">Photo</option>
                                    <option value="Video">Video</option>
                                </select>
                            {{-- </div> --}}
                            <div class="row form-floating">
                                <div id="photoInput" style="display: none;">
                                    <label for="photoUpload" class="form-label">Upload Photo</label>
                                    <input type="file" class="form-control" id="photoUpload" name="product_image[]" multiple>
                                </div>

                                <div id="videoInput" style="display: none;">
                                    <label for="videoLink">Video Link</label>
                                    <input type="text" class="form-control" id="videoLink" name="video_link"
                                    placeholder="Enter video link">
                                </div>
                            </div>
                            {{-- <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name="product_image[]" multiple>
                                <span id="imageError" class="text-danger"></span>
                            </div> --}}
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
                                <option selected>Select Season</option>
                                <option value="Winter">Winter</option>
                                <option value="Summer">Summer</option>
                                <option value="Monsoon">Monsoon</option>
                            </select>
                        </div>
                        <span id="seasonError" class="text-danger"></span>
                    </div>

                    {{-- Product Category --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Category<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg mb-3" name="category_id"
                                aria-label="Large select example">
                                <option selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                                @endforeach
                            </select>
                            <span id="categoryIdError" class="text-danger"></span>
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                class="fa-solid fa-floppy-disk"></i> Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

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

    <script>
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
    </script>

@endsection
