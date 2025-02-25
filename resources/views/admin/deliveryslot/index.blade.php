@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Delivery Slot Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-danger" href="{{ Route('deliveryslot.deactive') }}">Deactive-Data</a>
                        <a class="btn btn-primary" href="{{ Route('deliveryslot.create') }}">Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
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
                        @foreach ($deliveryslots as $deliveryslot)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $deliveryslot->startTime }}</td>
                                <td>{{ $deliveryslot->endTime }}</td>
                                <td>{{ $deliveryslot->isAvailable }}</td>
                                <td>
                                    <a href="{{ Route('deliveryslot.edit', $deliveryslot->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                        onclick="openDeactiveModal('{{ Route('deliveryslot.delete', $deliveryslot->id) }}')">
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
