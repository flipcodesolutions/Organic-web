@extends('layouts.app')
@section('header', 'Products Create')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Edit Point Percentage</h1>
    </div>
    <a href="{{ route('pointper.index') }}" class="btn btn-primary" type="button"> Back </a>
</div>

<div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 230px">Update New Point Percentage</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('pointper.index') }}" class="btn btn-primary" type="button"> Back </a>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <form id="productForm" action="{{ route('pointper.update', $per->id) }}" method="POST" class="form">
                    @csrf
                    {{-- product stock --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Point Percentage<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="pointpercentage" id="point_per" placeholder="Point Percentage"
                                    class="form-control" value={{ $per->per }}>
                                <label for="">Point Percentage</label>
                                @error('pointpercentage')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
