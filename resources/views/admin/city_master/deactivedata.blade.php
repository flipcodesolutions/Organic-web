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
                                {{--  <!-- Delete Confirmation Modal -->
                                {{--  <div id="deleteModal" style="display: none;">  --}}
                                    {{--  <p>Are you sure you want to delete this item?</p>
                                    <button onclick="deleteItem()">Yes, Delete</button>
                                    <button onclick="closeDeleteModal()">Cancel</button>
                                </div>  --}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </adiv>
        </div>
    </div>

    <script>
        let itemIdToDelete = null;

        function openDeleteModal(id) {
            itemIdToDelete = id;
            document.getElementById("deleteModal").style.display = "block";
        }

        function closeDeleteModal() {
            document.getElementById("deleteModal").style.display = "none";
        }

        function deleteItem() {
            if (itemIdToDelete) {
                fetch(`/delete-item/${itemIdToDelete}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(response => response.json())
                  .then(data => {
                      alert("Item deleted successfully!");
                      closeDeleteModal();
                      location.reload();
                  }).catch(error => console.error("Error:", error));
            }
        }
    </script>
@endsection
