@extends('layouts.app')
@section('content')
@if(Session::has('msg'))
<p class="alert alert-info">{{ Session::get('msg') }}</p>
@endif
    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">DilverySlot Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('deliveryslot.create') }}">Add</a>
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
                    @foreach ($deliveryslots as $deliveryslots)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $deliveryslots->startTime }}</td>
                            <td>{{ $deliveryslots->endTime }}</td>
                            <td>{{ $deliveryslots->isAvailable }}</td>
                            <td>
                                <a href="{{ Route('deliveryslot.edit', $deliveryslots->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    {{-- <tr>
                            <td colspan="8" align="center" style="color: red;">
                                <h5>No Data Record Found</h5>
                            </td>
                        </tr> --}}

                </table>
                {{-- table end --}}


            </adiv>
        </div>
    </div>
@endsection
