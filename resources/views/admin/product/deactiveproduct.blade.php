@extends('layouts.app')
@section('header', 'Products')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Deactive Products</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ route('product.index') }}">back</a>
                    </div>
                </div>
            </div>

            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('product.deactiveindex') }}" method="GET" class="filter-form">
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

                        {{-- session Filter --}}
                        <div class="col">
                            <label for="season"><b>Session:</b></label>
                            <select name="season" id="season" class="form-select">
                                <option value="" selected>Select Season</option>
                                <option value="Winter"{{ request('season') == 'Winter' ? 'selected' : '' }}>Winter</option>
                                <option value="Summer"{{ request('season') == 'Summer' ? 'selected' : '' }}>Summer</option>
                                <option value="Monsoon"{{ request('season') == 'Monsoon' ? 'selected' : '' }}>Monsoon
                                </option>
                            </select>
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('product.deactiveindex') }}" class="btn btn-danger">Reset</a>
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
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                    @if (count($data) > 0)
                        @foreach ($data as $key => $productData)
                            <tr>
                                <td>{{ $key + 1 }}</td>
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
                                    {{ $productData->productUnit->unitMaster->unit }}
                                </td>
                                <td>
                                    {{ $productData->productUnit->detail }}
                                </td>
                                <td>
                                    {{ $productData->productUnit->per }}
                                </td>
                                <td>
                                    {{ $productData->productUnit->sell_price }}
                                </td> --}}
                                <td>
                                    {{ $productData->stock }}
                                </td>
                                <td>
                                    {{ $productData->season }}
                                </td>
                                <td>

                                    @if (isset($productData->productImages) && $productData->productImages->isNotEmpty())
                                        <img src="{{ asset('productImage/' . $productData->productImages->first()->url) }}"
                                            alt="" height="80px" width="50px" style="list-style-type:none">
                                        {{-- <img src="{{ asset('productImage/' . $productData->productImages->first()->url) }}"
                                    alt="Product Image" /> --}}
                                    @else
                                        <p>No product images available.</p>
                                    @endif


                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('product.active') }}/{{ $productData->id }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                            onclick="openDeleteModal('{{ route('product.delete') }}/{{ $productData->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        {{-- <a href="{{ route('product.delete') }}/{{ $productData->id }}" class="btn btn-danger">
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
