@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Create New Cms_Master</h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ route('landmark.index') }}" role="button" >Back </a>
                </div>
            </div>
        </div>


<div class="card-body">

    <form action="{{ route('landmark.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="row mb-3">
            <div class="col-sm-12 col-lg-3 col-md-12">
                City Name : <span class="text-danger">*</span>
            </div>

            <div class="col">
                <div class="form-floating">
                    <input type="text" name="city_name_eng" id="city_name_eng" placeholder="English"
                        class="form-control">
                        @error('city_name_eng')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <span id="nameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <input type="text" name="city_name_hin" id="city_name_hin" placeholder="Hindi"
                        class="form-control">
                        @error('city_name_hin')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                    <span id="nameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <input type="text" name="city_name_guj" id="city_name_guj" placeholder="Gujarati"
                        class="form-control">
                        @error('city_name_guj')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                    <span id="nameError" class="text-danger"></span>
                </div>
            </div>
    </div>





            <div class="mb-3">
            <label for="exampleFormControlSelect1">City name</label>
                <select class="form-control" name="city_name_eng" id="exampleFormControlSelect1">
                    <option value="">-- Select City --</option>
                    @foreach ($cities as $citymaster)
                        <option value="{{  $citymaster->id }}">{{ $citymaster->city_name_eng }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlSelect1">City name</label>
                    <select class="form-control" name="city_name_hin" id="exampleFormControlSelect1">
                        <option value="">-- Select City --</option>
                        @foreach ($cities as $citymaster)
                            <option value="{{  $citymaster->id }}">{{ $citymaster->city_name_hin }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlSelect1">City name</label>
                        <select class="form-control" name="city_name_guj" id="exampleFormControlSelect1">
                            <option value="">-- Select City --</option>
                            @foreach ($cities as $citymaster)
                                <option value="{{  $citymaster->id }}">{{ $citymaster->city_name_guj }}</option>
                            @endforeach
                        </select>
                    </div>

                <div class="mb-3">
                        <label class="form-label">Landmark English</label>
                        <input type="text" name="landmark_eng" class="form-control" id="#" aria-describedby="#">
                        @error('landmark english')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Landmark Hindi : </label>
                    <input type="text" name="landmark_hin" class="form-control" id="#" aria-describedby="#">
                    @error('landmark_hin')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Landmark Gujarati : </label>
                    <input type="text" name="landmark_guj" class="form-control" id="#" aria-describedby="#">
                    @error('landmark_guj')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Latitude : </label>
                    <input type="text" name="latitude" class="form-control" id="#">
                    @error('latitude')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Longitude : </label>
                    <input type="text" name="longitude" class="form-control" id="#">
                    @error('longitude')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"> Create </button>

          </form>
</div>
@endsection

