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
                        <h6 class="mb-0">UnitMaster Slot Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{Route('unitmaster.index')}}">Back</a>
                    </div>
                </div>
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
                    @foreach ($unitmasters as $unitmasters)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $unitmasters->unit }}</td>
                            <td>
                                <a href="{{Route('unitmaster.active',$unitmasters->id)}}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                    onclick="openDeleteModal('{{Route('unitmaster.permdelete',$unitmasters->id)}}')">
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
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <div class="modal-body">
                    Are you sure you want to delete this Delivery Slot?
                </div> --}}
                <div class="modal-footer">

                            <a href="" id="deleteLink" class="btn btn-danger">Yes</a>
                            <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>

                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(url) {
            $('#deleteLink').attr('href', url);
            $('#confirmDeleteModal').modal('show');
        }
    </script>
@endsection
