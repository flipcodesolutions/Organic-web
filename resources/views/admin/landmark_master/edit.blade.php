@extends('layouts.app')

@section('content')



<div class='m-2'>
    <a class="btn btn-primary" href="{{ route('landmark.index') }}" role="button" >Back </a>
</div>


<div class="card-body">

    <form action="{{ route('landmark.update') }}" method="post" enctype="multipart/form-data">

        @csrf
        <input type="hidden" value="{{ $landmarkmaster->id }}" name="landmark_id">

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
                    <input type="text" name="landmark_eng"  value="{{ $landmarkmaster->landmark_eng }}" class="form-control" id="#" aria-describedby="#">
                    @error('landmark english')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Landmark Hindi : </label>
                <input type="text" name="landmark_hin" value="{{ $landmarkmaster->landmark_hin }}" class="form-control" id="#" aria-describedby="#">
                @error('landmark_hin')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Landmark Gujarati : </label>
                <input type="text" name="landmark_guj" value="{{ $landmarkmaster->landmark_guj }}" class="form-control" id="#" aria-describedby="#">
                @error('landmark_guj')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"> Latitude : </label>
                <input type="text" name="latitude" value="{{ $landmarkmaster->latitude }}" class="form-control" id="#">
                @error('latitude')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"> Longitude : </label>
                <input type="text" name="longitude" value="{{ $landmarkmaster->longitude }}" class="form-control" id="#">
                @error('longitude')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


                <button type="submit" class="btn btn-primary"> Upadate </button>

          </form>
</div>
@endsection

