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
                        <a class="btn btn-danger" href="">Deactive Products</a>
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
                        <th>unit</th>
                        <th>Aprox weight</th>
                        <th>Discount Percentage</th>
                        <th>Sell Price</th>
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
                                    <ul>
                                        <li>{{ $productData->categories->categoryName }}</li>
                                        <li>{{ $productData->categories->categoryNameGuj }}</li>
                                        <li>{{ $productData->categories->categoryNameHin }}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>{{ $productData->productName }}</li>
                                        <li>{{ $productData->productNameGuj }}</li>
                                        <li>{{ $productData->productNameHin }}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>{{ $productData->productDescription }}</li>
                                        <li>{{ $productData->productDescriptionGuj }}</li>
                                        <li>{{ $productData->productDescriptionHin }}</li>
                                    </ul>
                                </td>
                                <td>
                                    {{ $productData->productPrice }}
                                </td>
                                <td>
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
                                </td>
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
                                    <a href="{{ route('product.active') }}/{{ $productData->id }}"
                                        class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('product.delete') }}/{{ $productData->id }}" class="btn btn-danger">
                                        <i class="fas fa-remove"></i>
                                    </a>
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

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}", 'Success', {
                timeOut: 5000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}", 'Error', {
                timeOut: 5000
            });
        </script>
    @endif

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>

@endsection
