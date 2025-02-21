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
                        <a class="btn btn-primary" href="">Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="slider" method="post" action="">
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
                                        <select name="cityname" id="floatingInput" class="form-control"
                                            placeholder="cityname">
                                            <option selected disabled>--Select your Cityname--</option>
                                            <option value=""></option>
                                        </select>
                                        <label for="floatingInput">Enter Cityname English</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select name="citynameguj" id="floatingInput" class="form-control"
                                            placeholder="citynameguj">
                                            <option selected disabled>--Select your Cityname--</option>
                                            <option value=""></option>
                                        </select>
                                        <label for="floatingInput">Enter Cityname Gujarati</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select name="citynamehin" id="floatingInput" class="form-control"
                                            placeholder="citynamehin">
                                            <option selected disabled>--Select your Cityname--</option>
                                            <option value=""></option>
                                        </select>
                                        <label for="floatingInput">Enter Cityname Hindi</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- slider url --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            url<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select name="url" id="floatingInput" class="form-control" placeholder="url">
                                            <option selected disabled>--Select your Image--</option>
                                            <option value=""></option>
                                        </select>
                                        <label for="floatingInput">Enter Image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- slider screen --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            slider screen <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="sliderscreen" value="" class="form-control"
                                    id="floatingInput" placeholder="sliderscreen">
                                <label for="floatingInput">Enter sliderscreen</label>
                            </div>
                        </div>
                    </div>
                    {{-- is navigate --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            is_navigate<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <select name="isnavigate" id="" class="form-control">
                                            <option selected disabled>--Select your isnavigate--</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- navigatemaster_id --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            navigatemaster_id<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <select name="isnavigate" id="" class="form-control">
                                            <option selected disabled>--Select your navigatemaster_id--</option>
                                            <option value=""></option>

                                        </select>
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
@endsection
