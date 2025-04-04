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
                                <textarea class="ckeditor form-control" name="category_des" value="{{ old('category_des') }}"
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
                                <textarea class="ckeditor form-control" name="category_des_guj" value="{{ old('category_des_guj') }}"
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
                                <textarea class="ckeditor form-control" name="category_des_hin" value="{{ old('category_des_hin') }}"
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
                                <input type="file" name="category_image" id="category_Image" placeholder="Category Name"
                                    class="form-control" onchange="previewImage(event)">
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
                                    id="navigate" @if ($navigate && $navigate->screenname == 'category_screen/category/' . $category->id) checked @endif>
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

                    {{-- add meta propertys --}}
                    <hr class="sidebar-divider my-4">

                    <div class="row mb-4">
                        <h6 class="h5 mb-2 text-gray-800">Edit Meta Propertys</h6>
                        @if ($category->metaproperty && $category->metaproperty->id)
                            <input type="hidden" value="{{ $category->metaproperty->id }}" name="metaPropertyId">
                        @endif
                    </div>

                    {{-- og titles --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Og Title
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ogTitleEng" placeholder="English Title"
                                    name="ogTitleEng"
                                    @if ($category->metaproperty) value="{{ $category->metaproperty->ogTitleEng }}" @endif>
                                <label for="">English</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ogTitleGuj" placeholder="Gujrati Title"
                                    name="ogTitleGuj"
                                    @if ($category->metaproperty) value="{{ $category->metaproperty->ogTitleGuj }}" @endif>
                                <label for="">Gujarati</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ogTitleHin" placeholder="Hindi Title"
                                    name="ogTitleHin"
                                    @if ($category->metaproperty) value="{{ $category->metaproperty->ogTitleHin }}" @endif>
                                <label for="">Hindi</label>
                            </div>
                        </div>
                    </div>

                    {{-- og Description --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Og Description
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ogDescriptionEng"
                                    placeholder="English Description" name="ogDescriptionEng"
                                    @if ($category->metaproperty) value="{{ $category->metaproperty->ogDescriptionEng }}" @endif>
                                <label for="">English</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ogDescriptionGuj"
                                    placeholder="Gujrati Description" name="ogDescriptionGuj"
                                    @if ($category->metaproperty) value="{{ $category->metaproperty->ogDescriptionGuj }}" @endif>
                                <label for="">Gujarati</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ogDescriptionHin"
                                    placeholder="Hindi Description" name="ogDescriptionHin"
                                    @if ($category->metaproperty) value="{{ $category->metaproperty->ogDescriptionHin }}" @endif>
                                <label for="">Hindi</label>
                            </div>
                        </div>
                    </div>

                    {{-- og image --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Og Image
                        </div>
                        <div class="col-2" id="imagepreview">
                            @if ($category->metaproperty && $category->metaproperty->ogImage)
                                <img id="ogImagePreview" src="{{ asset($category->metaproperty->ogImage) }}"
                                    alt="Og Image" height="100px" width="150px">
                            @else
                                <img id="ogImagePreview" src="{{ asset('defaultimage/default4.jpg') }}" alt="Og Image"
                                    height="100px" width="150px">
                            @endif
                        </div>
                        <div class="col">
                            <div class="form">
                                <label>Upload Image</label>
                                <input type="file" class="form-control" id="ogImage" placeholder=""
                                    name="ogImage">
                            </div>
                        </div>
                    </div>

                    {{-- og url --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Og Url
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ogUrl" placeholder="" name="ogUrl"
                                    @if ($category->metaproperty) value="{{ $category->metaproperty->ogUrl }}" @endif>
                                <label for="">Url</label>
                            </div>
                        </div>
                    </div>

                    {{-- description --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="description" placeholder=""
                                    name="description"
                                    @if ($category->metaproperty) value="{{ $category->metaproperty->description }}" @endif>
                                <label for="">description</label>
                            </div>
                        </div>
                    </div>

                    {{-- keyword --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Keyword
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="keywords" placeholder=""
                                    name="keywords"
                                    @if ($category->metaproperty) value="{{ $category->metaproperty->keywords }}" @endif>
                                <label for="">keywords</label>
                            </div>
                        </div>
                    </div>

                    {{-- author --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Author
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="author" placeholder="" name="author"
                                    @if ($category->metaproperty) value="{{ $category->metaproperty->author }}" @endif>
                                <label for="">author</label>
                            </div>
                        </div>
                    </div>

                    {{-- tages --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Tages
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="tages" placeholder="Hindi Title"
                                    name="tages"
                                    @if ($category->metaproperty) value="{{ $category->metaproperty->tages }}" @endif>
                                <label for="">tages</label>
                            </div>
                        </div>
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

    {{-- for og image preview --}}
    <script>
        document.getElementById("ogImage").addEventListener("change", function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                // When file is loaded, update the src of the image
                document.getElementById("ogImagePreview").src = reader.result;
            }

            // Only read the file if it's not empty
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
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
