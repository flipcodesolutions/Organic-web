@extends('layouts.app')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Edit CmsMaster</h1>
    </div>
    <a class="btn btn-primary" href="{{ Route('cms_master.index') }}">Back</a>
</div>

<div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 180px">Update New CmsMaster</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('cms_master.index') }}">Back</a>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <form id="cms_master" method="post" action="{{ Route('cms_master.update', $cms_masters->id) }}" class="form">
                    @csrf
                    {{-- Cms_Master --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Title <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="title" value="{{ $cms_masters->title }}" class="form-control"
                                    id="floatingInput" placeholder="English">
                                <label for="floatingInput">English</label>
                                <span id="nameError" class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="titleguj" value="{{ $cms_masters->titleGuj }}"
                                    class="form-control" id="floatingInput" placeholder="Gujarati">
                                <label for="floatingInput">Gujarati</label>
                                <span id="nameError" class="text-danger">
                                    @error('titleguj')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="titlehin" value="{{ $cms_masters->titleHin }}"
                                    class="form-control" id="floatingInput" placeholder="Hindi">
                                <label for="floatingInput">Hindi</label>
                                <span id="nameError" class="text-danger">
                                    @error('titlehin')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Slug <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="slug" value="{{ $cms_masters->slug }}" id=""
                                    placeholder="" class="form-control">
                                <span id="nameError" class="text-danger">
                                    @error('slug')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    {{-- Cms_Master Description --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <textarea class="ckeditor form-control" name="description" value="" placeholder="description" id="floatingTextarea">{{ $cms_masters->description }}</textarea>
                                        <span id="nameError" class="text-danger">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description Gujarati<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <textarea class="ckeditor form-control" name="descriptionguj" value="" placeholder="descriptionguj" id="floatingTextarea">{{ $cms_masters->descriptionGuj }}</textarea>
                                <span id="nameError" class="text-danger">
                                    @error('descriptionguj')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Description Hindi<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <textarea class="ckeditor form-control" name="descriptionhin" value="" placeholder="descriptionhin" id="floatingTextarea">{{ $cms_masters->descriptionHin }}</textarea>
                                <span id="nameError" class="text-danger">
                                    @error('descriptionhin')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="update btn" id="Update"><i
                                    class="fa-solid fa-floppy-disk"></i>
                                    Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Initialize CKEditor for each
        CKEDITOR.replace('description');
        CKEDITOR.replace('descriptionguj');
        CKEDITOR.replace('descriptionhin');
    </script>
@endsection
