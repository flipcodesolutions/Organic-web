@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Create New Landmark</h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ route('landmark.index') }}" role="button">Back </a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('landmark.store') }}" method="post" enctype="multipart/form-data" class="form">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-12 col-lg-3 col-md-12">
                        City Name : <span class="text-danger">*</span>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-control" name="city_id" id="exampleFormControlSelect1">
                                <option value="">-- Select City --</option>
                                @foreach ($cities as $citymaster)
                                <option value="{{  $citymaster->id }}">{{ $citymaster->city_name_eng }}</option>
                                @endforeach
                            </select>
                            <span>
                                @error('city_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </span>
                    <span id="nameError" class="text-danger"></span>
                </div>
        </div>


        <div class="row my-3">
            <div class="col-sm-12 col-lg-3 col-md-12">
                    Landmark Name : <span class="text-danger">*</span>
            </div>
            <div class="col">
                <div class="form-floating">
                    <input type="text" name="landmark_eng" class="form-control" placeholder="English"
                    id="landmark_eng" aria-describedby="#">
                        <label for="landmark_eng">English</label>
                        <span>
                         @error('landmark english')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </span>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input type="text" name="landmark_hin" class="form-control" placeholder="Hindi" id="landmark_hin" aria-describedby="#">
                    <label for="landmark_hin">Hindi</label>
                    <span>
                     @error('landmark_hin')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </span>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input type="text" name="landmark_guj" class="form-control" id="landmark_guj" placeholder="Gujarati" aria-describedby="#">
                    <label for="landmark_guj">Gujarati</label>
                    <span>
                     @error('landmark_guj')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </span>
                </div>
            </div>
        </div>
        </div>


        <div class="row m-3">
            <div class="col">
                <div class="form-floating">
                    <input type="text" name="latitude" class="form-control" id="latitude" placeholder="latitude" aria-describedby="#">
                    <label for="latitude">Latitude</label>
                    <span>
                        @error('latitude')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <input type="text" name="longitude" class="form-control" id="longitude" placeholder="longitude" aria-describedby="#">
                    <label for="longitude">Longitude</label>
                    <span>
                        @error('longitude')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm  mt-3 mb-3">
                    <i class="fa-solid fa-floppy-disk"></i> Submit</button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
