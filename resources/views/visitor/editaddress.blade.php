@extends('visitor.layouts.app')
@section('content')
    <div class="container d-flex justify-content-center">
        <div class="address-form col-lg-4 col-md-12">
            <div class="my-3">
                <h5>Edit address</h5>
            </div>

            <form action="{{ route('visitor.updateaddress') }}/{{ $address->id }}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Address line1</label>
                    <input type="text" class="form-control" name="addressline1" value="{{ $address->address_line1 }}">
                    <span id="addressline1Error" class="text-danger">
                        @error('addressline1')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address line2</label>
                    <input type="text" class="form-control" name="addressline2" value="{{ $address->address_line2 }}">
                    <span id="addressline2Error" class="text-danger">
                        @error('addressline2')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Select City</label>
                    <select name="city" id="city-dropdown" class="form-select" aria-label="Default select example">
                        <option value="" selected disabled>Select City</option>
                        @foreach ($city as $cityData)
                            <option value="{{ $cityData->id }}"
                                {{ $cityData->id == $address->landmark->city_id ? 'selected' : '' }}>
                                {{ $cityData->city_name_eng }}</option>
                        @endforeach
                    </select>
                    <span id="cityError" class="text-danger">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Select Lendmark</label>
                    <select name="landmark" id="landmark-dropdown" class="form-select" aria-label="Default select example">
                        <option value="" selected disabled>Select Landmark</option>
                        @foreach ($landmark as $landmarkData)
                            <option value="{{ $landmarkData->id }}" data-city="{{ $landmarkData->city_id }}"
                                {{ $landmarkData->id == $address->landmark->id ? 'selected' : '' }}>
                                {{ $landmarkData->landmark_eng }}
                            </option>
                        @endforeach
                    </select>
                    <span id="landmarkError" class="text-danger">
                        @error('landmark')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">pincode</label>
                    <input type="text" class="form-control" name="pincode" maxlength="6"
                        placeholder="6 digit [0-9] pin-code" value="{{ $address->pincode }}">
                    <span id="pincodeError" class="text-danger">
                        @error('pincode')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <button class="btn btn-warning text-white" type="submit"> Update address </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cityDropdown = document.getElementById('city-dropdown');
            const landmarkDropdown = document.getElementById('landmark-dropdown');

            // Store all landmark options
            const allOptions = Array.from(landmarkDropdown.options).slice(1); // skip first "Select Landmark"

            cityDropdown.addEventListener('change', function() {
                const selectedCityId = this.value;

                // Clear current landmarks
                landmarkDropdown.innerHTML = '<option value="">Select Landmark</option>';

                if (!selectedCityId) return;

                // Filter and append landmarks
                allOptions.forEach(option => {
                    if (option.getAttribute('data-city') === selectedCityId) {
                        landmarkDropdown.appendChild(option.cloneNode(true));
                    }
                });
            });
        });
    </script>
@endsection
