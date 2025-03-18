@extends('layouts.app')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Edit Slider</h1>
    </div>
    <a class="btn btn-primary" href="{{ Route('slider.index') }}">Back</a>
</div>

<div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Update Slider</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('slider.index') }}">Back</a>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <form id="slider" method="post" action="{{ Route('slider.update', $slider->id) }}"
                    enctype="multipart/form-data" class="form">
                    @csrf
                    {{-- slider --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            CityName <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select name="city_id" id="floatingInput" class="form-control"
                                            placeholder="cityname" value="">
                                            <option selected disabled>--Select your Cityname--</option>
                                            @foreach ($cities as $cities)
                                                {{-- <option value="{{$cities->id}}"{{old('city_id',$slider->city_id)==$cities->id?'selected':''}}>{{$cities->city_name_eng}}</option> --}}
                                                <option
                                                    value="{{ $cities->id }}"{{ $slider->city_id == $cities->id ? 'selected' : '' }}>
                                                    {{ $cities->city_name_eng }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingInput">Enter cityname english</label>
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
                    {{-- slider url --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Image <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <div id="photoInput">
                                            <img src="{{ asset('sliderimage/' . $slider->url) }}" id="uploadPreview"
                                                style="gap: 10px; width:180px; height:100px; margin-bottom:8px">
                                            <input type="file" class="form-control" id="uploadImage" name="image"
                                                onchange="PreviewImage();">
                                        </div>
                                        {{-- <span>
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- slider pos --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            SliderPosition<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select name="slider_pos" id="floatingInput" class="form-control"
                                            placeholder="sliderpos">
                                            <option selected disabled>--Select your position--</option>
                                            <option value="top"{{ $slider->slider_pos == 'top' ? 'selected' : '' }}>Top
                                            </option>
                                            <option value="bottom"{{ $slider->slider_pos == 'bottom' ? 'selected' : '' }}>
                                                Bottom
                                            </option>
                                            <option value="middle"{{ $slider->slider_pos == 'middle' ? 'selected' : '' }}>
                                                Middle
                                            </option>
                                        </select>
                                        <label for="floatingInput">Enter position</label>
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
                            IsNavigate<span class="text-danger"></span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            {{ $slider->is_navigate == 1 ? 'checked' : '' }} name="is_navigate"
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
                    <div class="row mb-3" id="navigatemaster_field"
                        style="{{ $slider->is_navigate == 1 ? 'display: flex;' : 'display: none;' }}">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            ScreenName<span class="text-danger"></span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select name="navigatemaster_id" id="floatingInput" class="form-control"
                                            placeholder="navigatemaster_id">
                                            <option selected disabled>--Select your screenname--</option>
                                            @foreach ($navigatemasters as $navigatemasters)
                                                <option
                                                    value="{{ $navigatemasters->id }}"{{ $slider->navigatemaster_id == $navigatemasters->id ? 'selected' : '' }}>
                                                    {{ $navigatemasters->screenname }}</option>
                                            @endforeach

                                        </select>
                                        <label for="floatingInput">Enter screenname</label>
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
                            <button type="submit" class="update btn" id="Update"><i class="fa-solid fa-floppy-disk"></i>
                                Update</button>
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
            var navigatemasterSelect = document.querySelector('select[name="navigatemaster_id"]');

            if (this.checked) {
                // Show navigatemaster field
                navigatemasterField.style.display = 'flex';
                // Reset the dropdown to show the placeholder
                navigatemasterSelect.selectedIndex =  0; // This will select the first option, which is the placeholder
            } else {
                // Hide navigatemaster field and reset its value
                navigatemasterField.style.display = 'none';
                navigatemasterSelect.value = ''; // Reset the value to empty
            }
        });
    </script>
    <script type="text/javascript">
        // single image show
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
            var previewContainer = document.getElementById("uploadPreview");
            previewContainer.innerHTML = ""; // Clear previous previews

            oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
                previewContainer.style.display = 'flex';
            };
        };
    </script>
@endsection
