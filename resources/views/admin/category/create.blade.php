@extends('layouts.app')
@section('header', 'Category Create')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 180px">Create New Category</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('category.index') }}" class="btn btn-primary" type="button"> Back </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data" class="form">
                    @csrf
                    {{-- Category --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Name <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="category_name" id="category_name" placeholder="Category Name"
                                    value="{{ old('category_name') }}" class="form-control">
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
                                    value="{{ old('category_name_guj') }}" placeholder="Category Name Gujarati"
                                    class="form-control">
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
                                    value="{{ old('category_name_hin') }}" placeholder="Category Name Hindi"
                                    class="form-control">
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
                                <textarea class="ckeditor form-control" name="category_des" placeholder="Category Description English"
                                    id="floatingTextarea">{{ old('category_des') }}</textarea>
                                {{-- <input type="text" name="category_des" id="category_name"
                                            placeholder="Category Name" class="form-control">
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
                                <textarea class="ckeditor form-control" name="category_des_guj" placeholder="Category Description Gujarati"
                                    id="floatingTextarea">{{ old('category_des_guj') }}</textarea>
                                {{-- <input type="text" name="category_des_guj" id="category_name"
                                    placeholder="Category Name" class="form-control">
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
                                <textarea class="ckeditor form-control" name="category_des_hin" placeholder="Category Description Hindi"
                                    id="floatingTextarea">{{ old('category_des_hin') }}</textarea>
                                {{-- <input type="text" name="category_des_hin" id="category_name"
                                    placeholder="Category Name" class="form-control">
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
                            <img id="categoryImagePreview" src="{{ asset('defaultimage/default4.jpg') }}" alt="Category Image"
                                height="100px" width="150px">
                        </div>
                        <div class="col">
                            <div class="form">
                                <input type="file" name="category_image" id="category_Image" placeholder="Category Name"
                                    value="{{ old('category_image') }}" class="form-control"
                                    onchange="previewImage(event)">
                                {{-- <label for="">Image</label> --}}
                                <span>
                                    @error('category_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
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
                                    id="flexCheckDefault" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Make it parent
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Parent Category --}}
                    <div class="row mb-3" id="parentCat" style="display: none">
                        {{-- <div class="form-group"> --}}
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Parent Category
                        </div>
                        <div class="col">
                            <select class="form-select ddCategory" name="parent_id" value="{{ old('parent_id') }}"
                                class="form-control" style="font-size: 16px; font-weight: 400;">
                                <option value=" " selected disabled>-- select category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                                @endforeach
                                {{-- @foreach ($categories as $category)
                                    <optgroup label="{{ $category->categoryName }}">
                                        @foreach ($childcat as $child)
                                            @if ($child->parent_category_id == $category->id)
                                                <option value="{{ $child->id }}">{{ $child->categoryName }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach --}}
                            </select>
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
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                                Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>
        // Initialize CKEditor for each
        CKEDITOR.replace('category_des');
        CKEDITOR.replace('category_des_guj');
        CKEDITOR.replace('category_des_hin');
    </script>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                const output = document.getElementById('categoryImagePreview');
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('flexCheckDefault').addEventListener('change', function() {
                var parentCat = document.getElementById('parentCat');

                if (!this.checked) {
                    // If the checkbox is unchecked, show the parentCat element
                    parentCat.style.display = 'flex';
                } else {
                    // If the checkbox is checked, hide the parentCat element
                    parentCat.style.display = 'none';
                }
            });
        })
    </script>

    {{-- <script>
        $(document).ready(function() {
            $("#categoryForm").on("submit", function(e) {
                e.preventDefault();

                $('#nameError').text('');
                $('#parentIdError').text('');

                let formData = new FormData(this);

                let name = $('#category_name').val();
                // console.log(name);

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
    </script> --}}

@endsection
