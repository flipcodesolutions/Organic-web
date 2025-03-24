@extends('layouts.app')
@section('header', 'Products')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Products Management</h1>
    </div>
    <a class="b1 btn btn-danger mr-1" href="{{ route('product.deactiveindex') }}">Deactivated Products</a>
    <a class="btn btn-primary" href="{{ route('product.create') }}">Add</a></div>

<div class="card-body p-0">

        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">Products Management</h6>
                </div>
                <div class="heading d-flex row align-items-center">
                    <div class="col d-flex" align="right" style="gap: 3px">
                        <a class="b1 btn btn-danger" href="{{ route('product.deactiveindex') }}">Deactivated Products</a>
                        <a class="btn btn-primary" href="{{ route('product.create') }}">Add</a>
                    </div>
                </div>
            </div> --}}


            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('product.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">

                        <!-- Global Search -->
                        <div class="col">
                            <label for="global" class="form-label"><b>Filter:</b></label>
                            <input type="text" id="global" name="global" value="{{ request('global') }}"
                                class="form-control" placeholder="Search by Product Name">
                        </div>

                        <!-- category Filter -->
                        <div class="col">
                            <label for="categoryId" class="form-label"><b>Category:</b></label>
                            <select id="categoryId" name="categoryId" class="form-select">
                                <option value="" selected>Select Category</option>
                                @foreach ($categories as $categorydata)
                                    <optgroup label="{{ $categorydata->categoryName }}">
                                        @foreach ($childcat as $childcatdata)
                                            @if ($childcatdata->parent_category_id == $categorydata->id)
                                                <option value="{{ $childcatdata->id }}"
                                                    {{ request('categoryId') == $childcatdata->id ? 'selected' : '' }}>
                                                    {{ $childcatdata->categoryName }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>

                        {{-- brand Filter --}}
                        <div class="col">
                            <label for="brand"><b>Brand:</b></label>
                            <select name="brandId" id="brand" class="form-select">
                                <option value="" selected>Select Brand</option>
                                @foreach ($brands as $branddata)
                                    <option value="{{ $branddata->id }}" {{ request('brandId') == $branddata->id }}>{{ $branddata->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- seassion Filter --}}
                        <div class="col">
                            <label for="season"><b>Season:</b></label>
                            <select name="season" id="season" class="form-select">
                                <option value="" selected>Select Season</option>
                                <option value="Winter"{{ request('season') == 'Winter' ? 'selected' : '' }}>Winter</option>
                                <option value="Summer"{{ request('season') == 'Summer' ? 'selected' : '' }}>Summer</option>
                                <option value="Monsoon"{{ request('season') == 'Monsoon' ? 'selected' : '' }}>Monsoon
                                </option>
                                <option value="All"{{ request('season') == 'All' ? 'selected' : '' }}>All</option>
                            </select>
                        </div>

                        {{-- is on home --}}
                        <div class="col">
                            <label for="season"><b>Is On Home:</b></label>
                            <select name="is_on_home" id="isOnHome" class="form-select">
                                <option value="" selected>Select</option>
                                <option value="yes"{{ request('is_on_home') == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no"{{ request('is_on_home') == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="filter btn">Filter</button>
                            <a href="{{ route('product.index') }}" class="reset btn">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        {{-- <th>unit</th>
                        <th>Aprox weight</th>
                        <th>Discount Percentage</th>
                        <th>Sell Price</th> --}}
                        <th>Product Stock</th>
                        <th>Season</th>
                        <th>Brand</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                    @if (count($data) > 0)
                        @foreach ($data as $key => $productData)
                            <tr>
                                <td>{{ $data->firstItem() + $key  }}</td>
                                <td>
                                    {{ $productData->categories->categoryName }}
                                    {{-- <ul>
                                        <li>{{ $productData->categories->categoryName }}</li>
                                        <li>{{ $productData->categories->categoryNameGuj }}</li>
                                        <li>{{ $productData->categories->categoryNameHin }}</li>
                                    </ul> --}}
                                </td>
                                <td>
                                    {{ $productData->productName }}
                                    {{-- <ul>
                                        <li>{{ $productData->productName }}</li>
                                        <li>{{ $productData->productNameGuj }}</li>
                                        <li>{{ $productData->productNameHin }}</li>
                                    </ul> --}}
                                </td>
                                <td>
                                    {!! $productData->productDescription !!}
                                    {{-- <ul>
                                        <li>{{ $productData->productDescription }}</li>
                                        <li>{{ $productData->productDescriptionGuj }}</li>
                                        <li>{{ $productData->productDescriptionHin }}</li>
                                    </ul> --}}
                                </td>
                                <td>
                                    {{ $productData->productPrice }}
                                </td>
                                {{-- <td>
                                    <ul>
                                        @foreach ($productData->productUnit as $data)
                                            <li>{{ $data->unitMaster->unit }}</li>
                                        @endforeach
                                    </ul>
                                    {{ $productData->product_unit->unitMaster->unit ?? ''}}
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($productData->productUnit as $data)
                                            <li>{{ $data->detail }} </li>
                                        @endforeach
                                    </ul>
                                    {{ $productData->productUnit->detail }}
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($productData->productUnit as $data)
                                            <li>{{ $data->per }}</li>
                                        @endforeach
                                    </ul>
                                    {{ $productData->productUnit->per }}
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($productData->productUnit as $data)
                                            <li>{{ $data->sell_price }}</li>
                                        @endforeach
                                    </ul>
                                    {{ $productData->productUnit->sell_price }}
                                </td> --}}
                                <td>
                                    {{ $productData->stock }}
                                </td>
                                <td>
                                    {{ $productData->season }}
                                </td>
                                <td>
                                    {{ $productData->brand->brand_name }}
                                </td>
                                <td>
                                    @if (isset($productData->image) && !empty($productData->image))
                                        <img src="{{ asset( $productData->image) }}"
                                            alt="" height="80px" width="50px" style="list-style-type:none">
                                        {{-- <img src="{{ asset('productImage/' . $productData->productImages->first()->url) }}"
                                    alt="Product Image" /> --}}
                                    @else
                                        <p>No product images available.</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('product.edit') }}/{{ $productData->id }}"
                                            class="edit btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="delete btn ml-2"
                                            onclick="openDeactiveModal('{{ route('product.deactive') }}/{{ $productData->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        {{-- <a href="{{ route('product.deactive') }}/{{ $productData->id }}"
                                        class="btn btn-danger">
                                        <i class="fas fa-remove"></i>
                                    </a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="13" align="center" style="color: red;">
                                <h5>No Data Record Found</h5>
                            </td>
                        </tr>
                    @endif

                </table>
                {{-- table end --}}
                {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}

            </div>
        </div>
    </div>

@endsection
