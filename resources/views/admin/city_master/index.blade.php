@extends('layouts.app')

@section('content')
<h2>City Master</h2>
    <a href="{{ route('city_master.create') }}" class="btn btn-primary">Add City</a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>City Name (EN)</th>
            <th>City Name (HI)</th>
            <th>City Name (GU)</th>
            <th>Pincode</th>
            <th>Area (EN)</th>
            <th>Actions</th>
        </tr>
        @foreach($cities as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->city_name_en }}</td>
            <td>{{ $city->city_name_hi }}</td>
            <td>{{ $city->city_name_gu }}</td>
            <td>{{ $city->pincode }}</td>
            <td>{{ $city->area_en }}</td>
            <td>
                <a href="{{ route('city_master.edit', $city->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('city_master.destroy', $city->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection