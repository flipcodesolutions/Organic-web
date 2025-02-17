@extends('layouts.app')
@section('content')
    @if (Session::has('msg'))
        <p class="alert alert-info">{{ Session::get('msg') }}</p>
    @endif
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
                                    onclick="openDeleteModal('{{ Route('deliveryslot.delete', $deliveryslot->id) }}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deactive Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <div class="modal-body">
                    Are you sure you want to delete this Delivery Slot?
                </div> --}}
                <div class="modal-footer">
                    @foreach ($deliveryslots as $deliveryslots)
                        @if ($deliveryslots->id == $deliveryslot->id)
                            <a href="{{ Route('deliveryslot.delete', $deliveryslot->id) }}" class="btn btn-danger">Yes</a>
                            <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal() {
            var myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            myModal.show();
        }
    </script>
@endsection
