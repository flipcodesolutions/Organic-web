{{-- @extends('visitor.layouts.app')
@section('content') --}}
<div class="contanier">
    <div class="row justify-content-center px-3">
        <div class="col-lg-6">
            <h2>Your Profile</h2>
            <div class="d-flex justify-content-center">
                <div class="col mb-2" id="imagepreview" style="display:flex; justify-content: center;">
                    <img id="profilePicPreview" src="{{ asset('user_profile/CustomerImage.jpeg') }}" alt="Profile Picture"
                        style="width: 150px; height: 150px; border-radius: 50%; border: 1px solid grey">
                </div>
            </div>

            <form action="{{ route('visitor.updateprofile') }}/{{ session('user')->id }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="mb-2">Chnage Profile Picture</label>
                    <input type="file" name="profilePic" id="profilePicInput" placeholder="profile_pic"
                        class="form-control" onchange="previewImage(event)">
                </div>
                <div class="mb-3">
                    <label class="mb-2">User Name</label>
                    <input type="text" name="name" placeholder="User name" class="form-control"
                        value="{{ $user->name }}">
                    <span id="nameError" class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label class="mb-2">Email</label>
                    <input type="email" name="email" placeholder="email" class="form-control"
                        value="{{ $user->email }}">
                    <span id="emailError" class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label class="mb-2">Mobile Number</label>
                    <input type="text" name="phonenumber" placeholder="Mobile number" class="form-control"
                        maxlength="10" value="{{ $user->phone }}">
                    <span id="phoneNumberError" class="text-danger">
                        @error('phonenumber')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <button class="btn btn-warning text-white" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
</script>
{{-- @endsection --}}
