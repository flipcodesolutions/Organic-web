@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Create New Slider</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{Route('slider.index')}}">Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="slider" method="post" action="{{ Route('slider.store') }}">
                    @csrf
                    {{-- slider --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            cityname <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select name="city_id" id="floatingInput" class="form-control"
                                            placeholder="cityname" value="{{ old('city_id') }}">
                                            <option selected disabled>--Select your Cityname--</option>
                                            @foreach ($cities as $cities)
                                                <option
                                                    value="{{ $cities->id }}"{{ old('city_id') == $cities->id ? 'selected' : '' }}>
                                                    {{ $cities->city_name_eng }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingInput">Enter Cityname English</label>
                                        <span>
                                            @error('city_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- slider pos --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            slider_pos<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select name="slider_pos" id="floatingInput" class="form-control"
                                            placeholder="sliderpos">
                                            <option selected disabled>--Select your position--</option>
                                            <option value="top"{{ old('slider_pos') == 'top' ? 'selected' : '' }}>Top</option>
                                            <option value="bottom"{{ old('slider_pos') == 'bottom' ? 'selected' : '' }}>Bottom
                                            </option>
                                            <option value="middle"{{ old('slider_pos') == 'middle' ? 'selected' : '' }}>Middle
                                            </option>
                                        </select>
                                        <label for="floatingInput">Enter Position</label>
                                        <span>
                                            @error('slider_pos')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            is_navigate<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="is_navigate"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">

                                        </label>
                                        {{-- <span>
                                            @error('is_navigate')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- navigatemaster_id --}}
                    {{-- navigatemaster_id (hidden by default) --}}
                    <div class="row mb-3" id="navigatemaster_field" style="display: none;">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            ScreenName<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select name="navigatemaster_id" id="floatingInput" class="form-control"
                                            placeholder="navigatemaster_id">
                                            <option selected disabled>--Select your screenname--</option>
                                            @foreach ($navigatemasters as $navigatemasters)

                                            <option value="{{$navigatemasters->id}}">{{$navigatemasters->screenname}}
                                            </option>

                                            @endforeach
                                        </select>
                                        <label for="floatingInput">Enter Screenname</label>
                                        {{-- <span>
                                            @error('navigatemaster_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                    class="fa-solid fa-floppy-disk"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to toggle navigatemaster field based on checkbox
        document.getElementById('flexCheckDefault').addEventListener('change', function() {
            var navigatemasterField = document.getElementById('navigatemaster_field');
            if (this.checked) {
                navigatemasterField.style.display = 'flex';
            } else {
                navigatemasterField.style.display = 'none';
            }
        });
    </script>
@endsection
