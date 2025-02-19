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
                        <h6 class="mb-0">DilverySlot Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('admin.city_master.index') }}">Back</a>
                    </div>
                </div>
            </div>
            <adiv class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>City Name (ENG) </th>
                        <th>City Name (HIN)</th>
                        <th>City Name (GUJ)</th>
                        <th>Pincode</th>
                        <th>Area (ENG)</th>
                        <th>Area (HIN)</th>
                        <th>Area (GUJ)</th>
                        <th>Actions</th>
                    </tr>
                    @php
                  $index = 1;
                    @endphp
                    @foreach ($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->city_name_eng }}</td>
                            <td>{{ $city->city_name_hin }}</td>
                            <td>{{ $city->city_name_guj }}</td>
                            <td>{{ $city->pincode }}</td>
                            <td>{{ $city->area_eng }}</td>
                            <td>{{ $city->area_hin }}</td>
                            <td>{{ $city->area_guj }}</td>
                            <td>
                                <a href="{{ Route('admin.citymaster.active', $citymaster->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                    onclick="openDeleteModal('{{ Route('admin.citymaster.permdelete', $citymaster->id) }}')">
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
            // Update the delete link in the modal dynamically
            document.getElementById('delete-link').setAttribute('href', deleteUrl);
            var myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            myModal.show();
        }
    </script>
@endsection
