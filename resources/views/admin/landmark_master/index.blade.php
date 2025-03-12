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
                        <a class="b1 btn btn-danger" href="{{ Route('landmark.deleted') }}">Deactive Landmark</a>

                        <a href="{{ route('landmark.create') }}" class="btn btn-primary">Add</a>
                    </div>
                </div>
            </div>


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
                            <label for="landamrkId" class="form-label"><b>Landmark:</b></label>
                            <select id="landmarkId" name="landmarkId" class="form-select">
                                <option value="" selected> Select Landamrk </option>
                                @foreach ($landmarkmasters as $landmark)
                                    <option value="{{ $landmark->id }}"
                                        {{ request('landmarkId') == $landmark->id ? 'selected' : '' }}>
                                        {{ $landmark->landmark_eng }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col-md-4 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('landmark.index') }}" class="btn btn-danger">Reset</a>
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
                        {{-- <th>City name Hindi</th>
                        <th>City name Gujarati</th> --}}
                        <th>Landmark English</th>
                        <th>Landmark Hindi</th>
                        <th>Landmark Gujarati</th>
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
                            <td>{{ $landmark->landmark_hin }}</td>
                            <td>{{ $landmark->landmark_guj }}</td>
                            <td>{{ $landmark->latitude }}</td>
                            <td>{{ $landmark->longitude }}</td>
                            <td>
                                <div class="d-flex">
                                <a class="btn btn-primary" href="{{ route('landmark.edit', $landmark->id) }}"><i
                                        class="fas fa-edit"></i></a>

                                <a href="javascript:void(0)" class="btn btn-danger ml-2"
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
