@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 180px">Deactive DilverySlot</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('deliveryslot.index') }}">Back</a>
                    </div>
                </div>
            </div>
            <adiv class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Available</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $index = 1;
                    @endphp
                    @if (count($deliveryslots) > 0)
                        @foreach ($deliveryslots as $deliveryslots)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $deliveryslots->startTime }}</td>
                                <td>{{ $deliveryslots->endTime }}</td>
                                <td>{{ $deliveryslots->isAvailable }}</td>
                                <td>
                                    <div class="d-flex">
                                    <a href="{{ Route('deliveryslot.active', $deliveryslots->id) }}"
                                        class="btn btn-primary">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                        onclick="openDeleteModal('{{ Route('deliveryslot.permdelete', $deliveryslots->id) }}')">
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
                {{-- table end --}}


            </adiv>
        </div>
    </div>

@endsection
