@extends('layouts.app')
@section('header', 'Category')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">Brand Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="b1 btn btn-danger" href="{{ route('brand.deactiveindex') }}">Deactive Brands
                        </a>
                        <a class="btn btn-primary" href="{{ route('brand.create') }}">Add</a>

                    </div>
                </div>
            </div>

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('brand.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">

                        <!-- Global Search -->
                        <div class="col">
                            <label for="global" class="form-label"><b>Filter:</b></label>
                            <input type="text" id="global" name="global" value="{{ request('global') }}"
                                class="form-control" placeholder="Search by Brand Name">
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('brand.index') }}" class="btn btn-danger">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Brand Name</th>
                        <th>Brand Image</th>
                        <th>Action</th>
                    </tr>
                    @if (count($data) > 0)
                        @foreach ($data as $key => $brandData)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $brandData->brand_name }}
                                    {{-- <ul>
                                        <li> {{ $categoryData->categoryName }} </li>
                                        <li> {{ $categoryData->categoryNameGuj }} </li>
                                        <li> {{ $categoryData->categoryNameHin }} </li>
                                    </ul> --}}
                                </td>
                                <td>
                                    <img src="{{ asset($brandData->brand_icon) }}" alt=""
                                        height="100px" width="150px">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('brand.edit') }}/{{ $brandData->id }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                            onclick="openDeactiveModal('{{ route('brand.deactive') }}/{{ $brandData->id }}')">
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
