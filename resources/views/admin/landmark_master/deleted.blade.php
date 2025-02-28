@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header" style="background-color: #19aa5c">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h2 class="mb-0"> Landmark </h2>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ Route('city_master.index') }}">Back</a>
                </div>
            </div>
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
                @foreach($landmarkmasters as $landmark)
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
                        <form action="{{ route('landmark.active', $landmark->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-repeat">Restore</button>
                        </form>

                        <form action="{{ route('landmark.destroy', $landmark->id) }}" method="POST" style="display:inline;">
                            @csrf

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure? This action is irreversible!')">Delete Permanently</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
