@extends('layouts.app')
@section('header', 'Products')
@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Point Percentage Management</h1>
    </div>
</div>

<div class="card-body p-0">

        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 230px">Point Percentage Management</h6>
                    </div>
                </div>
            </div> --}}
            <div class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Percentage</th>
                        <th>Action</th>
                    </tr>
                    @if (count($per) > 0)
                        @foreach ($per as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $data->per }}
                                </td>
                                <td>
                                    <a href="{{ route('pointper.edit') }}/{{ $data->id }}" class="edit btn">
                                        <i class="fas fa-edit"></i>
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
