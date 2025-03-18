@extends('layouts.app')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Deactive Units</h1>
        </div>
        <a class="btn btn-primary" href="{{ Route('unitmaster.index') }}">Back</a>
    </div>

    <div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 180px">Deactive Units</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('unitmaster.index') }}">Back</a>
                    </div>
                </div>
            </div> --}}

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ Route('unitmaster.deactive') }}" method="GET" class="filter-form">
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
                            <a href="{{ Route('unitmaster.deactive') }}" class="reset btn">Reset</a>
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
                                    <a href="{{ Route('unitmaster.active', $unitmasters->id) }}" class="edit btn">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="delete btn ml-2"
                                        onclick="openDeleteModal('{{ Route('unitmaster.permdelete', $unitmasters->id) }}')">
                                        <i class="fas fa-trash"></i>
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
            </div>
        </div>
    </div>

@endsection
