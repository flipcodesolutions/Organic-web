@extends('layouts.app')
@section('header', 'Products')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col">
            <h1 class="h3 mb-1 text-gray-800">Navigation Management</h1>
        </div>
        <a class="b1 btn btn-danger mr-1 mb-1" href="{{ route('navigate.deactiveindex') }}">Deactivated Navigations</a>
        <a class="btn btn-primary mb-1" href="{{ route('navigate.create') }}">Add</a>
    </div>

    <div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">Navigation Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="b1 btn btn-danger" href="{{ route('navigate.deactiveindex') }}">Deactivated Navigations</a>
                        <a class="btn btn-primary" href="{{ route('navigate.create') }}">Add</a>
                    </div>
                </div>
            </div> --}}

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('navigate.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">

                        <!-- Global Search -->
                        <div class="col">
                            <label for="global" class="form-label"><b>Filter:</b></label>
                            <input type="text" id="global" name="global" value="{{ request('global') }}"
                                class="form-control" placeholder="Search by Screen Name">
                        </div>
                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="filter btn">Filter</button>
                            <a href="{{ route('navigate.index') }}" class="reset btn">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Screen Name</th>
                        <th>Action</th>
                    </tr>
                    @if (count($data) > 0)
                        @foreach ($data as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $data->screenname }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('navigate.edit') }}/{{ $data->id }}" class="edit btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="delete btn ml-2"
                                            onclick="openDeactiveModal('{{ route('navigate.deactive') }}/{{ $data->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        {{-- <a href="{{ route('navigate.deactive') }}/{{ $data->id }}"
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
            </div>
        </div>
    </div>

@endsection
