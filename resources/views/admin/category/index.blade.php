@extends('layouts.app')
@section('header', 'Category')
@section('content')

<div class="container">

    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Category Management</h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{route('category.create')}}">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <div class="loader"></div>
            <table class="table table-bordered mt-2">
                <tr>
                    <th>No</th>
                    <th>Category Name</th>
                    <th>Parent Category Name</th>
                    <th>Action</th>
                </tr>
                @if (count($categories) > 0)
                @foreach ($categories as $key => $categoryData)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $categoryData->category_name }}</td>
                    <td>
                        @if ($categoryData->parent_id == 0)
                        -
                        @else
                        {{ $categoryData->parentCategory->category_name }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('category.edit') }}/{{ $categoryData->id }}" class="btn btn-primary">
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
            {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}

        </div>
    </div>
</div>
@endsection