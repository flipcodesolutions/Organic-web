@extends('visitor.layouts.app')
@section('content')
    <div class="container my-3">
        <h3 class="m-3">Your Address</h3>


        <div class="row g-3">
            <!-- Add Address Card -->
            <div class="col-12 col-sm-6 col-lg-4">
                <a class="text-decoration-none" href="{{ route('visitor.addaddress') }}/{{ session('user')->id }}">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center text-center">
                            <i class="fa-solid fa-square-plus fs-1 text-body-secondary mb-2"></i>
                            <span>Add Address</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Address Cards -->
            @foreach ($address as $addressData)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <p class="m-0 fw-bold">{{ session('user')->name }}</p>
                                <p class="m-0">{{ $addressData->address_line1 }}</p>
                                <p class="m-0">{{ $addressData->address_line2 }}</p>
                                <p class="m-0">{{ $addressData->landmark->landmark_eng }} |
                                    {{ $addressData->landmark->citymaster->area_eng }}</p>
                                <p class="m-0">{{ $addressData->landmark->citymaster->city_name_eng }}</p>
                                <p class="m-0">{{ $addressData->pincode }}</p>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('visitor.editaddress') }}/{{ $addressData->id }}">Edit</a> |
                                {{-- <a href="{{ route('visitor.deleteaddress') }}/{{ $addressData->id }}"  onclick="return confirm('Are you sure you want to delete this address?');">Delete</a> --}}
                                <a href="" class="delete-btn"
                                    data-url="{{ route('visitor.deleteaddress') }}/{{ $addressData->id }}">Delete</a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>



        {{-- <div class="address-card d-flex flex-wrap align-items-stretch">
            <a class="col-sm-12 col-md-6 col-lg-4 px-3 text-decoration-none my-2" href="{{ route('visitor.addaddress') }}/{{ session('user')->id }}">
                <div class="card h-100" style="min-width: 262px">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <div class=" d-flex  justify-content-center">
                            <i class="fa-solid fa-square-plus fs-1 text-body-secondary"></i>
                        </div>
                        <div class=" d-flex justify-content-center">
                        Add Address
                        </div>
                    </div>
                </div>
            </a>

            @foreach ($address as $addressData)
                <div class="col-sm-12 col-md-6 col-lg-4 px-3 my-2">
                    <div class="card h-100" style="min-width: 262px">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <p class="m-0">{{ session('user')->name }}</p>
                                <p class="m-0">{{ $addressData->address_line1 }}</p>
                                <p class="m-0">{{ $addressData->address_line2 }}</p>
                                <p class="m-0">{{ $addressData->landmark->landmark_eng }} | {{ $addressData->landmark->citymaster->area_eng }}</p>
                                <p class="m-0">{{ $addressData->landmark->citymaster->city_name_eng }}</p>
                                <p>{{ $addressData->pincode }}</p>
                            </div>
                            <div>
                                <a href="{{ route('visitor.editaddress') }}/{{ $addressData->id }}">Edit</a> | <a
                                    href="{{ route('visitor.deleteaddress') }}/{{ $addressData->id }}">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}
    </div>










    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    let url = this.getAttribute('data-url');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to undo this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });
        });
    </script>
@endsection
