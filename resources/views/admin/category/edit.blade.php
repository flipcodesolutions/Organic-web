@extends('layouts.app')
@section('header', 'Category Create')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Update New Category</h6>
                    </div>
                    <div class="col" align="right">
                        <button class="btn btn-primary" type="button" onclick="javascript:history.go(-1)"> Back </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="categoryForm">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Name <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="category_name" id="category_name" placeholder="Category Name"
                                    class="form-control" value="{{ $category->categoryName }}">
                                <label for="">English</label>
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="category_name_guj" id="category_name"
                                    placeholder="Category Name Gujarati" class="form-control"
                                    value="{{ $category->categoryNameGuj }}">
                                <label for="">Gujarati</label>
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="category_name_hin" id="category_name"
                                    placeholder="Category Name Hindi" class="form-control"
                                    value="{{ $category->categoryNameHin }}">
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
                                            placeholder="Category Name" class="form-control"
                                            value="{{ $category->categoryDescription }}">
                                        <label for="">English</label>
                                        <span id="nameError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="category_des_guj" id="category_name"
                                            placeholder="Category Name" class="form-control"
                                            value="{{ $category->categoryDescriptionGuj }}">
                                        <label for="">Gujarati</label>
                                        <span id="nameError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="category_des_hin" id="category_name"
                                            placeholder="Category Name" class="form-control"
                                            value="{{ $category->categoryDescriptionHin }}">
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
                        <div class="col-2">
                            <img src="{{ asset('categoryImage/' . $category->cat_icon) }}" alt="" height="100px">
                        </div>
                        <div class="col">
                            <div class="form">
                                <input type="file" name="category_image" id="category_Image"
                                    placeholder="Category Name" class="form-control">
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
                            {{-- <select class="form-select ddCategory" name="parent_id[]" class="form-control">
                            <option value="0" selected>-- select category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select> --}}
                            <select class="form-select ddCategory" name="parent_id[]" class="form-control">
                                <option value="0" {{ $category->parent_id == 0 ? 'selected' : '' }}>-- select category
                                    --</option>
                                @foreach ($categories as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                        {{ $category->parent_id == $categoryOption->id ? 'selected' : '' }}>
                                        {{ $categoryOption->category_name }}
                                    </option>
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

                    {{-- <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Parent Category:</strong>
                            
                            <span id="parent_id_error" class="text-danger"></span>
                        </div>
                    </div>
                </div> --}}
                    {{-- <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                class="fa-solid fa-floppy-disk"></i> Submit</button>
                    </div>
                </div> --}}
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#categoryForm').on('submit', function(e) {
                e.preventDefault();

                $('#category_name_error').text('');
                $('#parent_id_error').text('');

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('category.update', $category->id) }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // alert("Category created successfully!");
                            window.location.href = "{{ route('category.index') }}"; 
                        } else {
                            alert("Error: " + response.message);
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            if (errors.category_name) {
                                $('#category_name_error').text(errors.category_name[0]);
                            }
                            if (errors.parent_id) {
                                $('#parent_id_error').text(errors.parent_id[0]);
                            }
                        } else {
                            alert('An error occurred. Please try again.');
                        }
                    }
                });
            });
        });
    </script>
@endsection
