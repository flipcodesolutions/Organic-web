@extends('layouts.app')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col">
            <h1 class="h3 mb-1 text-gray-800">UnitMaster Management</h1>
        </div>
        <a class="b1 btn btn-danger mr-1" href="{{ Route('unitmaster.deactive') }}">Deactivated Units</a>
        <a class="btn btn-primary" href="{{ Route('unitmaster.create') }}">Add</a>
    </div>

    <div class="card-body p-0">

        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">UnitMaster Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="b1 btn btn-danger" href="{{ Route('unitmaster.deactive') }}">Deactivated Units</a>
                        <a class="btn btn-primary" href="{{ Route('unitmaster.create') }}">Add</a>
                    </div>
                </div>
            </div> --}}

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ Route('unitmaster.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2 ">

                        <!-- Global Search -->
                        <div class="col">
                            <label for="global" class="form-label"><b>Filter:</b></label>
                            <input type="text" id="global" name="global" value="{{ request('global') }}"
                                class="form-control" placeholder="Search by Unit">
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col-md-4 d-flex justify-content-end gap-2">
                            <button type="submit" class="filter btn">Filter</button>
                            <a href="{{ Route('unitmaster.index') }}" class="reset btn">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Unit</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $index = 1;
                    @endphp
                    @if (count($data) > 0)
                        @foreach ($data as $unitmasters)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $unitmasters->unit }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ Route('unitmaster.edit', $unitmasters->id) }}" class="edit btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="delete btn ml-2"
                                            onclick="openDeactiveModal('{{ Route('unitmaster.delete', $unitmasters->id) }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
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
            </div>
        </div>
    </div>

@endsection
