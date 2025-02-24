@extends('layouts.app')
@section('header', 'Products Create')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Create New Notification</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('product.index') }}" class="btn btn-primary" type="button"> Back </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="productForm" action="{{ route('notification.store') }}" method="POST">
                    @csrf

                    {{-- product --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Title <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="title" id="title" placeholder="Title"
                                    class="form-control">
                                <label for="">English</label>
                                <span id="titleError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="title_guj" id="title"
                                    placeholder="Title Gujarati" class="form-control">
                                <label for="">Gujarati</label>
                                <span id="titleErrorGuj" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="title_hin" id="title"
                                    placeholder="Title Hindi" class="form-control">
                                <label for="">Hindi</label>
                                <span id="titleErrorHin" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Details --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Details<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="details" id="details"
                                            placeholder="Details" class="form-control">
                                        <label for="">English</label>
                                        <span id="detailsError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="details_guj" id="details"
                                            placeholder="Details Gujarati" class="form-control">
                                        <label for="">Gujarati</label>
                                        <span id="detailsErrorGuj" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="details_hin" id="details"
                                            placeholder="Details Hindi" class="form-control">
                                        <label for="">Hindi</label>
                                        <span id="detailsErrorHin" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Product Category --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Navigate Screen<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg mb-3" name="navigate_screen"
                                aria-label="Large select example">
                                <option selected>Select Navigate Screen	</option>
                                @foreach ($screen as $data)
                                    <option>{{ $data->screenname }}</option>
                                @endforeach
                            </select>
                            <span id="navigateScreenError" class="text-danger"></span>
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                class="fa-solid fa-floppy-disk"></i> Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

@endsection
