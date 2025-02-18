@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">All Citites</h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-danger" href="{{ Route('city_master.deactivedata') }}">Deactive-Data</a>

                    <a href="{{ route('city_master.create') }}" class="btn btn-primary">Add City</a>
                </div>
            </div>
        </div>

    
    <table class="table">
        <tr>
            <th>ID</th>
            <th>City Name (ENG)</th>
            <th>City Name (HIN)</th>
            <th>City Name (GUJ)</th>
            <th>Pincode</th>
            <th>Area (ENG)</th>
            <th>Area (HIN)</th>
            <th>Area (GUJ)</th>
            <th>Actions</th>
        </tr>
        @foreach($cities as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->city_name_eng }}</td>
            <td>{{ $city->city_name_hin }}</td>
            <td>{{ $city->city_name_guj }}</td>
            <td>{{ $city->pincode }}</td>
            <td>{{ $city->area_eng }}</td>
            <td>{{ $city->area_hin }}</td>
            <td>{{ $city->area_guj }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('city_master.edit')}}/ {{ $city->id }}" >Edit</a>
        
                <a href="{{ route('city_master.deactivedata') }}/{{ $city->id }}" class="btn btn-danger">
                    <i class="fas fa-remove"></i>
            </a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection 