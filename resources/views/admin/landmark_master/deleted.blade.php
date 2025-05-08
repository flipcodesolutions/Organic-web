@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Deactivated Landmark</h1>
    </div>
    <a class="btn btn-primary" href="{{ Route('landmark.index') }}">Back</a>
</div>

<div class="card-body p-0">
    <div class="card shadow-sm  bg-body rounded">
        {{-- <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Deactive Landmark</h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ Route('landmark.index') }}">Back</a>
                </div>
            </div>
        </div> --}}

        {{-- filter --}}
        <div class="mb-4 margin-bottom-30 m-4">
            <form action="{{ route('landmark.deleted') }}" method="GET" class="filter-form">
                <div class="row align-items-end g-2">

                    <!-- Global Search -->
                    <div class="col">
                        <label for="global" class="form-label"><b>Filter:</b></label>
                        <input type="text" id="global" name="global" value="{{ request('global') }}"
                            class="form-control" placeholder="Search by Landmark Name">
                    </div>

                    <!-- City Filter -->
                    <div class="col">
                        <label for="cityId" class="form-label"><b>city:</b></label>
                        <select id="cityId" name="cityId" class="form-select">
                            <option value="" selected> Select city </option>
                            @foreach ($cities as $citydata)
                                <option value="{{ $citydata->id }}"
                                    {{ request('cityId') == $citydata->id ? 'selected' : '' }}>
                                    {{ $citydata->city_name_eng }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit & Reset Buttons -->
                    <div class="col-md-4 d-flex justify-content-end gap-2">
                        <button type="submit" class="filter btn">Filter</button>
                        <a href="{{ route('landmark.deleted') }}" class="reset btn">Reset</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body table-responsive">
            <div class="loader"></div>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>City name English</th>
                    <th>City name Hindi</th>
                    <th>City name Gujarati</th>

                    <th> Landmark (ENG)</th>
                    <th> Landmark (HIN)</th>
                    <th> Landmark (GUJ)</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                @foreach($data as $landmark)
                <tr>
                    <td>{{ $landmark->id }}
                    <td>{{ $landmark->citymaster->city_name_eng }}</td>
                    <td>{{ $landmark->citymaster->city_name_hin }}</td>
                    <td>{{ $landmark->citymaster->city_name_guj }}</td>

                    <td>{{ $landmark->landmark_eng }}</td>
                    <td>{{ $landmark->landmark_hin }}</td>
                    <td>{{ $landmark->landmark_guj }}</td>
                    <td>{{ $landmark->latitude  }}</td>
                    <td>{{ $landmark->longitude }}</td>
                    <td>{{ $landmark->status }}</td>


                    <td>
                        <div class="d-flex">
                            <a href="{{ Route('landmark.active', $landmark->id) }}"
                                class="edit btn">
                                <i class="fas fa-undo"></i>
                            </a>
                            <a href="javascript:void(0)" class="delete btn ml-2"
                            onclick="openDeleteModal('{{ Route('landmark.destroy', $landmark->id) }}')">
                            <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>

                </tr>
                @endforeach
            </table>
            {!! $data->links('pagination::bootstrap-5') !!}

        </div>
    </div>
</div>
@endsection
