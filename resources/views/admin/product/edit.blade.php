@extends('layouts.app')
@section('header', 'Edit Product')
@section('content')
<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Edit Product</h6>
                </div>
                <div class="col" align="right">
                    <button class="btn btn-primary" type="button" onclick="javascript:history.go(-1)"> Back </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form id="productForm"
                enctype="multipart/form-data">
                @csrf
                <!-- This is necessary for PUT request -->

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Product Name:</strong>
                            <input type="text" name="product_name" id="product_name"
                                value="{{ $product->product_name }}" placeholder="Product Name" class="form-control">
                            <span id="nameError" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Category:</strong>
                            <select class="form-select ddCategory" name="category_id" id="category_id"
                                class="form-control">
                                <option selected>-- select category --</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ?
                                    'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                            </select>
                            <span id="categoryIdError" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12 col-lg-2 col-md-12">
                            <img class="mt-2" id="img1"
                                src="{{ url('collection/product/productimage/' . $product->Thumbnail) }}" height="100px"
                                class="img">
                        </div>
                        <div class="col-sm-12 col-lg-10 col-md-12">
                            <div class="row">
                                <div class="col-lg-8 mt-2">
                                    <input type="file" class="form-control" id="image" onchange="readURL(this,'#img1')"
                                        accept="image/*" name="Thumbnail" value="{{ $product->Thumbnail }}">
                                    {{ $product->Thumbnail }}
                                    <span id="thumbnailError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                class="fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
    function readURL(input, tgt) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector(tgt).setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function () {
    $("#productForm").on("submit", function (e) {
        e.preventDefault();  

        // Clear previous errors
        $('#nameError').text('');
        $('#categoryIdError').text('');
        $('#thumbnailError').text('');

        let formData = new FormData(this);

        let name = $('#product_name').val();
        let category_id = $('#category_id').val();
        let image = $('#image')[0].files[0];

        let isValid = true;
        
        // Validate product name
        if (!name) {
            $('#nameError').text('Product Name is required.');
            isValid = false;
        }
        
        // Validate category selection
        if (!category_id || category_id === "-- select category --") {
            $('#categoryIdError').text('Category is required.');
            isValid = false;
        }

        // Validate image file if provided
        if (image) {
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

        if (isValid) {
            $.ajax({
                url: "{{ route('product.update', $product->id) }}", 
                method: "POST",
                data: formData,
                processData: false, 
                contentType: false, 
                success: function (response) {
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
                        };
                        toastr.success(response.message);
                        $('button[type="submit"]').text('Submitted').prop('disabled', true);
                        $('#productForm')[0].reset();
                        setTimeout(function() {
                            window.location.href = "{{ route('product.index') }}";
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
                error: function (xhr, status, error) {
                    toastr.error('An error occurred: ' + error); 
                }
            });
        }
    });
});

</script>

@endsection