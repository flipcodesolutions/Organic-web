@extends('layouts.app')

@section('content')



@endsection<div class='m-2'>
    <a class="btn btn-primary" href="{{route('city_master.index') }}" role="button" >Back </a>
</div>


<div class="card-body">

    <form action="{{ route('city_master.store') }}" method="post" enctype="multipart/form-data">

        @csrf

                <div class="mb-3">
                        <label class="form-label">City Name English : </label>
                        <input type="text" name="city_name" class="form-control" id="#" aria-describedby="#">
                        @error('city_name_eng')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">City Name Hindi : </label>
                    <input type="text" name="city_name_hin" class="form-control" id="#" aria-describedby="#">
                    @error('city_name_hin')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">City Name Gujarati : </label>
                    <input type="text" name="city_name_guj" class="form-control" id="#" aria-describedby="#">
                    @error('city_name_guj')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Pincode : </label>
                    <input type="text" name="pincode" class="form-control" id="#">
                    @error('pincode')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Area : </label>
                    <input type="text" name="area" class="form-control" id="#">
                    @error('area')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <a class="btn btn-primary" href="{{route('city_master.index') }}" role="button" >Create </a>
            </form>

</div>
