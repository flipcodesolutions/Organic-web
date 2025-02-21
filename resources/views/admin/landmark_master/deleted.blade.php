@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6> Landmark </h6>
                </div>
                <div class="col" align="right">
                    {{-- <a class="btn btn-danger" href="{{ Route('landmark.deleted') }}">Deleted Data</a>

                    <a href="{{ route('landmark.create') }}" class="btn btn-primary">Add Landamrk</a> --}}
                </div>
            </div>
        </div>

    
    <table class="table">
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
                    <button type="submit" class="btn btn-success">Restore</button>
                </form>

                <form action="{{ route('landmark.destroy', $landmark->id) }}" method="POST" style="display:inline;">
                    @csrf
                
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure? This action is irreversible!')">Delete Permanently</button>
                </form>
            </td>

        </tr>
        @endforeach
    </table>
@endsection
