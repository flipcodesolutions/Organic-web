@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Landmark</h6>
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
                        <select class="form-control" name="city_name_eng" id="exampleFormControlSelect1">
                            <option value="">-- Select City --</option>
                            @foreach ($cities as $citymaster)
                                <option value="{{  $citymaster->id }}">{{ $citymaster->city_name_eng }}</option>
                            @endforeach
                        </select>
                        @error('city_name_eng')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <span id="nameError" class="text-danger"></span>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <select class="form-control" name="city_name_hin" id="exampleFormControlSelect1">
                        <option value="">-- Select City --</option>
                        @foreach ($cities as $citymaster)
                            <option value="{{  $citymaster->id }}">{{ $citymaster->city_name_hin }}</option>
                        @endforeach
                    </select>  
                    @error('city_name_hin')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <span id="nameError" class="text-danger"></span>
                </div>
            </div>

            <div class="col">
                <div class="form-floating">
                    <select class="form-control" name="city_name_guj" id="exampleFormControlSelect1">
                        <option value="">-- Select City --</option>
                        @foreach ($cities as $citymaster)
                            <option value="{{  $citymaster->id }}">{{ $citymaster->city_name_guj }}</option>
                        @endforeach
                    </select>
                    @error('city_name_guj')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <span id="nameError" class="text-danger"></span>
                </div>
            </div>  
        </div>


        <div class="row mb-3">
            <div class="col-sm-12 col-lg-3 col-md-12">
                    Landmark Name : <span class="text-danger">*</span>
            </div>

            <div class="col">
                <div class="form-floating">
                        <input type="text" name="landmark_eng" class="form-control" placeholder="English" id="#" aria-describedby="#">
                        @error('landmark english')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <input type="text" name="landmark_hin" class="form-control" placeholder="Hindi" id="#" aria-describedby="#">
                    @error('landmark_hin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
                
            <div class="col">
                <div class="mb-3">
                    <input type="text" name="landmark_guj" class="form-control" id="#" placeholder="Gujarati" aria-describedby="#">
                    @error('landmark_guj')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        </div> 


        <div class="row mb-3">
        <div class="col">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label m-2"> Latitude : </label>
                    <input type="text" name="latitude" class="form-control m-2" id="#">
                    @error('latitude')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        </div>  

        <div class="col">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label m-2"> Longitude : </label>
                    <input type="text" name="longitude" class="form-control m-2" id="#">
                    @error('longitude')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror   
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

