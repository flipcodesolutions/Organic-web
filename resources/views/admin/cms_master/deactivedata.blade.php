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
                        <h6 class="mb-0">Cms_Master Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('cms_master.index') }}">Back</a>
                    </div>
                </div>
            </div>
            <adiv class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $index = 1;
                    @endphp
                    @foreach ($cms_masters as $cms_masters)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>
                                <ul>
                                    <li>{{ $cms_masters->title }}</li>
                                    <li>{{ $cms_masters->titleGuj }}</li>
                                    <li>{{ $cms_masters->titleHin }}</li>
                                </ul>
                            </td>
                            <td>{{ $cms_masters->slug }}</td>
                            <td>
                                <ul>
                                    <li>{{ $cms_masters->description }}</li>
                                    <li>{{ $cms_masters->descriptionGuj }}</li>
                                    <li>{{ $cms_masters->descriptionHin }}</li>
                                </ul>
                            </td>
                            <td>
                                <a href="{{ Route('cms_master.active', $cms_masters->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                    onclick="openDeleteModal('{{ Route('cms_master.permdelete', $cms_masters->id) }}')">
                                    <i class="fas fa-trash"></i>
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
                    {{-- @foreach ($deliveryslots as $deliveryslots) --}}
                    {{-- <a href="{{ Route('deliveryslot.permdelete', $deliveryslots->id) }}" class="btn btn-danger">Yes</a> --}}
                    <a href="" id="delete-link" class="btn btn-danger">Yes</a>
                    <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        // function openDeleteModal() {
        //     var myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        //     myModal.show();
        // }
        function openDeleteModal(deleteUrl) {

            $('#delete-link').attr('href', deleteUrl);

            $('#confirmDeleteModal').modal('show');
        }
    </script>
@endsection
