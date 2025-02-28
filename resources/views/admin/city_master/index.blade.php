@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header" style="background-color: #ooo">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h2 class="mb-0">All Citites</h2>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-danger" href="{{ Route('city_master.deleted') }}">Deleted City</a>

                    <a href="{{ route('city_master.create') }}" class="btn btn-primary">Add City</a>
                </div>
            </div>
        </div>



        <div class="mb-4 margin-bottom-30 m-4">
            <form action="{{ route('city_master.index') }}" method="GET" class="filter-form">
                <div class="row align-items-end g-2">
                    
                    <!-- Global Search -->
                    <div class="col-md-4">
                        <label for="global" class="form-label"><b>Filter:</b></label>
                        <input type="text" id="global" name="global" value="{{ request('global') }}" class="form-control" placeholder="Search by City Name">
                    </div>
        
                    <!-- City Filter -->
                    <div class="col-md-4">
                        <label for="cityId" class="form-label"><b>City:</b></label>
                        <select id="cityId" name="cityId" class="form-select">
                            <option value="" selected>Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ request('cityId') == $city->id ? 'selected' : '' }}>
                                    {{ $city->city_name_eng }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
        
                    <!-- Submit & Reset Buttons -->
                    <div class="col-md-4 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('city_master.index') }}" class="btn btn-danger">Reset</a>
                    </div>
                </div>
            </form>
        </div>
        

        <div class="card-body table-responsive">
            <div class="loader"></div>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>City Name (ENG)</th>
                    <th>City Name (HIN)</th>
                    <th>City Name (GUJ)</th>
                    <th>Pincode</th>
                    <th>Area (ENG)</th>
                    <th>Area (HIN)</th>
                    <th>Area (GUJ)</th>
                    <th>Status</th>
                    <th>Actions</th>

                </tr>
                @foreach($data as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->city_name_eng }}</td>
                    <td>{{ $city->city_name_hin }}</td>
                    <td>{{ $city->city_name_guj }}</td>
                    <td>{{ $city->pincode }}</td>
                    <td>{{ $city->area_eng }}</td>
                    <td>{{ $city->area_hin }}</td>
                    <td>{{ $city->area_guj }}</td>
                    <td>{{ $city->status }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('city_master.edit')}}/ {{ $city->id }}"><i class="fas fa-edit"></i></a>

                        <a href="{{ route('city_master.deactive') }}/{{ $city->id }}" class="btn btn-danger">
                            <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
