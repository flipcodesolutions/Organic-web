@extends('layouts.app')
@section('header', 'Category')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">Category Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="b1 btn btn-danger" href="{{ route('category.deactiveindex') }}">Deactive Categories
                        </a>
                        <a class="btn btn-primary" href="{{ route('category.create') }}">Add</a>

                    </div>
                </div>
            </div>

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('category.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">

                        <!-- Global Search -->
                        <div class="col">
                            <label for="global" class="form-label"><b>Filter:</b></label>
                            <input type="text" id="global" name="global" value="{{ request('global') }}"
                                class="form-control" placeholder="Search by Category Name">
                        </div>

                        <!-- category Filter -->
                        <div class="col">
                            <label for="parentCategoryId" class="form-label"><b>Parent Category:</b></label>
                            <select id="parentCategoryId" name="parentCategoryId" class="form-select">
                                <option value="" selected>Select Parent Category</option>
                                @foreach ($categories as $categorydata)
                                    <option value="{{ $categorydata->id }}"{{ request('parentCategoryId') == $categorydata->id ? 'selected' : '' }}>
                                        {{ $categorydata->categoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('category.index') }}" class="btn btn-danger">Reset</a>
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
                        <th>Category Description</th>
                        <th>Parent Category Name</th>
                        <th>Category Image</th>
                        <th>Action</th>
                    </tr>
                    @if (count($data) > 0)
                        @foreach ($data as $key => $categoryData)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $categoryData->categoryName }}
                                    {{-- <ul>
                                        <li> {{ $categoryData->categoryName }} </li>
                                        <li> {{ $categoryData->categoryNameGuj }} </li>
                                        <li> {{ $categoryData->categoryNameHin }} </li>
                                    </ul> --}}
                                </td>
                                <td>
                                    {!! $categoryData->categoryDescription !!}
                                    {{-- <ul>
                                        <li> {{ $categoryData->categoryDescription }} </li>
                                        <li> {{ $categoryData->categoryDescriptionGuj }} </li>
                                        <li> {{ $categoryData->categoryDescriptionHin }} </li>
                                    </ul> --}}
                                </td>
                                <td>
                                    @foreach ($categories as $perentdata)
                                        @if ($perentdata->id == $categoryData->parent_category_id)
                                            {{ $perentdata->categoryName }}
                                        @endif
                                    @endforeach
                                    {{-- @if ($categoryData->parent_id == 0)
                                        -
                                    @else --}}
                                    {{-- {{ $categoryData->parent_category_id }} --}}
                                    {{-- @endif --}}
                                </td>
                                <td>
                                    <img src="{{ asset('categoryImage/' . $categoryData->cat_icon) }}" alt=""
                                        height="100px" width="150px">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('category.edit') }}/{{ $categoryData->id }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                            onclick="openDeactiveModal('{{ route('category.deactive') }}/{{ $categoryData->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        {{-- <a href="{{ route('category.deactive') }}/{{ $categoryData->id }}" class="btn btn-danger">
                                        <i class="fas fa-remove"></i>
                                    </a> --}}
                                    </div>
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
                {!! $data->links('pagination::bootstrap-5') !!}

            </div>
        </div>
    </div>
@endsection
