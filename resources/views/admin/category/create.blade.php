@extends('layouts.app')
@section('header', 'Category Create')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Create New Category</h6>
                    </div>
                    <div class="col" align="right">
                        <button class="btn btn-primary" type="button" onclick="javascript:history.go(-1)"> Back </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="categoryForm">
                    @csrf
                    {{-- Category --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Name <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="category_name" id="category_name" placeholder="Category Name"
                                    class="form-control">
                                <label for="">English</label>
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="category_name_guj" id="category_name"
                                    placeholder="Category Name Gujarati" class="form-control">
                                <label for="">Gujarati</label>
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="category_name_hin" id="category_name"
                                    placeholder="Category Name Hindi" class="form-control">
                                <label for="">Hindi</label>
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Category Description --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="category_des" id="category_name"
                                            placeholder="Category Name" class="form-control">
                                        <label for="">English</label>
                                        <span id="nameError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="category_des_guj" id="category_name"
                                            placeholder="Category Name" class="form-control">
                                        <label for="">Gujarati</label>
                                        <span id="nameError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="category_des_hin" id="category_name"
                                            placeholder="Category Name" class="form-control">
                                        <label for="">Hindi</label>
                                        <span id="nameError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Category Image --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Image <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form">
                                <input type="file" name="category_image" id="category_Image" placeholder="Category Name"
                                    class="form-control">
                                {{-- <label for="">Image</label> --}}
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Parent Category --}}
                    <div class="row mb-3">
                        {{-- <div class="form-group"> --}}
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Parent Category<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select ddCategory" name="parent_id[]" class="form-control">
                                <option value="0" selected>-- select category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            <span id="parentIdError" class="text-danger"></span>
                        </div>
                        {{-- </div> --}}
                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                    class="fa-solid fa-floppy-disk"></i> Submit</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $("#categoryForm").on("submit", function(e) {
                e.preventDefault();

                $('#nameError').text('');
                $('#parentIdError').text('');

                let formData = new FormData(this);

                let name = $('#category_name').val();
                console.log(name);

                let parent_id = $('#parent_id').val();

                let isValid = true;


                if (!name) {
                    $('#nameError').text('Category Name is required.');
                    isValid = false;
                }


                if (parent_id == '0') {
                    $('#parentIdError').text('Parent Category is required.');
                    isValid = false;
                }

                if (isValid) {
                    $.ajax({
                        url: "{{ route('category.store') }}",
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                        },
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
                                $('#categoryForm')[0].reset();
                                setTimeout(function() {
                                    window.location.href =
                                        "{{ route('category.index') }}";
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
    </script>

@endsection
