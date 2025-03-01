@extends('layouts.app')

@section('content')



<div class='m-2'>
    <a class="btn btn-primary" href="{{ route('city_master.index') }}" role="button" >Back </a>
</div>


<div class="card-body">

    <form action="{{ route('city_master.update') }}" method="post" enctype="multipart/form-data">

        @csrf
        <input type="hidden" value="{{ $city_master->id }}" name="city_id">

                <div class="mb-3">
                        <label class="form-label">City Name English : </label>
                        <input type="text" value="{{ $city_master->city_name_eng }}" name="city_name_eng" class="form-control" id="#" aria-describedby="#">
                        @error('city_name_eng')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">City Name Hindi : </label>
                    <input type="text" value="{{ $city_master->city_name_hin }}" name="city_name_hin" class="form-control" id="#" aria-describedby="#">
                    @error('city_name_hin')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">City Name Gujarati : </label>
                    <input type="text" value="{{ $city_master->city_name_guj }}" name="city_name_guj" class="form-control" id="#" aria-describedby="#">
                    @error('city_name_guj')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Pincode : </label>
                    <input type="text" value="{{ $city_master->pincode }}" name="pincode" class="form-control" id="#">
                    @error('pincode')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Area Eng : </label>
                    <input type="text" value="{{ $city_master->area_eng }}" name="area_eng" class="form-control" id="#">
                    @error('area')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Area Hin : </label>
                    <input type="text" value="{{ $city_master->area_hin }}" name="area_hin" class="form-control" id="#">
                    @error('area')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Area Guj : </label>
                    <input type="text" value="{{ $city_master->area_guj }}" name="area_guj" class="form-control" id="#">
                    @error('area')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary"> Update </button>

          </form>
</div>
@endsection

