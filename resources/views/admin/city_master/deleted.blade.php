@extends('layouts.app')

@section('content')


<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Deactive City</h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ Route('city_master.index') }}">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <div class="loader"></div>
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
                            <div class="d-flex">
                                <a href="{{ Route('city_master.active', $city->id) }}"
                                    class="btn btn-primary">
                                    <i class="fas fa-undo"></i>
                                </a>

                                <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                onclick="openDeleteModal('{{ Route('city_master.destroy', $city->id) }}')">
                                <i class="fas fa-trash"></i>
                            </a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
