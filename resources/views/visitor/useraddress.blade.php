@extends('visitor.layouts.app')
@section('content')
    <div class="container">
        <h3 class="m-3">Your Address</h3>
        <div class="address-card d-flex flex-wrap align-items-stretch">
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
        </div>
    </div>
@endsection
