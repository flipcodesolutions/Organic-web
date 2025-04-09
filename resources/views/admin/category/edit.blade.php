@extends('layouts.app')
@section('header', 'Category Create')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
        </div>
        <a href="{{ route('category.index') }}" class="btn btn-primary" type="button" onclick="javascript:history.go(-1)"> Back
        </a>
    </div>

    <div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 200px">Update New Category</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('category.index') }}" class="btn btn-primary" type="button"
                            onclick="javascript:history.go(-1)"> Back </a>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <form action="{{ route('category.update') }}/{{ $category->id }}" method="post"
                    enctype="multipart/form-data" class="form">
                    @csrf

                    {{-- category name --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Name <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="category_name" id="category_name" placeholder="Category Name"
                                    class="form-control" value="{{ $category->categoryName }}">
                                <label for="">English</label>
                                <span>
                                    @error('category_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="category_name_guj" id="category_name"
                                    placeholder="Category Name Gujarati" class="form-control"
                                    value="{{ $category->categoryNameGuj }}">
                                <label for="">Gujarati</label>
                                <span>
                                    @error('category_name_guj')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="category_name_hin" id="category_name"
                                    placeholder="Category Name Hindi" class="form-control"
                                    value="{{ $category->categoryNameHin }}">
                                <label for="">Hindi</label>
                                <span>
                                    @error('category_name_hin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Category Description --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="category_des" value="{{ old('product_des') }}"
                                    placeholder="Category Description English" id="floatingTextarea">{{ $category->categoryDescription }}</textarea>
                                {{-- <input type="text" name="category_des" id="category_name"
                                            placeholder="Category Name" class="form-control"
                                            value="{{ $category->categoryDescription }}">
                                        <label for="">English</label> --}}
                                <span>
                                    @error('category_des')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description Gujarati<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="category_des_guj" value="{{ old('product_des_guj') }}"
                                    placeholder="Category Description Gujarati" id="floatingTextarea">{{ $category->categoryDescriptionGuj }}</textarea>
                                {{-- <input type="text" name="category_des_guj" id="category_name"
                                    placeholder="Category Name" class="form-control"
                                    value="{{ $category->categoryDescriptionGuj }}">
                                <label for="">Gujarati</label> --}}
                                <span>
                                    @error('category_des_guj')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description Hindi<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="category_des_hin" value="{{ old('product_des_hin') }}"
                                    placeholder="Category Description Hindi" id="floatingTextarea">{{ $category->categoryDescriptionHin }}</textarea>
                                {{-- <input type="text" name="category_des_hin" id="category_name"
                                    placeholder="Category Name" class="form-control"
                                    value="{{ $category->categoryDescriptionHin }}">
                                <label for="">Hindi</label> --}}
                                <span>
                                    @error('category_des_hin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Category Image --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Image <span class="text-danger">*</span>
                        </div>
                        <div class="col-2" id="imagepreview">
                            <img id="profilePicPreview" src="{{ asset($category->cat_icon) }}" alt=""
                                height="100px" width="150px">
                        </div>
                        <div class="col">
                            <div class="form">
                                <input type="file" name="category_image" id="category_Image"
                                    placeholder="Category Name" class="form-control" onchange="previewImage(event)">
                                {{-- <label for="">Image</label> --}}
                                <span>
                                    @error('category_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- is navigate --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Is Navigate
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" name="is_navigate" type="checkbox" value="true"
                                    id="navigate" @if ($navigate && $navigate->screenname == 'product_screen/category/' . $category->id) checked @endif>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Make Navigation
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- make it parent --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Is Parent
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" name="isparent" type="checkbox" value="0"
                                    id="flexCheckDefault" @if ($category->parent_category_id == 0) checked @endif>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Make it parent
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Parent Category --}}
                    <div class="row mb-3" id="parentCat">
                        {{-- <div class="form-group"> --}}
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Parent Category<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select ddCategory" name="parent_id" class="form-control" id="parent_id"
                                style="font-size: 16px; font-weight: 400;">
                                <option value="0" selected>-- select category --</option>
                                @foreach ($categories as $categorydata)
                                    @if ($category->id != $categorydata->id)
                                        <option
                                            value="{{ $categorydata->id }}"{{ $categorydata->id == $category->parent_category_id ? 'selected' : '' }}>
                                            {{ $categorydata->categoryName }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- <select class="form-select ddCategory" name="parent_id" class="form-control">
                                <option value="0" {{ $category->parent_id == 0 ? 'selected' : '' }}>-- select
                                    category
                                    --</option>
                                @foreach ($categories as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                        {{ $category->parent_id == $categoryOption->id ? 'selected' : '' }}>
                                        {{ $categoryOption->category_name }}
                                    </option>
                                @endforeach
                            </select> --}}
                            <span>
                                @error('parent_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                        {{-- </div> --}}
                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="update btn" id="Update"><i
                                    class="fa-solid fa-floppy-disk"></i>
                                Update</button>
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

    {{-- for ck editor  --}}
    <script>
        // Initialize CKEditor for each
        CKEDITOR.replace('category_des');
        CKEDITOR.replace('category_des_guj');
        CKEDITOR.replace('category_des_hin');
    </script>

    {{-- for image preview --}}
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

    {{-- for is parent --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkbox = document.getElementById('flexCheckDefault');
            const select = document.getElementById('parent_id');

            function toggleSelect() {
                if (checkbox.checked) {
                    select.disabled = true;
                } else {
                    select.disabled = false;
                }
            }

            // Initial call to set the state of the select dropdown on page load
            toggleSelect();

            // Add an event listener for checkbox change to toggle the disabled state
            checkbox.addEventListener('change', toggleSelect);
        });
    </script>

    {{-- <script>
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
    </script> --}}
@endsection
