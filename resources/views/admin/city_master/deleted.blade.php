@extends('layouts.app')

@section('content')
    

    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header" style="background-color: #1B5E20">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h2>Deleted Cities</h2>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('city_master.index') }}">Back</a>
                    </div>
                </div>
            </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>City Name (English)</th>
                            <th>Pincode</th>
                            <th>Area (English)</th>
                            <th>Area (Hindi)</th>
                            <th>Area (Gujarati)</th>
                            <th>Status</td>
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
                    <td>{{ $city->status }}</td>
                    <td>

                    <form action="{{ route('city_master.active', $city->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-undo"></i>
                            
                        </button>
                    </form>

                    <form action="{{ route('city_master.destroy', $city->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure? This action is irreversible!')">
                            <i class="fas fa-trash"></i>   
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
