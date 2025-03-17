@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card shadow-sm bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Update City</h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ route('city_master.index') }}" role="button" >Back </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('city_master.update',$citymaster->id) }}" method="post" enctype="multipart/form-data" class="form">
                @csrf
                <input type="hidden" value="{{ $citymaster->id }}" name="city_id">
                {{-- City_Master --}}
                <div class="row mb-3">
                    <div class="col-sm-12 col-lg-3 col-md-12">
                        City Name : <span class="text-danger">*</span>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" value="{{ $citymaster->city_name_eng }}" name="city_name_eng" class="form-control" id="#" aria-describedby="#">
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
                            <input type="text" value="{{ $citymaster->city_name_hin }}" name="city_name_hin" class="form-control" id="#" aria-describedby="#">
                            <label for="city_name_hin">Hindi</label>
                            <span>
                                @error('city_name_hindi')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" value="{{ $citymaster->city_name_guj }}" name="city_name_guj" class="form-control" id="#" aria-describedby="#">
                            <label for="city_name_guj">Gujarati</label>
                            <span>
                                @error('city_name_guj')
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
                            <input type="text" value="{{ $citymaster->pincode }}" name="pincode" class="form-control" id="#">
                            <label for="city_name_guj">PinCode</label>
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
                            <input type="text" value="{{ $citymaster->area_eng }}" name="area_eng" class="form-control" id="#">
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
                            <input type="text" value="{{ $citymaster->area_hin }}" name="area_hin" class="form-control" id="#">

                            <label for="area_hin">Hindi</label>
                            <span>
                                @error('area_hin')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" value="{{ $citymaster->area_guj }}" name="area_guj" class="form-control" id="#">
                            <label for="area_guj">Gujarati</label>
                            <span>
                                @error('area_guj')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="update btn" id="Update"><i class="fa-solid fa-floppy-disk"></i> Update </button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection
