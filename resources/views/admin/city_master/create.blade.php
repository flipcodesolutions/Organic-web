@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Create New City</h1>
    </div>
    <a class="btn btn-primary" href="{{ Route('city_master.index') }}">Back</a>
</div>

<div class="card-body p-0">
    <div class="card shadow-sm bg-body rounded">
        {{-- <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Create New City</h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ Route('city_master.index') }}">Back</a>
                </div>
            </div>
        </div> --}}

        <div class="card-body">

            <form action="{{ route('city_master.store') }}" method="post" enctype="multipart/form-data" class="form">
                @csrf
                {{-- City_Master --}}
                <div class="row mb-3">
                    <div class="col-sm-12 col-lg-3 col-md-12">
                        City Name : <span class="text-danger">*</span>
                    </div>

                    <div class="col">
                        <div class="form-floating">
                            <input type="text" name="city_name_eng" id="city_name_eng" placeholder="English"
                            value="{{ old('city_name_eng') }}" class="form-control">
                            <label for="city_name_eng">English</label>
                            <span>
                                @error('city_name_eng')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" name="city_name_guj" id="city_name_guj" placeholder="Gujarati"  value="{{ old('city_name_guj') }}" class="form-control">
                            <label for="city_name_guj">Gujarati</label>
                            <span>
                                @error('city_name_guj')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" name="city_name_hin" id="city_name_hin" placeholder="Hindi"  value="{{ old('city_name_hin') }}" class="form-control">
                            <label for="city_name_hin">Hindi</label>
                            <span>
                                @error('city_name_hin')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12 col-lg-3 col-md-12">
                        PinCode : <span class="text-danger">*</span>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" name="pincode" id="pincode" placeholder="PinCode" class="form-control", value="{{ old('pincode') }}">
                            <span>
                                @error('pincode')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 col-lg-3 col-md-12">
                        Area Name : <span class="text-danger">*</span>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" name="area_eng" id="area_eng" placeholder="English" class="form-control"  value="{{ old('area_eng') }}">
                            <label for="area_eng">English</label>
                            <span>
                                @error('area_eng')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" name="area_guj" id="area_guj" placeholder="Gujarati" class="form-control">
                            <label for="area_guj">Gujarati</label>
                            <span>
                                @error('area_guj')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" name="area_hin" id="area_hin" placeholder="Hindi" class="form-control">
                            <label for="area_hin">Hindi</label>
                            <span>
                                @error('area_hin')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="submit btn">
                            <i class="fa-solid fa-floppy-disk"></i> Submit</button>
                    </div>
                </div>

            </form>
        </div>
        
    </div>
</div>
@endsection