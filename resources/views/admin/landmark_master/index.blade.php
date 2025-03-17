@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header d-flex">
                {{-- <div class="row d-flex align-items-center"> --}}
                <div class="col text-white mt-2">
                    <h6 class="mb-0">Landmark Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="b1 btn btn-danger" href="{{ Route('landmark.deleted') }}">Deactivated Landmarks</a>

                        <a href="{{ route('landmark.create') }}" class="btn btn-primary">Add</a>
                    </div>
                </div>
            </div>

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('landmark.index') }}" method="GET" class="filter-form">
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
                            <a href="{{ route('landmark.index') }}" class="reset btn">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>City name</th>
                        {{-- <th>City name Hindi</th>
                        <th>City name Gujarati</th> --}}
                        <th>Landmark</th>
                        {{-- <th>Landmark Hindi</th>
                        <th>Landmark Gujarati</th> --}}
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($data as $landmark)
                        <tr>
                            <td>{{ $landmark->id }}
                            <td>{{ $landmark->citymaster->city_name_eng }}</td>
                            {{-- <td>{{ $landmark->citymaster->city_name_hin }}</td>
                            <td>{{ $landmark->citymaster->city_name_guj }}</td> --}}
                            <td>{{ $landmark->landmark_eng }}</td>
                            {{-- <td>{{ $landmark->landmark_hin }}</td>
                            <td>{{ $landmark->landmark_guj }}</td> --}}
                            <td>{{ $landmark->latitude }}</td>
                            <td>{{ $landmark->longitude }}</td>
                            <td>
                                <div class="d-flex">
                                <a class="edit btn" href="{{ route('landmark.edit', $landmark->id) }}"><i
                                        class="fas fa-edit"></i></a>

                                <a href="javascript:void(0)" class="delete btn ml-2"
                                    onclick="openDeactiveModal('{{ route('landmark.deactive') }}/{{ $landmark->id }}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
