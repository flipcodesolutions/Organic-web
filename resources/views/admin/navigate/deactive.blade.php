@extends('layouts.app')
@section('header', 'Products')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 200px;">Deactive Navigate Screens</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ route('navigate.index') }}">Back</a>
                    </div>
                </div>
            </div>

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('navigate.deactiveindex') }}" method="GET" class="filter-form">
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
                            <a href="{{ route('navigate.deactiveindex') }}" class="reset btn">Reset</a>
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
                                    <a href="{{ route('navigate.active') }}/{{ $data->id }}" class="edit btn">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="delete btn ml-2"
                                        onclick="openDeleteModal('{{ route('navigate.delete') }}/{{ $data->id }}')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    {{-- <a href="{{ route('navigate.delete') }}/{{ $data->id }}"
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
            </div>
        </div>
    </div>

@endsection
