@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Create New Cms_Master</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('cms_master.index') }}">Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="cms_master" method="post" action="{{ Route('cms_master.store') }}">
                    @csrf
                    {{-- Cms_Master --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            title <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control"
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
                                <input type="text" name="titleguj" value="{{ old('titleguj') }}" class="form-control"
                                    id="floatingInput" placeholder="Gujarati">
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
                                <input type="text" name="titlehin" value="{{ old('titlehin') }}" class="form-control"
                                    id="floatingInput" placeholder="Hindi">
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
                                <input type="text" name="slug" value="{{ old('slug') }}" id=""
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
                                        <input type="text" name="description" value="{{ old('description') }}"
                                            class="form-control" id="floatingInput" placeholder="description">
                                        <label for="floatingInput">Enter description English</label>
                                        <span id="nameError" class="text-danger">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="descriptionguj" value="{{ old('descriptionguj') }}"
                                            class="form-control" id="floatingInput" placeholder="descriptionguj">
                                        <label for="floatingInput">Enter description Gujarati</label>
                                        <span id="nameError" class="text-danger">
                                            @error('descriptionguj')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="descriptionhin" value="{{ old('descriptionhin') }}"
                                            class="form-control" id="floatingInput" placeholder="descriptionhin">
                                        <label for="floatingInput">Enter description Hindi</label>
                                        <span id="nameError" class="text-danger">
                                            @error('descriptionhin')
                                                {{ $message }}
                                            @enderror
                                        </span>
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
