@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-1 text-gray-800">City Management</h1>
    </div>
    <a class="btn btn-danger mr-1" href="{{ Route('city_master.deleted') }}">Deactivated Cities</a>
    <a href="{{ route('city_master.create') }}" class="btn btn-primary">Add</a>
</div>

<div class="card-body p-0">
    <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header d-flex" style="background-color: #ooo">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">City Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="btn btn-danger" href="{{ Route('city_master.deleted') }}">Deactivated Cities</a>

                        <a href="{{ route('city_master.create') }}" class="btn btn-primary">Add</a>
                    </div>
                </div>
            </div> --}}

            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('city_master.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">

                        <!-- Global Search -->
                        <div class="col">
                            <label for="global" class="form-label"><b>Filter:</b></label>
                            <input type="text" id="global" name="global" value="{{ request('global') }}"
                                class="form-control" placeholder="Search by City Name or Pin Code">
                        </div>

                        <!-- City Filter -->
                        {{-- <div class="col">
                            <label for="cityId" class="form-label"><b>City:</b></label>
                            <select id="cityId" name="cityId" class="form-select">
                                <option value="" selected>Select City</option>
                                @foreach ($cities as $city)
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
                            <a href="{{ route('city_master.index') }}" class="reset btn">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>City Name</th>
                        {{-- <th>City Name (HIN)</th>
                        <th>City Name (GUJ)</th> --}}
                        <th>Pincode</th>
                        <th>Area</th>
                        {{-- <th>Area (HIN)</th>
                        <th>Area (GUJ)</th> --}}
                        <th>Actions</th>
                    </tr>

                    @foreach ($data as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->city_name_eng }}</td>
                            {{-- <td>{{ $city->city_name_hin }}</td>
                            <td>{{ $city->city_name_guj }}</td> --}}
                            <td>{{ $city->pincode }}</td>
                            <td>{{ $city->area_eng }}</td>
                            {{-- <td>{{ $city->area_hin }}</td>
                            <td>{{ $city->area_guj }}</td> --}}
                            <td>
                                <div class="d-flex">
                                <a class="edit btn" href="{{ route('city_master.edit',$city->id)}}"><i
                                class="fas fa-edit"></i></a>

                                <a href="javascript:void(0)" class="delete btn ml-2"
                                onclick="openDeactiveModal('{{ route('city_master.deactive',$city->id) }}')">
                                <i class="fas fa-trash"></i>
                                </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
