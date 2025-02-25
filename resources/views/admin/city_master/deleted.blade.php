@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Deleted Cities</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>City Name (English)</th>
                <th>Pincode</th>
                <th>Area (English)</th>
                <th>Area (Hindi)</th>
                <th>Area (Gujarati)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citymaster as $city)
            <tr>
                <td>{{ $city->city_name_eng }}</td>
                <td>{{ $city->pincode }}</td>
                <td>{{ $city->area_eng }}</td>
                <td>{{ $city->area_hin }}</td>
                <td>{{ $city->area_guj }}</td>
                <td>
                    <form action="{{ route('city_master.active', $city->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Restore</button>
                    </form>

                    <form action="{{ route('city_master.destroy', $city->id) }}" method="POST" style="display:inline;">
                        @csrf
                    
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure? This action is irreversible!')">Delete Permanently</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
