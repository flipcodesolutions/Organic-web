@extends('layouts.app')
@section('header', 'Edit Product')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Update New Product</h1>
    </div>
    <a href="{{ route('product.index') }}" class="btn btn-primary" type="button"> Back </a>
</div>

<div class="card-body p-0">
    <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 200px">Update New Product</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('product.index') }}" class="btn btn-secondary" type="button"> Back </a>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <form id="productForm" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data"
                    method="post" class="form">
                    @csrf

                    {{-- product --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Name <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_name" id="product_name"
                                    value="{{ $product->productName }}" class="form-control">
                                <label for="">English</label>
                                <span class="text-danger" id="productNameError"></span>
                                {{-- <span>
                                    @error('product_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span> --}}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_name_guj" id="product_name_guj"
                                    value="{{ $product->productNameGuj }}" class="form-control">
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
                                <input type="text" name="product_name_hin" id="product_name_hin"
                                    value="{{ $product->productNameHin }}" class="form-control">
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
                                <textarea class="ckeditor form-control" name="product_des" value="{{ old('product_des') }}" placeholder="product_des"
                                    id="product_des">{{ $product->productDescription }}</textarea>
                                <span class="text-danger" id="productDesError"></span>
                                {{-- <input type="text" name="product_des" id="product_des"
                                    value="{{ $product->productDescription }}" class="form-control">
                                <label for="">English</label>
                                <span>
                                    @error('product_des')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description Gujarati<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="product_des_guj" value="{{ old('product_des_guj') }}"
                                    placeholder="product_des_guj" id="product_des_guj">{{ $product->productDescriptionGuj }}</textarea>
                                <span class="text-danger" id="productDesGujError"></span>
                                {{-- <input type="text" name="product_des_guj" id="product_des"
                                    value="{{ $product->productDescriptionGuj }}" class="form-control">
                                <label for="">Gujarati</label>
                                <span>
                                    @error('product_des_guj')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description Hindi<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="product_des_hin" value="{{ old('product_des_hin') }}"
                                    placeholder="product_des_hin" id="product_des_hin">{{ $product->productDescriptionHin }}</textarea>
                                <span class="text-danger" id="productDesHinError"></span>
                                {{-- <input type="text" name="product_des_hin" id="product_des"
                                    value="{{ $product->productDescriptionHin }}" class="form-control">
                                <label for="">Hindi</label>
                                <span>
                                    @error('product_des_hin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span> --}}
                            </div>
                        </div>
                    </div>

                    {{-- product price --}}
                    {{-- <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Price<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="number" min="0" name="product_price" id="product_price"
                                    value="{{ $product->productPrice }}" class="form-control">
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
                            <table class="table table-bordered mt-2" style="width: 900px" id="unitTable">
                                <thead>
                                    <tr>
                                        <th>Unit</th>
                                        <th>Detail (approx Weight)</th>
                                        <th>Price</th>
                                        <th>Discount Percentage</th>
                                        <th>Sell Price</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody id="unitTableBody">
                                    <!-- Template Row (First row) -->
                                    @foreach ($product->productUnit as $index => $data)
                                        <input type="hidden" name="dataid[]" value="{{ $data->id }}">
                                        <tr>
                                            <td>
                                                <select class="form-select form-select-lg mb-3" name="unit_id[]"
                                                    aria-label="Large select example">
                                                    <option disabled>Select Unit</option>
                                                    @foreach ($units as $unitdata)
                                                        <option
                                                            value="{{ $unitdata->id }}"{{ $data->unitMaster->id == $unitdata->id ? 'selected' : '' }}>
                                                            {{ $unitdata->unit }}
                                                        </option>
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
                                                    <input type="text" name="unit_det[]"
                                                        placeholder="Unit Detail in Approx Weight" class="form-control"
                                                        value="{{ $data->detail }}">
                                                    <label for="">Approx Weight</label>
                                                    <span class="text-danger"
                                                        id="unitDetError{{ $index + 1 }}"></span>
                                                    {{-- <span>
                                                        @error('unit_det.*')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </span> --}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-floating">
                                                    <input type="text" name="product_price[]"
                                                        placeholder="Product Price" class="form-control"
                                                        value="{{ $data->price }}">
                                                    <label for="">Product Price</label>
                                                    <span class="text-danger"
                                                        id="productPriceError{{ $index + 1 }}"></span>
                                                    {{-- <span>
                                                        @error('product_price.*')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </span> --}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-floating">
                                                    <input type="text" name="discount_per[]"
                                                        placeholder="Discount Percentage" class="form-control"
                                                        value="{{ $data->per }}">
                                                    <label for="">Discount Per</label>
                                                    <span class="text-danger" id="desPerError{{ $index + 1 }}"></span>
                                                    {{-- <span>
                                                        @error('discount_per.*')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </span> --}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-floating">
                                                    <input type="text" name="selling_price[]"
                                                        placeholder="Selling Price" class="form-control"
                                                        value="{{ $data->sell_price }}">
                                                    <label for="">Selling Price</label>
                                                    <span class="text-danger"
                                                        id="sellPriceError{{ $index + 1 }}"></span>
                                                    {{-- <span>
                                                        @error('selling_price.*')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </span> --}}
                                                </div>
                                            </td>

                                            <td>
                                                <a href="{{ route('productunit.delete', $data->id) }}"
                                                    class="btn btn-danger btn-sm mt-2" style="width: 100px">
                                                    <i class="fas fa-remove"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- <tr class="unitRow">
                                        <td>
                                            <select class="form-select form-select-lg mb-3" name="unit_id[]"
                                                aria-label="Large select example">
                                                <option disabled>Select Unit</option>
                                                @foreach ($units as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $product->productUnit ? 'selected' : '' }}>{{ $data->unit }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger unitIdError"></span>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="text" name="unit_det[]"
                                                    placeholder="Unit Detail in Approx Weight" class="form-control">
                                                <label for="">Approx Weight</label>
                                                <span class="text-danger unitdetailError"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="number" name="discount_per[]"
                                                    placeholder="Discount Percentage" class="form-control">
                                                <label for="">Discount Per</label>
                                                <span class="text-danger discountperError"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="number" name="selling_price[]" placeholder="Selling Price"
                                                    class="form-control">
                                                <label for="">Selling Price</label>
                                                <span class="text-danger sellingpriceError"></span>
                                            </div>
                                        </td>
                                    </tr> --}}

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
                                                    <option value="{{ $data->id }}" {{ $product->productUnit ? 'selected' : '' }}>{{ $data->unit }}</option>
                                                @endforeach
                                            </select>
                                            <span id="unitIdError" class="text-danger"></span>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="text" name="unit_det" id="unit_det"
                                                    placeholder="Unit Detail in Aprox Weight" class="form-control" value="{{ $product->productUnit->detail }}">
                                                <label for="">Aprox Weight</label>
                                                <span id="unitdetailError" class="text-danger"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="text" name="discount_per" id="discount_per"
                                                    placeholder="Discount Percentage" class="form-control" value="{{ $product->productUnit->per }}">
                                                <label for="">Discount Per </label>
                                                <span id="discountperError" class="text-danger"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input type="text" name="selling_price" id="selling_price"
                                                    placeholder="Selling Price" class="form-control" value="{{ $product->productUnit->sell_price }}">
                                                <label for="">Selling Price</label>
                                                <span id="sellingpriceError" class="text-danger"></span>
                                            </div>
                                        </td>
                                        {{-- <td style="display: flex; gap:5px">
                                            <a class="btn btn-primary my-2" id="addUnit">+</a>
                                            <a class="btn btn-danger my-2" id="removeUnit">-</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="display: flex; gap:5px">
                                            <a class="btn btn-primary my-2" id="addUnit">+</a>
                                            <a class="btn btn-danger my-2" id="removeUnit">-</a>
                                        </td>
                                    </tr>
                                </tbody> --}}
                                {{-- <span id="unitTable"></span> --}}
                            </table>
                            <span class="text-danger" id="unitError"></span>
                        </div>
                    </div>

                    {{-- product stock --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Stock<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_stock" id="product_stock"
                                    value="{{ $product->stock }}" class="form-control">
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
                            <div class="col" style="display: flex; flex-wrap: wrap;">
                                @if ($product->productImages && $product->productImages->count() > 0)
                                    @foreach ($product->productImages as $key => $image)
                                        @if ($image->type == 'photo')
                                            <div class="col">
                                                <div class="image">
                                                    <img src="{{ asset( $image->url) }}" alt=""
                                                        id="image" height="110px" width="100px"
                                                        style="list-style-type:none">
                                                </div>
                                                <div class="addimage" style="justify-content: center">
                                                    <a href="{{ route('productimage.delete', $image->id) }}"
                                                        class="btn btn-danger btn-sm mt-2" style="width: 100px">
                                                        <i class="fas fa-remove"></i></a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <div class="col">
                                <div class="row my-3">
                                    Add new image
                                </div>
                                <div class="row mb-2">
                                    <div id="imagePreviewContainer" style="display: flex; flex-wrap: wrap;">
                                        <!-- Image previews will be appended here -->
                                    </div>
                                </div>
                                {{-- <div class="row p-0"> --}}
                                <div class="row">
                                    <input type="file" class="form-control" id="photoUpload"
                                        onchange="previewImages(event)" name="new_product_images[]" multiple>
                                    <span class="text-danger" id="imageError"></span>
                                </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>

                    {{-- product video --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            videos
                        </div>

                        <div class="col">
                            @if ($product->productImages && $product->productImages->count() > 0)
                                @foreach ($product->productImages as $key => $image)
                                    @if ($image->type == 'video')
                                        <div class="row my-1">
                                            <div class="col">
                                                <input type="text" class="form-control" name="videolink[]"
                                                    id="videolink" value="{{ $image->url }}" id="" readonly>
                                            </div>
                                            <div class="col-2">
                                                <a href="{{ route('productimage.delete', $image->id) }}"
                                                    class="btn btn-danger btn-sm mt-1" style="width: 100px">
                                                    <i class="fas fa-remove"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating" id="videoInput">
                                        {{-- <input type="text" class="form-control" id="videoLink"
                                            name="new_video_link[]" placeholder="Enter video link">
                                            <label for="videoLink">Video Link</label> --}}
                                        <span id="videolinklist"> </span>
                                        <div>
                                            <span class="text-danger" id="videoError"></span>
                                        </div>
                                        <a class="btn btn-primary my-2" id="addVideo">+</a>
                                        <a class="btn btn-danger my-2" id="removeVideo">-</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-warning mt-3" type="button" id="Add">+
                                        ADD Image/Video </button>
                                </div>
                            </div>

                            @if ($product->productImages && $product->productImages->count() > 0)
                                @foreach ($product->productImages as $key => $image)
                                    <div class="row form-floating my-1 pt-1">
                                        <div class="col">
                                            <img src="{{ asset('productImage/' . $image->url) }}" alt=""
                                                height="80px" width="50px" style="list-style-type:none">
                                        </div>

                                        <div class="col">
                                            <select class="form-select form-select-lg mb-3"
                                                name="image_and_video.{{ $image->id }}" id="image_and_video"
                                                aria-label="Large select example">
                                                <option value="photo"{{ $image->type == 'photo' ? 'selected' : '' }}>
                                                    Photo</option>
                                                <option value="video"{{ $image->type == 'video' ? 'selected' : '' }}>
                                                    Video</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <div id="photoInput" style="display: none">
                                                <input type="file" class="form-control" id="photoUpload"
                                                    name="product_images.{{ $image->id }}">
                                            </div>
                                            <div id="videoInput" style="display: none">
                                                <input type="text" class="form-control" id="videoLink"
                                                    name="video_link.{{ $image->id }}" placeholder="Enter video link">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 ">
                                            <a href="{{ route('productimage.deactive', $image->id) }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-remove"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="row mt-3">

                                <div class="col" id="addnew" style="display: none">
                                    <select class="form-select form-select-lg mb-3" name="image_and_video"
                                        id="image_and_video" aria-label="Large select example">
                                        <option value="null" selected>Select file type</option>
                                        <option value="photo">Photo</option>
                                        <option value="video">Video</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div id="photoInput" style="display: none">
                                        <input type="file" class="form-control" id="photoUpload"
                                            name="product_images[]" multiple>
                                    </div>
                                    <div id="videoInput" style="display: none">
                                        <input type="text" class="form-control" id="videoLink" name="video_link[]"
                                            placeholder="Enter video link">

                                        <div id="videolist">

                                        </div>

                                        <a class="btn btn-primary" id="addVideo">+</a>
                                        <a class="btn btn-danger" id="removeVideo">-</a>
                                    </div>
                                </div>
                            </div>

                        </div> --}}


                    {{-- product image --}}
                    {{-- <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Images/Videos<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="col">
                                <a href="" class="btn btn-primary btn-sm mb-3">Add Photo/Video</a>
                                <a href="" class="btn btn-warning btn-sm mb-3">deactive Photo/Video</a>
                            </div>
                            @foreach ($productimg as $data)
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="col-2 mb-1">
                                            <img src="{{ asset('productImage/' . $data->url) }}" alt=""
                                                height="80px" width="50px" style="list-style-type:none">
                                        </div> --}}
                    {{-- <div class="row mb-1">
                                                <input type="file" class="form-control" id="inputGroupFile02"
                                                    name="product_image[]">
                                                <input type="hidden" name="imageid[]" value="{{ $data->id }}">
                                                <span id="imageError" class="text-danger"></span>
                                            </div> --}}
                    {{-- <div class="col mt-3">
                                            <select class="form-select form-select-lg mb-3" name="image_and_video"
                                                id="image_and_video" aria-label="Large select example"
                                                image-id='{{ $data->id }}'>
                                                <option selected>Select file type</option>
                                                <option value="photo"{{ $data->type == 'photo' ? 'selected' : '' }}>
                                                    Photo</option>
                                                <option value="video"{{ $data->type == 'video' ? 'selected' : '' }}>
                                                    Video</option>
                                            </select>

                                            <div class="row form-floating">
                                                <div id="photoInput" style="display: none;">
                                                    <label for="photoUpload" class="form-label">Upload Photo</label>
                                                    <input type="file" class="form-control" id="photoUpload"
                                                        name="product_image[]" multiple>
                                                    <input type="hidden" name="imageid" value="{{ $data->id }}">
                                                </div>

                                                <div id="videoInput" style="display: none;">
                                                    <label for="videoLink">Video Link</label>
                                                    <input type="text" class="form-control" id="videoLink"
                                                        name="video_link" placeholder="Enter video link">
                                                </div>
                                            </div>

                                            <a href="{{ route('productimage.deactive', $data->id) }}"
                                                class="btn btn-danger btn-sm mb-3 mt-3"><i class="fas fa-remove"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}


                    {{-- season --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Season<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg mb-3" name="season"
                                aria-label="Large select example" style="font-size: 16px; font-weight: 400;">
                                <option disabled>Select Season</option>
                                <option value="Winter"{{ $product->season == 'Winter' ? 'selected' : '' }}>Winter
                                </option>
                                <option value="Summer"{{ $product->season == 'Summer' ? 'selected' : '' }}>Summer
                                </option>
                                <option value="Monsoon"{{ $product->season == 'Monsoon' ? 'selected' : '' }}>Monsoon
                                </option>
                                <option value="All"{{ $product->season == 'All' ? 'selected' : '' }}>All
                                </option>
                            </select>
                        </div>
                        <span>
                            @error('season')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </span>
                    </div>

                    {{-- Product Category --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Category<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg mb-3" name="category_id"
                                aria-label="Large select example" style="font-size: 16px; font-weight: 400;">
                                <option disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <optgroup label="{{ $category->categoryName }}">
                                        @foreach ($childcat as $childdata)
                                            @if ($childdata->parent_category_id == $category->id)
                                                <option
                                                    value="{{ $childdata->id }}"{{ $product->categoryId == $childdata->id ? 'selected' : '' }}>
                                                    {{ $childdata->categoryName }}</option>
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

                    {{-- Product Brand --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Brand<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg mb-3" name="brand_id"
                                aria-label="Large select example" style="font-size: 16px; font-weight: 400;">
                                <option selected disabled>Select Brand</option>
                                @foreach ($brands as $branddata)
                                    <option value="{{ $branddata->id }}"{{ $product->brandId == $branddata->id ? 'selected' : ''}}>{{ $branddata->brand_name }}</option>
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

                    {{-- is on home --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Is on home
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" name="is_on_home" type="checkbox" value="true" id="flexCheckDefault" 
                                @if($product->isOnHome == 'yes') checked @endif>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Make it on home
                                </label>
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
                                <input class="form-check-input" name="is_navigate" type="checkbox" value="true" id="flexCheckDefault" 
                                @if($navigate && $navigate->screenname == 'product_screen/product/'.$product->id) checked @endif>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Make Navigation
                                </label>
                              </div>
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="update btn" id="Update"><i
                                class="fa-solid fa-floppy-disk"></i>
                                Update</button>
                    </div>

                    {{-- <div class="row">
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
                                @foreach ($categories as $category)
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
                    </div> --}}
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

    {{-- for add and remove new imges and video  --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const addVideoButton = document.getElementById("addVideo");
            const videoLinkInput = document.getElementById("videoLink");

            function addVideoLink() {

                const list = document.getElementById('videolinklist');

                let newinput = document.createElement('input');
                newinput.type = 'text';
                newinput.classList.add('form-control', 'my-1');
                newinput.id = 'newvideoLink';
                newinput.name = 'new_video_link[]';
                newinput.placeholder = 'Enter video link';


                list.appendChild(newinput);
            };

            document.getElementById('addVideo').addEventListener('click', function() {
                addVideoLink();
            });

            const video = document.querySelectorAll('input#videolink');
            if (video.length === 0) {
                addVideoLink();
            }

            document.getElementById('removeVideo').addEventListener('click', function() {
                const link = document.getElementById('videolinklist');
                link.removeChild(link.lastElementChild);
            });
        })
    </script>

    {{-- for add and remove new units --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addUnitBtn = document.getElementById("addUnit");
            const removeUnitBtn = document.getElementById("removeUnit");
            const unitTableBody = document.getElementById("unitTableBody");

            let rowCounter = 0;

            function addUnitRow() {
                // Create a new row dynamically
                const newRow = document.createElement("tr");
                newRow.classList.add("unitRow");

                rowCounter++;

                newRow.innerHTML = `
                <td>
                    <select class="form-select form-select-lg mb-3" name="new_unit_id[]" aria-label="Large select example">
                        <option selected>Select Unit</option>
                        @foreach ($units as $data)
                            <option value="{{ $data->id }}">{{ $data->unit }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="newUnitIdError${rowCounter}"></span>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" name="new_unit_det[]" placeholder="Unit Detail in Approx Weight" class="form-control">
                        <label for="">Approx Weight</label>
                    <span class="text-danger" id="newUnitDetError${rowCounter}"></span>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" name="new_product_price[]" placeholder="Product Price" class="form-control" value="{{ $data->per }}">
                        <label for="">Product Price</label>
                    <span class="text-danger" id="newProductPriceError${rowCounter}"></span>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" name="new_discount_per[]" placeholder="Discount Percentage" class="form-control">
                        <label for="">Discount Per</label>
                    <span class="text-danger" id="newDisPerError${rowCounter}"></span>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" name="new_selling_price[]" placeholder="Selling Price" class="form-control">
                        <label for="">Selling Price</label>
                    <span class="text-danger" id="newSellPriceError${rowCounter}"></span>
                    </div>
                </td>
            `;

                // Insert before the buttons row
                unitTableBody.insertBefore(newRow, document.getElementById("unitButtonsRow"));
            };

            addUnitBtn.addEventListener("click", function() {
                addUnitRow();
            });

            removeUnitBtn.addEventListener("click", function() {
                const rows = document.querySelectorAll(".unitRow");
                rows[rows.length - 1].remove(); // Remove the last added row
            });

            const unit_id = document.querySelectorAll('select[name="unit_id[]"]');
            if (unit_id.length === 0) {
                addUnitRow();
            }
        });
    </script>

    {{-- for validation --}}
    <script>
        function validateform() {
            const errors = [];

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
            const price = document.querySelectorAll('input[name="product_price[]"]');
            const discount_per = document.querySelectorAll('input[name="discount_per[]"]');
            const selling_price = document.querySelectorAll('input[name="selling_price[]"]');

            const new_unit_id = document.querySelectorAll('select[name="new_unit_id[]"]');
            const new_unit_det = document.querySelectorAll('input[name="new_unit_det[]"]');
            const new_price = document.querySelectorAll('input[name="new_product_price[]"]');
            const new_discount_per = document.querySelectorAll('input[name="new_discount_per[]"]');
            const new_selling_price = document.querySelectorAll('input[name="new_selling_price[]"]');

            const product_stock = document.getElementById('product_stock').value;

            const images = document.querySelectorAll('img#image');
            const video = document.querySelectorAll('input#videolink');

            const product_image = document.getElementById('photoUpload').files.length;
            const newvideo = document.querySelectorAll('input#newvideoLink');

            // Clear previous error messages
            document.querySelectorAll('.text-danger').forEach(function(element) {
                element.textContent = '';
            });

            // let product_nameRegex = /^[A-Z][a-z]*(?: [A-Z][a-z]*)*$/;
            if (!product_name) {
                document.getElementById('productNameError').textContent = "Product name (English) is required.";
            } 
            // else if (!product_name || !product_nameRegex.test(product_name)) {
            //     document.getElementById('productNameError').textContent =
            //         "Invalid Product Name. Productname must start with a upper case letter. Allowed characters are a-z (only upper and lower case).Do not enter any numbers or spacial characters";
            // }

            if (!product_name_guj) {
                document.getElementById('productNameGujError').textContent = "Product name (Gujarati) is required.";
            }
            //  else if (!product_name_guj || !product_nameRegex.test(product_name_guj)) {
            //     document.getElementById('productNameGujError').textContent =
            //         "Invalid Product Name. Productname must start with a upper case letter. Allowed characters are a-z (only upper and lower case).Do not enter any numbers or spacial characters";
            // }

            if (!product_name_hin) {
                document.getElementById('productNameHinError').textContent = "Product name (Hindi) is required.";
            }
            //  else if (!product_name_hin || !product_nameRegex.test(product_name_hin)) {
            //     document.getElementById('productNameHinError').textContent =
            //         "Invalid Product Name. Productname must start with a upper case letter. Allowed characters are a-z (only upper and lower case).Do not enter any numbers or spacial characters";
            // }

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

            if (unit_id.length === 0 && new_unit_id.length === 0) {
                document.getElementById('unitError').textContent = "You must provide at list one unit detail for product.";
            }

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
                        "Please enter a valid positive number without decimals or special characters.";
                }
            });

            selling_price.forEach((s, index) => {
                if (!s.value) {
                    document.getElementById(`sellPriceError${index + 1}`).textContent =
                        "Selling price is required.";
                } else if (!regex.test(s.value)) {
                    document.getElementById(`sellPriceError${index + 1}`).textContent =
                        "Please enter a valid positive number without decimals or special characters.";
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

            new_unit_id.forEach((unit, index) => {
                if (!unit.value || unit.value === "Select Unit") {
                    document.getElementById(`newUnitIdError${index + 1}`).textContent = "Unit ID is required.";
                }
            });
            new_unit_det.forEach((detail, index) => {
                if (!detail.value) {
                    document.getElementById(`newUnitDetError${index + 1}`).textContent = "Unit detail is required.";
                }
            });
            new_price.forEach((p, index) => {
                if (!p.value) {
                    document.getElementById(`newProductPriceError${index + 1}`).textContent = "Price is required.";
                } else if (!regex.test(p.value)) {
                    document.getElementById(`newProductPriceError${index + 1}`).textContent =
                        "Please enter a valid positive number without decimals or special characters.";
                }
            });
            new_selling_price.forEach((s, index) => {
                if (!s.value) {
                    document.getElementById(`newSellPriceError${index + 1}`).textContent =
                        "Selling price is required.";
                } else if (!regex.test(s.value)) {
                    document.getElementById(`newSellPriceError${index + 1}`).textContent =
                        "Please enter a valid positive number without decimals or special characters.";
                }
            });
            new_discount_per.forEach((d, index) => {
                if (!d.value) {
                    document.getElementById(`newDisPerError${index + 1}`).textContent =
                        "Discount percentage is required.";
                } else if (!disreg.test(d.value)) {
                    document.getElementById(`newDisPerError${index + 1}`).textContent =
                        "Please enter a valid discount percentage between 1 to 100.";
                }
            });

            if (!product_stock || isNaN(product_stock)) {
                document.getElementById('productStockError').textContent = "Product stock is required and must be numeric.";
            }

            if (images.length === 0 && video.length === 0 && product_image === 0 && newvideo.length === 0) {
                document.getElementById("imageError").textContent =
                    "You must provide at list one product image or a video link.";
                document.getElementById("videoError").textContent =
                    "You must provide at list one product image or a video link.";
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

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('productForm').onsubmit = function(event) {
                if (!validateform()) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            };
        });

        // document.getElementById('productForm').onsubmit = function(event) {
        //     if (!validateForm()) {
        //         event.preventDefault(); // Prevent form submission if validation fails
        //     }
        // };

        // document.getElementById('productForm').onsubmit = function(event) {
        //     if (!validateForm()) {
        //         event.preventDefault(); // Prevent form submission if validation fails
        //     }
        // }
    </script>

    {{-- <script>
        // Function to validate the form
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
            const price = document.querySelectorAll('input[name="product_price[]"]');
            const discount_per = document.querySelectorAll('input[name="discount_per[]"]');
            const selling_price = document.querySelectorAll('input[name="selling_price[]"]');
            const product_stock = document.getElementById('product_stock').value;
            const season = document.querySelector('select[name="season"]').value;
            const category_id = document.querySelector('select[name="category_id"]').value;
            const product_image = document.getElementById('photoUpload').files.length;
            const video_link = document.getElementById('videoLink').value;

            // Clear previous error messages
            document.querySelectorAll('.text-danger').forEach(function(element) {
                element.textContent = '';
            });

            // Validate product name
            if (!product_name) {
                document.getElementById('productNameError').textContent = "Product name (English) is required.";
            }

            if (!product_name_guj) {
                document.getElementById('productNameGujError').textContent = "Product name (Gujarati) is required.";
            }

            if (!product_name_hin) {
                document.getElementById('productNameHinError').textContent = "Product name (Hindi) is required.";
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
                        "Please enter a valid positive number without decimals or special characters.";
                }
            });
            selling_price.forEach((s, index) => {
                if (!s.value) {
                    document.getElementById(`sellPriceError${index + 1}`).textContent =
                        "Selling price is required.";
                } else if (!regex.test(s.value)) {
                    document.getElementById(`sellPriceError${index + 1}`).textContent =
                        "Please enter a valid positive number without decimals or special characters.";
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

            // Validate season and category
            if (!season || season === "Select Season") {
                document.getElementById('seasonError').textContent = "Season is required.";
            }

            if (!category_id || category_id === "Select Category") {
                document.getElementById('categoryError').textContent = "Category is required.";
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
    </script> --}}


    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('Add').addEventListener('click', function() {
                const image = document.getElementById('addnew');
                image.style.display = 'block';
            });

            document.getElementById('addVideo').addEventListener('click', function() {
                const link = document.getElementById('videolist');
                let newinput = document.createElement('input');
                newinput.type = 'text';
                newinput.classList.add('form-control', 'my-1');
                newinput.id = 'videoLink';
                newinput.name = 'video_link[]';
                newinput.placeholder = 'Enter video link';

                link.appendChild(newinput);

            });

            document.getElementById('removeVideo').addEventListener('click', function() {
                const link = document.getElementById('videolist');
                link.removeChild(link.lastElementChild);
            });

            function updateInputVisibility(selectElement) {
                const parentRow = selectElement.closest('.row');
                const photoInput = parentRow.querySelector('#photoInput');
                const videoInput = parentRow.querySelector('#videoInput');

                photoInput.style.display = 'none';
                videoInput.style.display = 'none';

                if (selectElement.value === 'photo') {
                    photoInput.style.display = 'block';
                } else if (selectElement.value === 'video') {
                    videoInput.style.display = 'block';
                }
            }

            const imageAndVideoSelects = document.querySelectorAll('[id="image_and_video"]');

            imageAndVideoSelects.forEach(select => {
                select.addEventListener('change', function() {
                    updateInputVisibility(this);
                });

                updateInputVisibility(select);
            });
        });
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

</script> --}}

@endsection
