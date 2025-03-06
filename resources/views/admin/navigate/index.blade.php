@extends('layouts.app')
@section('header', 'Products')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">Navigation Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="btn btn-danger" href="{{ route('navigate.deactiveindex') }}">Deactive Screens</a>
                        <a class="btn btn-primary" href="{{ route('navigate.create') }}">Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Screen Name</th>
                        <th>Action</th>
                    </tr>
                    @if (count($screen) > 0)
                        @foreach ($screen as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $data->screenname }}
                                </td>
                                <td>
                                    <a href="{{ route('navigate.edit') }}/{{ $data->id }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                        onclick="openDeactiveModal('{{ route('navigate.deactive') }}/{{ $data->id }}')">
                                        <i class="fas fa-remove"></i>
                                    </a>
                                    {{-- <a href="{{ route('navigate.deactive') }}/{{ $data->id }}"
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
