@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Deactivated City</h1>
    </div>
    <a class="btn btn-primary" href="{{ Route('city_master.index') }}">Back</a>
</div>

<div class="card-body p-0">
    <div class="card shadow-sm  bg-body rounded">
        {{-- <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Deactive City</h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ Route('city_master.index') }}">Back</a>
                </div>
            </div>
        </div> --}}


        <div class="mb-4 margin-bottom-30 m-4">
            <form action="{{ route('city_master.deleted') }}" method="GET" class="filter-form">
                <div class="row align-items-end g-2">

                    <!-- Global Search -->
                    <div class="col">
                        <label for="global" class="form-label"><b>Filter:</b></label>
                        <input type="text" id="global" name="global" value="{{ request('global') }}"
                            class="form-control" placeholder="Search by City Name">
                    </div>

                    <!-- City Filter -->
                    {{-- <div class="col">
                        <label for="cityId" class="form-label"><b>City:</b></label>
                        <select id="cityId" name="cityId" class="form-select">
                            <option value="" selected>Select City</option>
                            @foreach ($citymaster as $city)
                                <option value="{{ $city->id }}"
                                    {{ request('cityId') == $city->id ? 'selected' : '' }}>
                                    {{ $city->city_name_eng }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <!-- Submit & Reset Buttons -->
                    <div class="col-md-4 d-flex justify-content-end gap-2">
                        <button type="submit" class="filter btn">Filter</button>
                        <a href="{{ route('city_master.deleted') }}" class="reset btn">Reset</a>
                    </div>
                </div>
            </form>
        </div>



        <div class="card-body table-responsive">
            <div class="loader"></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>City Name</th>
                        <th>Pincode</th>
                        <th>Area</th>
                        {{-- <th>Area (Hindi)</th>
                        <th>Area (Gujarati)</th> --}}
                        <th>Status</td>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $city)
                    <tr>
                        <td>{{ $city->city_name_eng }}</td>
                        <td>{{ $city->pincode }}</td>
                        <td>{{ $city->area_eng }}</td>
                        {{-- <td>{{ $city->area_hin }}</td>
                        <td>{{ $city->area_guj }}</td> --}}
                        <td>{{ $city->status }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ Route('city_master.active', $city->id) }}"
                                    class="edit btn">
                                    <i class="fas fa-undo"></i>
                                </a>

                                <a href="javascript:void(0)" class="delete btn ml-2"
                                onclick="openDeleteModal('{{ Route('city_master.destroy', $city->id) }}')">
                                <i class="fas fa-trash"></i>
                            </a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
