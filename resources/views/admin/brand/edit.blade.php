@extends('layouts.app')
@section('header', 'Brand Create')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 200px">Edit Brand</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('brand.index') }}" class="btn btn-primary" type="button"> Back </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="productForm" action="{{ route('brand.update') }}/{{ $brand->id }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf
                    {{-- brand name --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Brand Name<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="brandName" id="brand_name" placeholder="Brand Name"
                                    value="{{ $brand->brand_name }}" class="form-control">
                                <label for="">Brand Name</label>
                                <span>
                                    @error('brandName')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Brand Image --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Image <span class="text-danger">*</span>
                        </div>
                        <div class="col-2" id="imagepreview">
                            <img id="brandImagePreview" src="{{ asset($brand->brand_icon) }}" alt="Brand Image"
                                height="100px" width="150px">
                        </div>
                        <div class="col">
                            <div class="form">
                                <input type="file" name="brand_image" id="brand_Image" placeholder="Brand Name"
                                    class="form-control" onchange="previewImage(event)">
                                {{-- <label for="">Image</label> --}}
                                <span>
                                    @error('brand_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="update btn" id="Update"><i class="fa-solid fa-floppy-disk"></i>
                            Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                const output = document.getElementById('brandImagePreview');
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
@endsection
