@extends('visitor.layouts.app')
@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center"
        style="background-color: blueviolet; min-height:638px">
        <div class="card w-50 p-5" style="background-color: white">
            @if (session()->has('newuser'))
                <h2 class="mb-3">Welcome, tell us about you..</h2>
                <form action="{{ route('visitor.userregistration') }}/{{ session('newuser')['id'] }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="userinfo">
                        <div class="d-flex justify-content-center">
                            <div class="col mb-2" id="imagepreview" style="display:flex; justify-content: center;">
                                <img id="profilePicPreview" src="{{ asset('user_profile/CustomerImage.jpeg') }}"
                                    alt="Profile Picture"
                                    style="width: 150px; height: 150px; border-radius: 50%; border: 1px solid grey">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-2">upload Profile Picture <span
                                    class="text-danger">*</span></label>
                            <input type="file" name="profilepicture" id="profilePicInput" placeholder="profile_pic"
                                class="form-control" onchange="previewImage(event)">
                            <span id="profilepicError" class="text-danger">
                                @error('profilepicture')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">User Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" placeholder="User name" class="form-control"
                                @if (isset(session('newuser')['name'])) value="{{ session('newuser')['name'] }}" @else value="{{ old('name') }}" @endif>
                            <span id="nameError" class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" placeholder="email" class="form-control"
                                @if (isset(session('newuser')['email'])) value="{{ session('newuser')['email'] }}" readonly @else value="{{ old('email') }}" @endif>
                            <span id="emailError" class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        {{-- @dd(session('newuser')) --}}

                        <div class="mb-3">
                            <label class="mb-2">Mobile Number <span class="text-danger">*</span></label>
                            <input type="text" name="phonenumber" placeholder="Mobile number" class="form-control"
                                maxlength="10"
                                @if (isset(session('newuser')['phone'])) value="{{ session('newuser')['phone'] }}" readonly @else value="{{ old('phonenumber') }}" @endif>
                            <span id="phoneNumberError" class="text-danger">
                                @error('phonenumber')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <hr class="nav-devider">

                        <div class="mb-3">
                            <label class="form-label">Address line1 <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="addressline1" value="{{ old('addressline1') }}">
                            <span id="addressline1Error" class="text-danger">
                                @error('addressline1')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address line2 <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="addressline2" value="{{ old('addressline2') }}">
                            <span id="addressline2Error" class="text-danger">
                                @error('addressline2')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select City <span
                                    class="text-danger">*</span></label>
                            <select name="city" id="city-dropdown" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected disabled>Select City</option>
                                @foreach ($city as $cityData)
                                    <option value="{{ $cityData->id }}" {{ old('city') == $cityData->id ? 'selected':'' }}>{{ $cityData->city_name_eng }}</option>
                                @endforeach
                            </select>
                            <span id="cityError" class="text-danger">
                                @error('city')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select Lendmark <span
                                    class="text-danger">*</span></label>
                            <select name="landmark" id="landmark-dropdown" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected disabled>Select Landmark</option>
                                @foreach ($landmark as $landmarkData)
                                    <option value="{{ $landmarkData->id }}" data-city="{{ $landmarkData->city_id }}" {{ old('landmark') == $landmarkData->id ? 'selected':'' }}>
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
                            <label for="exampleFormControlInput1" class="form-label">pincode <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pincode" maxlength="6"
                                placeholder="6 digit [0-9] pin-code" value="{{ old('pincode') }}">
                            <span id="pincodeError" class="text-danger">
                                @error('pincode')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </div>
                </form>
            @else
                hyy
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                const output = document.getElementById('profilePicPreview');
                const outputclass = document.getElementById('imagepreview');
                output.src = reader.result;
                // outputclass.style.display = 'flex';
                // outputclass.style.justify-content = 'center'; // Show the image
            };

            if (file) {
                reader.readAsDataURL(file); // Read the file as a Data URL
            }
        }

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
