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
                    <a class="btn btn-primary" href="{{route('product.create')}}">Add</a>
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
                    <th>Thubnail</th>
                    <th>Action</th>
                </tr>
                @if (count($products) > 0)
                @foreach ($products as $key => $productData)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{$productData->categories->category_name}}</td>
                    <td>{{$productData->product_name}}</td>
                    <td><img src="{{ url('collection/product/productimage/' . $productData->Thumbnail) }}" accept=""
                            style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;" class="img">
                    </td>
                    <td>
                        <a href="{{ route('product.edit') }}/{{ $productData->id }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8" align="center" style="color: red;">
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