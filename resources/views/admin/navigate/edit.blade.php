@extends('layouts.app')
@section('header', 'Products Create')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Edit ScreenName</h1>
    </div>
    <a href="{{ route('navigate.index') }}" class="btn btn-primary" type="button"> Back </a>
</div>

<div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 200px">Update New ScreenName</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('navigate.index') }}" class="btn btn-primary" type="button"> Back </a>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <form id="productForm" action="{{ route('navigate.update', $screen->id) }}" method="POST" class="form">
                    @csrf
                    {{-- product stock --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Screen Name<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="screenName" id="screen_name" placeholder="Screen Name"
                                    class="form-control" value={{ $screen->screenname }}>
                                <label for="">Screen Name</label>
                                <span>
                                    @error('screenName')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="update btn" id="Update"><i class="fa-solid fa-floppy-disk"></i>
                            Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

@endsection
