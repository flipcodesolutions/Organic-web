@extends('visitor.layouts.app')
@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center"
        style="background-color: blueviolet; height:638px">
        <div class="card h-70 w-50 p-5" style="background-color: white">
            <form method="POST" action="{{ route('visitor.login') }}">
                @csrf

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </span>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    <span>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </span>
                    <a href=""><label for="">Forgot password</label></a>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="signup" class="btn btn-primary">Sign up</button>
            </form>
        </div>
    </div>
@endsection
