@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Update New UserInfo</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('user.index') }}">Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data"
                    class="form">
                    @csrf

                    {{-- ptofile picture --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Profile picture<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <div class="col mb-2" id="imagepreview"
                                            style="display:flex; justify-content: center;">
                                            <img id="profilePicPreview" src="{{ asset('user_profile/' . $user->pro_pic) }}"
                                                alt="Profile Picture"
                                                style="width: 150px; height: 150px; border-radius: 50%; border: 1px solid grey">
                                        </div>
                                        <div class="col px-0">
                                            <input type="file" name="profilePic" id="profilePicInput"
                                                placeholder="profile_pic" class="form-control"
                                                onchange="previewImage(event)">
                                            <span id="nameError" class="text-danger">
                                                @error('profilepic')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        {{-- <input type="file" name="profilePic" placeholder="profile_pic" class="form-control"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- user name --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Name<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="name" placeholder="Name" class="form-control"
                                    value="{{ $user->name }}">
                                <label for="floatingInput">Enter Name</label>
                                <span id="nameError" class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- phone --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Phone<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="number" name="phone" placeholder="Phone Number" class="form-control"
                                    value="{{ $user->phone }}">
                                <label for="floatingInput">Enter Phone Number</label>
                                <span id="nameError" class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- email --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Email<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="email" name="email" placeholder="Email" class="form-control"
                                    value="{{ $user->email }}">
                                <label for="floatingInput">Enter Email</label>
                                <span id="nameError" class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Password<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                        <label for="floatingInput">Enter Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Confirm Password<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="password" name="confirm-password" placeholder="Confirm Password"
                                            class="form-control">
                                        <label for="floatingInput">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- role --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Role<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg mb-3" name="role"
                                aria-label="Large select example" style="font-size: 16px; font-weight: 400;">
                                <option selected disabled>--Select user role--</option>
                                <option value="admin"{{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="manager"{{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                                <option value="vendor"{{ $user->role == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                <option value="customer"{{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                            </select>
                        </div>
                        <span id="nameError" class="text-danger">
                            @error('role')
                                {{ $message }}
                            @enderror
                        </span>                    </div>

                    {{-- default language --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Default Language<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg mb-3" name="defaultLanguage"
                                aria-label="Large select example" style="font-size: 16px; font-weight: 400;">
                                <option selected disabled>--Select Default Language--</option>
                                <option value="English"{{ $user->default_language == 'English' ? 'selected' : '' }}>English
                                </option>
                                <option value="Gujarati"{{ $user->default_language == 'Eujarati' ? 'selected' : '' }}>
                                    Gujarati</option>
                                <option value="Hindi"{{ $user->default_language == 'Hindi' ? 'selected' : '' }}>Hindi
                                </option>
                            </select>
                            <span id="nameError" class="text-danger">
                                @error('defaultLanguage')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary"><i
                                    class="fa-solid fa-floppy-disk"></i> Submit</button>
                        </div>
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
@endsection

{{-- @extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i>
                    Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" placeholder="Name" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" placeholder="Email" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    <select name="role" class="form-control">
                        <option selected disabled>--Select your option--</option>
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                        <option value="vendor">Vendor</option>
                        <option value="customer">Customer</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3"><i class="fa-solid fa-floppy-disk"></i>
                    Submit</button>
            </div>
        </div>
    </form>
@endsection --}}









{{-- @extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $user->name }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" placeholder="Email" class="form-control" value="{{ $user->email }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                <select name="roles[]" class="form-control" multiple="multiple">
                    @foreach ($roles as $value => $label)
                    <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : ''}}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>
</form>


@endsection --}}
