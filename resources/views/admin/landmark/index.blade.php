@extends('layouts.app')

@section('content')
<h2>Cities</h2>
    <a href="{{ route('city_master.create') }}" class="btn btn-primary">Add City</a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th> Landmark (ENG)</th>
            <th> Landmark (HIN)</th>
            <th> Landmark (GUJ)</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Actions</th>
        </tr>
        @foreach($landmarks as Landmark)
        <tr>
          
            <td>{{ $landmark->city->city_name_eng }}</td>
            <td>{{ $landmark->city->city_name_hin }}</td>
            <td>{{ $landmark->city->city_name_guj }}</td>
            
            <td>{{ $landmark->landmark_eng }}</td>
            <td>{{ $landmark->landmark_hin }}</td>
            <td>{{ $landmark->landmark_guj }}</td>
            <td>{{ $landmark->latitude  }}</td>
            <td>{{ $landmark->longitude }}</td>
            
            
            <td>
                <a class="btn btn-primary" href="{{ route('landmark.edit')}}/ {{ $landmark->id }}" >Edit</a>
        
               
            </td>
        </tr>
        @endforeach
    </table>
@endsection 