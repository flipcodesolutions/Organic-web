@extends('layouts.app')

@section('content')



<div class='m-2'>
    <a class="btn btn-primary" href="{{ route('landmark.index') }}" role="button" >Back </a>
</div>


<div class="card-body">

    <form action="{{ route('landmark.store') }}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="exampleFormControlSelect1">city Name</label>
                <select class="form-control" name="city_id" id="exampleFormControlSelect1">
                    <option disabled selected >-- Select Category --</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->city_name_eng }}</option>
                    @endforeach
    
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlSelect1">city Name</label>
                    <select class="form-control" name="city_id" id="exampleFormControlSelect1">
                        <option disabled selected >-- Select Category --</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->city_name_hin }}</option>
                        @endforeach
        
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlSelect1">city Name</label>
                        <select class="form-control" name="city_id" id="exampleFormControlSelect1">
                            <option disabled selected >-- Select Category --</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city_name_guj }}</option>
                            @endforeach
            
                        </select>
                    </div>
    


                <div class="mb-3">
                        <label class="form-label">Landmark English : </label>
                        <input type="text" name="landmark_eng" class="form-control" id="#" aria-describedby="#">
                        @error('landmark_eng')
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
                    <input type="text" name="pincode" class="form-control" id="#">
                    @error('pincode')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Longitude : </label>
                    <input type="text" name="area_eng" class="form-control" id="#">
                    @error('area')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary"> Create </button>
            
          </form>
</div>
@endsection

 