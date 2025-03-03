@extends('layouts.app')
@section('header', 'Products')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Products Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-danger" href="{{ route('product.deactiveindex') }}">Deactive Products</a>
                        <a class="btn btn-primary" href="{{ route('product.create') }}">Add</a>
                    </div>
                </div>
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
                    @if (count($products) > 0)
                        @foreach ($products as $key => $productData)
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
                                    {{ $productData->productDescription }}
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
                                    <a href="{{ route('product.edit') }}/{{ $productData->id }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                        onclick="openDeactiveModal('{{ route('product.deactive') }}/{{ $productData->id }}')">
                                        <i class="fas fa-remove"></i>
                                    </a>
                                    {{-- <a href="{{ route('product.deactive') }}/{{ $productData->id }}"
                                        class="btn btn-danger">
                                        <i class="fas fa-remove"></i>
                                    </a> --}}
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
                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}

            </div>
        </div>
    </div>

@endsection
