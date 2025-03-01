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
                        <a href="{{ route('product.index') }}" class="btn btn-secondary" type="button"> Back </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="productForm" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data"
                    method="post">
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
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_name_guj" id="product_name"
                                    value="{{ $product->productNameGuj }}" class="form-control">
                                <label for="">Gujarati</label>
                                <span id="nameErrorGuj" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="product_name_hin" id="product_name"
                                    value="{{ $product->productNameHin }}" class="form-control">
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
                                            value="{{ $product->productDescription }}" class="form-control">
                                        <label for="">English</label>
                                        <span id="descriptionError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="product_des_guj" id="product_des"
                                            value="{{ $product->productDescriptionGuj }}" class="form-control">
                                        <label for="">Gujarati</label>
                                        <span id="descriptionErrorGuj" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="product_des_hin" id="product_des"
                                            value="{{ $product->productDescriptionHin }}" class="form-control">
                                        <label for="">Hindi</label>
                                        <span id="descriptionErrorHin" class="text-danger"></span>
                                    </div>
                                </div>
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
                        <div class="col">
                            <table class="table table-bordered mt-2" id="unitTable">
                                <thead>
                                    <tr>
                                        <th>Unit</th>
                                        <th>Detail (aprox Weight)</th>
                                        <th>Price</th>
                                        <th>Discount Percentage</th>
                                        <th>Sell Price</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody id="unitTableBody">
                                    <!-- Template Row (First row) -->
                                    @foreach ($product->productUnit as $data)
                                        <input type="hidden" name="dataid[]" value="{{ $data->id }}">
                                        <tr>
                                            <td>
                                                <select class="form-select form-select-lg mb-3"
                                                    name="unit_id[]" aria-label="Large select example">
                                                    <option disabled>Select Unit</option>
                                                    @foreach ($units as $unitdata)
                                                        <option
                                                            value="{{ $unitdata->id }}"{{ $data->unitMaster->id == $unitdata->id ? 'selected' : '' }}>
                                                            {{ $unitdata->unit }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger unitIdError"></span>
                                            </td>

                                            <td>
                                                <div class="form-floating">
                                                    <input type="text" name="unit_det[]"
                                                        placeholder="Unit Detail in Approx Weight" class="form-control"
                                                        value="{{ $data->detail }}">
                                                    <label for="">Approx Weight</label>
                                                    <span class="text-danger unitdetailError"></span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-floating">
                                                    <input type="number" name="product_price[]"
                                                        placeholder="Product Price" class="form-control"
                                                        value="{{ $data->per }}">
                                                    <label for="">Product Price</label>
                                                    <span class="text-danger productpriceError"></span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-floating">
                                                    <input type="number" name="discount_per[]"
                                                        placeholder="Discount Percentage" class="form-control"
                                                        value="{{ $data->per }}">
                                                    <label for="">Discount Per</label>
                                                    <span class="text-danger discountperError"></span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-floating">
                                                    <input type="number" name="sellin_price[]"
                                                        placeholder="Selling Price" class="form-control"
                                                        value="{{ $data->sell_price }}">
                                                    <label for="">Selling Price</label>
                                                    <span class="text-danger sellingpriceError"></span>
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
                                                <input type="number" name="sellin_price[]" placeholder="Selling Price"
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
                                                <input type="text" name="sellin_price" id="selling_price"
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
                                    value="{{ $product->stock }}" class="form-control">
                                <label for="">Stock</label>
                                <span id="stockError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- product image --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Images<span class="text-danger">*</span>
                        </div>

                        <div class="col d-flex">
                            @if ($product->productImages && $product->productImages->count() > 0)
                                @foreach ($product->productImages as $key => $image)
                                    @if ($image->type == 'photo')
                                        <div class="col">
                                            <div class="image">
                                                <img src="{{ asset('productImage/' . $image->url) }}" alt=""
                                                    height="110px" width="100px" style="list-style-type:none">
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
                            <div class="col">
                                <div class="row">
                                    Add new image
                                </div>
                                <div class="row">
                                    <input type="file" class="form-control" id="photoUpload"
                                        name="new_product_images[]" multiple>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- product video --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            videos<span class="text-danger">*</span>
                        </div>

                        <div class="col">
                            @if ($product->productImages && $product->productImages->count() > 0)
                                @foreach ($product->productImages as $key => $image)
                                    @if ($image->type == 'video')
                                        <div class="row my-1">
                                            <div class="col">
                                                <input type="text" class="form-control" name="videolink"
                                                    value="{{ $image->url }}" id="" readonly>
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
                                        <input type="text" class="form-control" id="videoLink"
                                            name="new_video_link[]" placeholder="Enter video link">
                                        <span id="videolinklist"> </span>
                                        <label for="videoLink">Video Link</label>
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
                            <select class="form-control form-select-lg mb-3" name="season"
                                aria-label="Large select example">
                                {{-- <option selected>Select Season</option> --}}
                                <option value="Winter"{{ $product->season == 'Winter' ? 'selected' : '' }}>Winter
                                </option>
                                <option value="Summer"{{ $product->season == 'Summer' ? 'selected' : '' }}>Summer
                                </option>
                                <option value="Monsoon"{{ $product->season == 'Monsoon' ? 'selected' : '' }}>Monsoon
                                </option>
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
                            <select class="form-control form-select-lg mb-3" name="category_id"
                                aria-label="Large select example">
                                <option selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}"{{ $product->categoryId == $category->id ? 'selected' : '' }}>
                                        {{ $category->categoryName }}</option>
                                @endforeach
                            </select>
                            <span id="categoryIdError" class="text-danger"></span>
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                class="fa-solid fa-floppy-disk"></i>
                            Submit</button>
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

    {{-- for add and remove new imges and video  --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const addVideoButton = document.getElementById("addVideo");
            const videoLinkInput = document.getElementById("videoLink");

            document.getElementById('addVideo').addEventListener('click', function() {

                const list = document.getElementById('videolinklist');

                let newinput = document.createElement('input');
                newinput.type = 'text';
                newinput.classList.add('form-control', 'my-1');
                newinput.id = 'videoLink';
                newinput.name = 'new_video_link[]';
                newinput.placeholder = 'Enter video link';


                list.appendChild(newinput);
            });

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

            addUnitBtn.addEventListener("click", function() {
                // Create a new row dynamically
                const newRow = document.createElement("tr");
                newRow.classList.add("unitRow");

                newRow.innerHTML = `
                <td>
                    <select class="form-select form-select-lg mb-3" name="new_unit_id[]" aria-label="Large select example">
                        <option selected>Select Unit</option>
                        @foreach ($units as $data)
                            <option value="{{ $data->id }}">{{ $data->unit }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger unitIdError"></span>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" name="new_unit_det[]" placeholder="Unit Detail in Approx Weight" class="form-control">
                        <label for="">Approx Weight</label>
                        <span class="text-danger unitdetailError"></span>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="number" name="new_product_price[].{{ $data->id }}" placeholder="Product Price" class="form-control" value="{{ $data->per }}">
                        <label for="">Product Price</label>
                        <span class="text-danger productpriceError"></span>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" name="new_discount_per[]" placeholder="Discount Percentage" class="form-control">
                        <label for="">Discount Per</label>
                        <span class="text-danger discountperError"></span>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" name="new_sellin_price[]" placeholder="Selling Price" class="form-control">
                        <label for="">Selling Price</label>
                        <span class="text-danger sellingpriceError"></span>
                    </div>
                </td>
            `;

                // Insert before the buttons row
                unitTableBody.insertBefore(newRow, document.getElementById("unitButtonsRow"));
            });

            removeUnitBtn.addEventListener("click", function() {
                const rows = document.querySelectorAll(".unitRow");
                rows[rows.length - 1].remove(); // Remove the last added row
            });
        });
    </script>


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
