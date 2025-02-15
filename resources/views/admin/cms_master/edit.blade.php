@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Update New Cms_Master</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('cms_master.index') }}">Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="cms_master" method="post" action="{{ Route('cms_master.update', $cms_masters->id) }}">
                    @csrf
                    {{-- Cms_Master --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            title <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="title" value="{{ $cms_masters->title }}" id=""
                                    placeholder="English" class="form-control">
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="titleguj" value="{{ $cms_masters->titleGuj }}" id=""
                                    placeholder="Gujarati" class="form-control">
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="titlehin" value="{{ $cms_masters->titleHin }}" id=""
                                    placeholder="Hindi" class="form-control">
                                <span id="nameError" class="text-danger"></span>
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
                                <span id="nameError" class="text-danger"></span>
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
                                    <div class="form-floating">
                                        <input type="text" name="description" value="{{ $cms_masters->description }}"
                                            id="" placeholder="English" class="form-control">
                                        <span id="nameError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="descriptionguj"
                                            value="{{ $cms_masters->descriptionGuj }}" id=""
                                            placeholder="Giujarati" class="form-control">
                                        <span id="nameError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="descriptionhin"
                                            value="{{ $cms_masters->descriptionHin }}" id="" placeholder="Hindi"
                                            class="form-control">
                                        <span id="nameError" class="text-danger"></span>
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
