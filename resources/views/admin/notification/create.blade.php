@extends('layouts.app')
@section('header', 'Products Create')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 200px">Create New Notification</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="{{ route('notification.index') }}" class="btn btn-primary" type="button"> Back </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="productForm" action="{{ route('notification.store') }}" method="POST" class="form">
                    @csrf

                    {{-- title --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Title <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="title" id="title" placeholder="Title"
                                    value="{{ old('title') }}" class="form-control">
                                <label for="">English</label>
                                <span>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="title_guj" id="title" placeholder="Title Gujarati"
                                    value="{{ old('title_guj') }}" class="form-control">
                                <label for="">Gujarati</label>
                                <span>
                                    @error('title_guj')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="title_hin" id="title" placeholder="Title Hindi"
                                    value="{{ old('title_hin') }}" class="form-control">
                                <label for="">Hindi</label>
                                <span>
                                    @error('title_hin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Details --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Details English<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="details" placeholder="Details English"
                                    id="floatingTextarea">{{ old('details') }}</textarea>
                                {{-- <input type="text" name="details" id="details" placeholder="Details"
                                            class="form-control">
                                        <label for="">English</label> --}}
                                <span>
                                    @error('details')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Details Gujarati<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="details_guj"
                                    placeholder="Details Gujarati" id="floatingTextarea">{{ old('details_guj') }}</textarea>
                                {{-- <input type="text" name="details_guj" id="details"
                                    placeholder="Details Gujarati" class="form-control">
                                <label for="">Gujarati</label> --}}
                                <span>
                                    @error('details_guj')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Details Hindi<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="ckeditor form-control" name="details_hin" placeholder="Details Hindi"
                                    id="floatingTextarea">{{ old('details_hin') }}</textarea>
                                {{-- <input type="text" name="details_hin" id="details" placeholder="Details Hindi"
                                    class="form-control">
                                <label for="">Hindi</label> --}}
                                <span>
                                    @error('details_hin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Navigate screen --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Navigate Screen<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg" name="navigate_screen"
                                aria-label="Large select example" style="font-size: 16px; font-weight: 400;">
                                <option selected disabled>Select Navigate Screen </option>
                                @foreach ($screen as $data)
                                    <option>{{ $data->screenname }}</option>
                                @endforeach
                            </select>
                            <span>
                                @error('navigate_screen')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                            Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>
        // Initialize CKEditor for each
        CKEDITOR.replace('details');
        CKEDITOR.replace('details_guj');
        CKEDITOR.replace('details_hin');
    </script>

@endsection
