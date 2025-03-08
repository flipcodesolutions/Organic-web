@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">DeliverySlot Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="b1 btn btn-danger" href="{{ Route('deliveryslot.deactive') }}">Deactive DeliverySlot</a>
                        <a class="btn btn-primary" href="{{ Route('deliveryslot.create') }}">Add</a>
                    </div>
                </div>
            </div>

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ Route('deliveryslot.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">

                        <!-- Global Search -->
                        <div class="col">
                            <label for="global" class="form-label"><b>Filter:</b></label>
                            <input type="text" id="global" name="global" value="{{ request('global') }}"
                                class="form-control" placeholder="Search by Time">
                        </div>

                        <!--isavailable  Filter -->
                        <div class="col">
                            <label for="isavailable" class="form-label"><b>isavailable:</b></label>
                            <select name="isavailable" id="isavailable" class="form-control">
                                <option selected disabled>Select your isavailable</option>
                                <option value="Available" {{ request('isavailable') == 'Available' ? 'selected' : '' }}>
                                    Available</option>
                                <option value="NotAvailable"
                                    {{ request('isavailable') == 'NotAvailable' ? 'selected' : '' }}>
                                    NotAvailable</option>
                            </select>
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col-md-4 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ Route('deliveryslot.index') }}" class="btn btn-danger">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered mt-2" style="border: 1px solid gray;">
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
                    @if (count($data) > 0)
                        @foreach ($data as $deliveryslot)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $deliveryslot->startTime }}</td>
                                <td>{{ $deliveryslot->endTime }}</td>
                                <td>{{ $deliveryslot->isAvailable }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ Route('deliveryslot.edit', $deliveryslot->id) }}"
                                            class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                            onclick="openDeactiveModal('{{ Route('deliveryslot.delete', $deliveryslot->id) }}')">
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
