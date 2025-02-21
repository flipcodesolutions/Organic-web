@extends('layouts.app')
@section('header', 'Category')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Deactiveted Category</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('category.index') }}" class="btn btn-primary" type="button"> Back </a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Parent Category Name</th>
                        <th>Category Icon</th>
                        <th>Action</th>
                    </tr>
                    @if (count($categories) > 0)
                        @foreach ($categories as $key => $categoryData)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <ul>
                                        <li> {{ $categoryData->categoryName }} </li>
                                        <li> {{ $categoryData->categoryNameGuj }} </li>
                                        <li> {{ $categoryData->categoryNameHin }} </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li> {{ $categoryData->categoryDescription }} </li>
                                        <li> {{ $categoryData->categoryDescriptionGuj }} </li>
                                        <li> {{ $categoryData->categoryDescriptionHin }} </li>
                                    </ul>
                                </td>
                                <td>
                                    @if ($categoryData->parent_id == 0)
                                        -
                                    @else
                                        {{ $categoryData->parentCategory->category_name }}
                                    @endif
                                </td>
                                <td>
                                    <img src="{{asset('categoryImage/'.$categoryData->cat_icon)}}" alt="" height="100px" width="150px">
                                </td>
                                <td>
                                    <a href="{{ route('category.active') }}/{{ $categoryData->id }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('category.delete') }}/{{ $categoryData->id }}" class="btn btn-danger">
                                        <i class="fas fa-remove"></i>
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
                {!! $categories->links('pagination::bootstrap-5') !!}

            </div>
        </div>
    </div>
@endsection
